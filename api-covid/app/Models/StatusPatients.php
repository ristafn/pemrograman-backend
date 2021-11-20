<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPatients extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    public function patient() {
        return $this->hasMany(Patients::class);
    }
}
