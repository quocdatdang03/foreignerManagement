<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoSoGiayTo extends Model
{
    use HasFactory;

    protected $table = 'ho_so_giay_tos';
    protected $primaryKey = 'idHoSoGiayTo';
    public $timestamps = false;

    protected $fillable = [
        'idCoSo',
        'loaiGiayTo',
        'tepDinhKem_id',
        'tepDinhKem',
    ];

     public function coSo()
    {
        return $this->belongsTo(CoSoLuuTru::class, 'idCoSo');
    }
}
