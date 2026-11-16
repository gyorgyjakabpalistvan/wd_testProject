<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiLog extends Model
{
    public const UPDATED_AT = null;

    protected $fillable = ['method', 'url', 'request_body', 'response_status', 'response_body'];
}
