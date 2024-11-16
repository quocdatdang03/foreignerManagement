<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuocTich extends Model
{
    use HasFactory;

    protected $table = 'quoc_tichs';
    protected $primaryKey = 'idQuocTich';
    public $timestamps = false;

    protected $fillable = [
        'tenQuocTich',
    ];

     public function nguoiNuocNgoais()
    {
        return $this->hasMany(NguoiNuocNgoai::class, 'idQuocTich');
    }
}
