<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{ 
    use SoftDeletes;

    protected $fillable = [
        'code',
        'resident_id',
        'report_category_id',
        'title',
        'description',
        'image',
        'latitude',
        'longitude',
        'address',
    ];

    public function resident()
    {
        // satu laporan dimiliki oleh satu resident
        return $this->belongsTo(Resident::class);
    }

    public function category()
    {
        // satu laporan dimiliki oleh satu category
        return $this->belongsTo(ReportCategory::class);
    }

    public function statuses()
    {
        return $this->hasMany(ReportStatus::class);
    }
}
