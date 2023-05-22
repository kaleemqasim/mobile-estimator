<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceHealth extends Model
{
    use HasFactory;

    protected $table = 'device_health';
    protected $guarded = [];
}
