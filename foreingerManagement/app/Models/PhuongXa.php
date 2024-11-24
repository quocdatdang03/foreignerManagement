<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuongXa extends Model
{
    use HasFactory;

    protected $table = 'phuong_xas';
    protected $primaryKey = 'idPhuongXa';
    public $timestamps = false;

    protected $fillable = [
        'idQuanHuyen',
        'tenPhuongXa',
    ];

    public function quanHuyen()
    {
        return $this->belongsTo(QuanHuyen::class, 'idQuanHuyen');
    }

    public function coSoLuuTrus()
    {
        return $this->hasMany(CoSoLuuTru::class, 'idPhuongXa');
    }
    
}
