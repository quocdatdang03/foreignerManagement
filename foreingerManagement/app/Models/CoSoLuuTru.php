<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoSoLuuTru extends Model
{
    use HasFactory;

    protected $table = 'co_so_luu_trus';
    protected $primaryKey = 'idCoSo';
    protected $fillable = [
        'idNguoiDung',
        'idPhuongXa',
        'tenCoSo',
        'diaChiCoSo',
        'sdt',
        'email',
        'loaiHinh',
    ];
}
