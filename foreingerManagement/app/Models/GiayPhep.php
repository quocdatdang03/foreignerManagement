<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiayPhep extends Model
{
    use HasFactory;

    protected $table = 'giay_pheps';
    protected $primaryKey = 'idGiayPhep';
    public $timestamps = false;

    protected $fillable = [
        'idNguoiNuocNgoai',
        'idCoSo',
        'diaChiTamTru',
        'loaiGiayPhep',
        'ngayCap',
        'ngayHetHan',
        'mucDichCapPhep',
        'ngayDuKienRoiKhoi',
        'ngayRoiKhoi',
        'ngayDen',
        'lyDoDen',
        'trangThai',
        'tepDinhKem',
        'lyDoKhongXetDuyet',
    ];

    public function nguoiNuocNgoai()
    {
        return $this->belongsTo(NguoiNuocNgoai::class, 'idNguoiNuocNgoai');
    }

    public function coSo()
    {
        return $this->belongsTo(CoSoLuuTru::class, 'idCoSo');
    }
}
