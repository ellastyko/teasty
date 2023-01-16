<?php

namespace App\Models\traits;

use App\Models\Receipt;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasReceipt
{
    /**
     * @return BelongsTo
     */
    public function receipt(): BelongsTo
    {
        return $this->belongsTo(Receipt::class);
    }
}
