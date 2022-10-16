<?php

namespace App\Models;

use App\Models\traits\HasReceipt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptStep extends Model
{
    use HasFactory, HasReceipt;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'image',
        'receipt_id',
    ];
}
