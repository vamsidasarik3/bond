<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class ContactEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'plot_id',
        'subject',
        'message',
        'preferred_visit_date',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'preferred_visit_date' => 'date',
    ];

    /**
     * Relationship: Plot associated with enquiry.
     */
    public function plot(): BelongsTo
    {
        return $this->belongsTo(Plot::class);
    }

    /**
     * Scopes
     */
    public function scopeNew(Builder $query): Builder
    {
        return $query->where('status', 'new');
    }

    public function scopeContacted(Builder $query): Builder
    {
        return $query->where('status', 'contacted');
    }

    public function scopeInProgress(Builder $query): Builder
    {
        return $query->where('status', 'in_progress');
    }

    public function scopeClosed(Builder $query): Builder
    {
        return $query->where('status', 'closed');
    }

    public function getStatusBadgeAttribute(): array
    {
        return match ($this->status) {
            'new' => [
                'label' => 'New',
                'bg' => 'bg-blue-50',
                'text' => 'text-blue-700',
                'border' => 'border-blue-200',
                'dot' => 'bg-blue-500',
            ],
            'contacted' => [
                'label' => 'Contacted',
                'bg' => 'bg-purple-50',
                'text' => 'text-purple-700',
                'border' => 'border-purple-200',
                'dot' => 'bg-purple-500',
            ],
            'in_progress' => [
                'label' => 'In Progress',
                'bg' => 'bg-amber-50',
                'text' => 'text-amber-700',
                'border' => 'border-amber-200',
                'dot' => 'bg-amber-500',
            ],
            'closed' => [
                'label' => 'Closed',
                'bg' => 'bg-emerald-50',
                'text' => 'text-emerald-700',
                'border' => 'border-emerald-200',
                'dot' => 'bg-emerald-500',
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
