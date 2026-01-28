<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class layanan extends Model
{
    protected $guarded = [];
    protected $casts = [
        'desk_layanan' => 'array',
    ];
}
