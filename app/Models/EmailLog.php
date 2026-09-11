<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_enquiry_id',
        'mail_type',
        'recipient_email',
        'subject',
        'status',
        'error_message',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function enquiry(): BelongsTo
    {
        return $this->belongsTo(ContactEnquiry::class, 'contact_enquiry_id');
    }
}
