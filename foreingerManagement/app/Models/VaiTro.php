<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaiTro extends Model
{
    use HasFactory;

    protected $table = 'vai_tros';
    protected $primaryKey = 'idVaiTro';
    public $timestamps = false;

    protected $fillable = [
        'tenVaiTro',
    ];

     public function nguoiDungs()
    {
        return $this->hasMany(NguoiDung::class, 'idVaiTro');
    }
}
