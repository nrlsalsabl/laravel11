<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;

class Resident extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'avatar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reports()
    {
        // satu residen bisa memiliki banyak laporan
        return $this->hasMany(Report::class);
    }
}
