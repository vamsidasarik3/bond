<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class Plot extends Model
{
    use HasFactory;

    protected $fillable = [
        'plot_number',
        'title',
        'plot_type',
        'size_sq_yards',
        'price_per_sq_yard',
        'total_price',
        'facing',
        'road_width_ft',
        'boundary_dimensions',
        'status',
        'is_vaastu_compliant',
        'notes',
        'image',
    ];

    protected $casts = [
        'size_sq_yards' => 'decimal:2',
        'price_per_sq_yard' => 'decimal:2',
        'total_price' => 'decimal:2',
        'road_width_ft' => 'integer',
        'is_vaastu_compliant' => 'boolean',
    ];

    /**
     * Relationship: Enquiries for this plot.
     */
    public function enquiries(): HasMany
    {
        return $this->hasMany(ContactEnquiry::class);
    }

    /**
     * Scopes
     */
    public function scopeAvailable(Builder $query): Builder
    {
        return $query->where('status', 'available');
    }

    public function scopeReserved(Builder $query): Builder
    {
        return $query->whereIn('status', ['reserved', 'booked']);
    }

    public function scopeBooked(Builder $query): Builder
    {
        return $this->scopeReserved($query);
    }

    public function scopeSold(Builder $query): Builder
    {
        return $query->where('status', 'sold');
    }

    /**
     * Accessor for plot image URL with fallback to real on-ground photos.
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            if (str_starts_with($this->image, 'http') || str_starts_with($this->image, '/')) {
                return $this->image;
            }
            if (Storage::disk('public')->exists($this->image)) {
                return Storage::disk('public')->url($this->image);
            }
        }

        // Map plot IDs or types to real venture photos
        $index = ($this->id % 20) + 1;
        $num = str_pad($index, 2, '0', STR_PAD_LEFT);
        return asset("venture/photos/{$num}.jpg");
    }

    /**
     * Formatted area in Sq. Yards
     */
    public function getAreaAttribute(): string
    {
        return round($this->size_sq_yards) . ' Sq. Yards';
    }

    /**
     * Calculated area in Sq. Ft (1 Sq. Yd = 9 Sq. Ft)
     */
    public function getSqftAttribute(): string
    {
        return number_format(round($this->size_sq_yards * 9)) . ' Sq. Ft';
    }

    /**
     * Formatted Road Width
     */
    public function getRoadWidthAttribute(): string
    {
        return ($this->road_width_ft ?? 40) . ' Ft Road';
    }

    /**
     * Photo Gallery for details page
     */
    public function getGalleryAttribute(): array
    {
        $primary = $this->image_url;
        $id = (int) $this->id;
        
        $photos = [$primary];
        for ($i = 1; $i <= 10; $i++) {
            $photoIndex = (($id + $i * 2) % 20) + 1;
            $photos[] = asset("venture/photos/" . str_pad($photoIndex, 2, '0', STR_PAD_LEFT) . ".jpg");
        }

        return array_values(array_unique(array_filter($photos)));
    }

    /**
     * Complete on-ground venture photo showcase
     */
    public function getAllVenturePhotosAttribute(): array
    {
        $captions = [
            1 => 'Grand Entrance Arch & Boom Barrier',
            2 => "40' M-25 Grade Concrete Avenue",
            3 => 'Avenue Plantation & Greenery',
            4 => 'Underground Drainage & Sewage System',
            5 => 'Underground Electricity & Transformers',
            6 => 'Landscaped Park & Walking Track',
            7 => 'Demarcated Plot Boundary & Curb Stones',
            8 => 'Overhead Water Storage Tank & Tap Lines',
            9 => 'Compound Wall & 24/7 Security Cabin',
            10 => 'Direct AIIMS Bibinagar Corridor View',
        ];

        $list = [];
        for ($i = 1; $i <= 12; $i++) {
            $num = str_pad($i, 2, '0', STR_PAD_LEFT);
            $list[] = [
                'url' => asset("venture/photos/{$num}.jpg"),
                'caption' => $captions[$i] ?? "Venture Infrastructure Phase {$i}",
            ];
        }
        return $list;
    }

    /**
     * Format total price into Indian currency format (e.g. ₹25.05 Lakhs or ₹25,04,833)
     */
    public function getFormattedPriceAttribute(): string
    {
        $num = (float) $this->total_price;
        if ($num >= 10000000) {
            return '₹' . number_format($num / 10000000, 2) . ' Cr';
        } elseif ($num >= 100000) {
            return '₹' . number_format($num / 100000, 2) . ' Lakh';
        }
        return '₹' . number_format($num);
    }

    public function getFormattedExactPriceAttribute(): string
    {
        return '₹' . number_format((float) $this->total_price);
    }

    public function getStatusBadgeAttribute(): array
    {
        return match (strtolower($this->status)) {
            'available' => [
                'label' => 'Available',
                'bg' => 'bg-emerald-50',
                'text' => 'text-emerald-700',
                'border' => 'border-emerald-200',
                'dot' => 'bg-emerald-500',
            ],
            'reserved', 'booked' => [
                'label' => 'Reserved',
                'bg' => 'bg-amber-50',
                'text' => 'text-amber-700',
                'border' => 'border-amber-200',
                'dot' => 'bg-amber-500',
            ],
            'sold' => [
                'label' => 'Sold',
                'bg' => 'bg-rose-50',
                'text' => 'text-rose-700',
                'border' => 'border-rose-200',
                'dot' => 'bg-rose-500',
            ],
            default => [
                'label' => ucfirst($this->status),
                'bg' => 'bg-slate-100',
                'text' => 'text-slate-700',
                'border' => 'border-slate-200',
                'dot' => 'bg-slate-400',
            ],
        };
    }
}
