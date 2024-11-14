<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    use HasFactory;

    protected $table = 'nguoi_dung';
    protected $primaryKey = 'idNguoiDung';
    public $timestamps = false;

    protected $fillable = [
        'idVaiTro',
        'email',
        'sdt',
        'matKhau',
        'hoVaTen',
        'soCCCD',
        'trangThai',
    ];

     public function vaiTro()
    {
        return $this->belongsTo(VaiTro::class, 'idVaiTro');
    }

    public function thongBaos()
    {
        return $this->hasMany(ThongBao::class, 'idNguoiDung');
    }

    public function coSoLuuTrus()
    {
        return $this->hasMany(CoSoLuuTru::class, 'idNguoiDung');
    }
}
