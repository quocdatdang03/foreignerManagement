<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinhThanh extends Model
{
    use HasFactory;

    protected $table = 'TinhThanh';
    protected $primaryKey = 'idTinhThanh';
    public $timestamps = false;

    protected $fillable = [
        'tenTinhThanh',
    ];

     public function quanHuyens()
    {
        return $this->hasMany(QuanHuyen::class, 'idTinhThanh');
    }
}
