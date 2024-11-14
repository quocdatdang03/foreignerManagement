<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuocTich extends Model
{
    use HasFactory;

    protected $table = 'quoc_tich';
    protected $primaryKey = 'idQuocTich';
    public $timestamps = false;

    protected $fillable = [
        'tenQuocTich',
    ];
}
