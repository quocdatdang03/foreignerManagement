<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    use HasFactory;

    protected $table = 'thong_baos';
    protected $primaryKey = 'idThongBao';
    public $timestamps = false;

    protected $fillable = [
        'idNguoiDung',
        'idCoSo',
        'tieuDe',
        'noiDung',
    ];

    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'idNguoiDung');
    }

    public function coSo()
    {
        return $this->belongsTo(CoSoLuuTru::class, 'idCoSo');
    }
}
