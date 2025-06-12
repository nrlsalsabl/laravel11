<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'image',
    ];

        public function reports()
    {
        // satu residen bisa memiliki banyak laporan
        return $this->hasMany(Report::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
