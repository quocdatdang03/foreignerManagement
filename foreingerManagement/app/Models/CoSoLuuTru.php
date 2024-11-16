<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoSoLuuTru extends Model
{
    use HasFactory;

    protected $table = 'co_so_luu_trus';
    protected $primaryKey = 'idCoSo';
    public $timestamps = false;

    protected $fillable = [
        'idNguoiDung',
        'idPhuongXa',
        'tenCoSo',
        'diaChiCoSo',
        'sdt',
        'email',
        'loaiHinh',
    ];

     public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'idNguoiDung');
    }

    public function phuongXa()
    {
        return $this->belongsTo(PhuongXa::class, 'idPhuongXa');
    }

    public function hoSoGiayTos()
    {
        return $this->hasMany(HoSoGiayTo::class, 'idCoSo');
    }

    public function thongBaos()
    {
        return $this->hasMany(ThongBao::class, 'idCoSo');
    }

    public function giayPheps()
    {
        return $this->hasMany(GiayPhep::class, 'idCoSo');
    }
}
