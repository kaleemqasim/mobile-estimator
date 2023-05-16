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

    public function capacity() {
        return $this->hasOne(DeviceCapacity::class, 'device_id', 'id');
    }

    public function color() {
        return $this->hasOne(DeviceColor::class, 'device_id', 'id');
    }
    public function device_health() {
        return $this->hasOne(DeviceHealth::class, 'device_id', 'id');
    }
    public function screen_problem() {
        return $this->hasOne(ScreenProblem::class, 'device_id', 'id');
    }
    public function back_side_probem() {
        return $this->hasOne(BackSideProblem::class, 'device_id', 'id');
    }
}
