<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    public function device_type() {
        return $this->hasOne(DeviceType::class, 'id', 'device_type_id');
    }

    public function capacities() {
        return $this->hasMany(DeviceCapacity::class, 'device_id', 'id');
    }

    public function colors() {
        return $this->hasMany(DeviceColor::class, 'device_id', 'id');
    }
}
