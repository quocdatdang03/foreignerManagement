<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
    use HasFactory;

    protected $table = 'quan_huyens';
    protected $primaryKey = 'idQuanHuyen';
    public $timestamps = false;

    protected $fillable = [
        'idTinhThanh',
        'tenQuanHuyen',
    ];

    public function tinhThanh()
    {
        return $this->belongsTo(TinhThanh::class, 'idTinhThanh');
    }

    public function phuongXas()
    {
        return $this->hasMany(PhuongXa::class, 'idQuanHuyen');
    }
}
