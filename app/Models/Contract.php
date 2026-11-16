<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contract extends Model
{
    protected $fillable = ['number', 'partner_name', 'valid_from', 'valid_to'];

    protected function casts(): array
    {
        return [
            'valid_from' => 'date',
            'valid_to' => 'date',
        ];
    }

    public function assets(): BelongsToMany
    {
        return $this->belongsToMany(Asset::class, 'contract_asset')->withPivot('serial_number');
    }
}
