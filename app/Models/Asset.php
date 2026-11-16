<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Asset extends Model
{
    protected $fillable = ['name', 'description'];

    public function contracts(): BelongsToMany
    {
        return $this->belongsToMany(Contract::class, 'contract_asset')->withPivot('serial_number');
    }
}
