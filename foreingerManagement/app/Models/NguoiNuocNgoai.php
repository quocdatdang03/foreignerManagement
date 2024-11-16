<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiNuocNgoai extends Model
{
    use HasFactory;

    protected $table = 'nguoi_nuoc_ngoais';
    protected $primaryKey = 'idNguoiNuocNgoai';
    public $timestamps = false;

    protected $fillable = [
        'idQuocTich',
        'hoTen',
        'soPassport',
        'sdt',
        'email',
        'ngaySinh',
    ];

    public function quocTich()
    {
        return $this->belongsTo(QuocTich::class, 'idQuocTich');
    }

    public function giayPheps()
    {
        return $this->hasMany(GiayPhep::class, 'idNguoiNuocNgoai');
    }
}
