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

        // Map plot IDs to curated high-resolution venture photos
        $images = [
            asset('images/projects/rrr-prekshitha/concrete-boulevard-40ft.webp'),
            asset('images/projects/rrr-prekshitha/avenue-plantation-walkway.webp'),
            asset('images/projects/rrr-prekshitha/internal-curbstone-avenue.webp'),
            asset('images/projects/rrr-prekshitha/plotted-sector-perspective.webp'),
            asset('images/projects/rrr-prekshitha/ground-development-progress.webp'),
            asset('images/projects/rrr-prekshitha/master-layout-aerial.webp'),
        ];
        return $images[((int)$this->id) % count($images)];
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
        $curated = [
            asset('images/projects/rrr-prekshitha/entrance-arch-grand.webp'),
            asset('images/projects/rrr-prekshitha/master-layout-aerial.webp'),
            asset('images/projects/rrr-prekshitha/concrete-boulevard-40ft.webp'),
            asset('images/projects/rrr-prekshitha/avenue-plantation-walkway.webp'),
            asset('images/projects/rrr-prekshitha/overhead-water-tank.webp'),
            asset('images/projects/rrr-prekshitha/layout-parks-broad-view.webp'),
            asset('images/projects/rrr-prekshitha/internal-curbstone-avenue.webp'),
            asset('images/projects/rrr-prekshitha/high-altitude-site-grid.webp'),
        ];
        
        $photos = array_merge([$primary], $curated);
        return array_values(array_unique(array_filter($photos)));
    }

    /**
     * Complete on-ground venture photo showcase
     */
    public function getAllVenturePhotosAttribute(): array
    {
        return [
            [
                'url' => asset('images/projects/rrr-prekshitha/entrance-arch-grand.webp'),
                'caption' => 'Grand Entrance Arch with 24/7 Security Cabin',
            ],
            [
                'url' => asset('images/projects/rrr-prekshitha/master-layout-aerial.webp'),
                'caption' => '17-Acre Master Layout Bird’s Eye Drone View',
            ],
            [
                'url' => asset('images/projects/rrr-prekshitha/concrete-boulevard-40ft.webp'),
                'caption' => "40' Heavy-Duty Concrete Avenue & Curb Stones",
            ],
            [
                'url' => asset('images/projects/rrr-prekshitha/avenue-plantation-walkway.webp'),
                'caption' => 'Landscaped Theme Parks & Avenue Plantations',
            ],
            [
                'url' => asset('images/projects/rrr-prekshitha/overhead-water-tank.webp'),
                'caption' => 'High-Capacity Overhead Water Tank & Supply Lines',
            ],
            [
                'url' => asset('images/projects/rrr-prekshitha/internal-curbstone-avenue.webp'),
                'caption' => 'Internal Road Network & Underground Utility Ducts',
            ],
            [
                'url' => asset('images/projects/rrr-prekshitha/layout-parks-broad-view.webp'),
                'caption' => 'Broad Drone Perspective of Plotted Sectors & Parks',
            ],
            [
                'url' => asset('images/projects/rrr-prekshitha/high-altitude-site-grid.webp'),
                'caption' => 'High-Altitude View of Demarcated Residential Plots',
            ],
            [
                'url' => asset('images/projects/rrr-prekshitha/plotted-sector-perspective.webp'),
                'caption' => '100% Vaastu Compliance Plotted Grid with Boundary Markers',
            ],
            [
                'url' => asset('images/projects/rrr-prekshitha/sunset-horizon-landscape.webp'),
                'caption' => 'Golden Hour Panorama of RRR Prekshitha Enclave',
            ],
            [
                'url' => asset('images/projects/rrr-prekshitha/ground-development-progress.webp'),
                'caption' => 'Completed Ground Infrastructure & Compaction Works',
            ],
            [
                'url' => asset('images/projects/rrr-prekshitha/aerial-drone-banner.webp'),
                'caption' => 'Main Spine Road Overlooking Regional Ring Road Corridor',
            ],
        ];
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

    public function getFormattedPricePerSqYardAttribute(): string
    {
        $rate = (float) ($this->price_per_sq_yard ?: 14999);
        return '₹ ' . number_format($rate) . ' / Sq. Yard';
    }

    public function getNotesAttribute($value): ?string
    {
        if (!$value) {
            return null;
        }
        return str_ireplace(
            ['100% Vaastu compliant', 'Vaastu compliant', 'Vaastu-compliant'],
            ['100% Vaastu Compliance', 'Vaastu Compliance', 'Vaastu Compliance'],
            $value
        );
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
