<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ContactEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_number',
        'name',
        'email',
        'phone',
        'plot_id',
        'subject',
        'message',
        'preferred_visit_date',
        'project',
        'landing_page',
        'source',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'referrer',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'preferred_visit_date' => 'date',
    ];

    /**
     * Boot model logic
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->lead_number)) {
                $maxId = (int) DB::table('contact_enquiries')->max('id');
                $nextId = $maxId + 1;
                $candidate = 'LEAD-' . str_pad($nextId, 5, '0', STR_PAD_LEFT);
                while (DB::table('contact_enquiries')->where('lead_number', $candidate)->exists()) {
                    $nextId++;
                    $candidate = 'LEAD-' . str_pad($nextId, 5, '0', STR_PAD_LEFT);
                }
                $model->lead_number = $candidate;
            }

            if (empty($model->status)) {
                $model->status = 'new';
            }

            if (empty($model->source)) {
                $model->source = 'Website';
            }

            if (empty($model->project)) {
                $model->project = 'RRR Prekshitha Enclave';
            }
        });
    }

    /**
     * Relationship: Plot associated with enquiry.
     */
    public function plot(): BelongsTo
    {
        return $this->belongsTo(Plot::class);
    }

    /**
     * Relationship: Email logs for this lead.
     */
    public function emailLogs(): HasMany
    {
        return $this->hasMany(EmailLog::class, 'contact_enquiry_id')->latest();
    }

    /**
     * Relationship: Internal admin notes.
     */
    public function notes(): HasMany
    {
        return $this->hasMany(EnquiryNote::class, 'contact_enquiry_id')->latest();
    }

    /**
     * Supported Statuses Array
     */
    public static function getAvailableStatuses(): array
    {
        return [
            'new' => 'New',
            'contacted' => 'Contacted',
            'interested' => 'Interested',
            'site_visit_scheduled' => 'Site Visit Scheduled',
            'site_visit_completed' => 'Site Visit Completed',
            'follow_up_required' => 'Follow-up Required',
            'converted' => 'Converted',
            'not_interested' => 'Not Interested',
            'closed' => 'Closed',
        ];
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
        return $query->whereIn('status', ['in_progress', 'interested', 'site_visit_scheduled', 'follow_up_required']);
    }

    public function scopeClosed(Builder $query): Builder
    {
        return $query->whereIn('status', ['closed', 'converted', 'not_interested']);
    }

    /**
     * Status Badge Configuration
     */
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
            'interested' => [
                'label' => 'Interested',
                'bg' => 'bg-indigo-50',
                'text' => 'text-indigo-700',
                'border' => 'border-indigo-200',
                'dot' => 'bg-indigo-500',
            ],
            'site_visit_scheduled' => [
                'label' => 'Visit Scheduled',
                'bg' => 'bg-teal-50',
                'text' => 'text-teal-700',
                'border' => 'border-teal-200',
                'dot' => 'bg-teal-500',
            ],
            'site_visit_completed' => [
                'label' => 'Visit Completed',
                'bg' => 'bg-cyan-50',
                'text' => 'text-cyan-700',
                'border' => 'border-cyan-200',
                'dot' => 'bg-cyan-500',
            ],
            'follow_up_required' => [
                'label' => 'Follow-up Required',
                'bg' => 'bg-amber-50',
                'text' => 'text-amber-700',
                'border' => 'border-amber-200',
                'dot' => 'bg-amber-500',
            ],
            'converted' => [
                'label' => 'Converted',
                'bg' => 'bg-emerald-50',
                'text' => 'text-emerald-700',
                'border' => 'border-emerald-200',
                'dot' => 'bg-emerald-500',
            ],
            'not_interested' => [
                'label' => 'Not Interested',
                'bg' => 'bg-rose-50',
                'text' => 'text-rose-700',
                'border' => 'border-rose-200',
                'dot' => 'bg-rose-500',
            ],
            'closed' => [
                'label' => 'Closed',
                'bg' => 'bg-slate-100',
                'text' => 'text-slate-700',
                'border' => 'border-slate-300',
                'dot' => 'bg-slate-500',
            ],
            'in_progress' => [
                'label' => 'In Progress',
                'bg' => 'bg-amber-50',
                'text' => 'text-amber-700',
                'border' => 'border-amber-200',
                'dot' => 'bg-amber-500',
            ],
            default => [
                'label' => ucfirst(str_replace('_', ' ', $this->status)),
                'bg' => 'bg-slate-100',
                'text' => 'text-slate-700',
                'border' => 'border-slate-200',
                'dot' => 'bg-slate-400',
            ],
        };
    }
}
