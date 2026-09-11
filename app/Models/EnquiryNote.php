<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnquiryNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_enquiry_id',
        'user_id',
        'author_name',
        'note',
    ];

    public function enquiry(): BelongsTo
    {
        return $this->belongsTo(ContactEnquiry::class, 'contact_enquiry_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
