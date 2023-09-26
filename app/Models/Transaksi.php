<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nominal',
        'keterangan',
        'tanggal',
        'jenis_id',
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['create_at'])
            ->translatedFormat('1. d F Y');
    }

    use SoftDeletes;

    protected $table = "transaksi";
    protected $dates = ['deleted_at'];
}
