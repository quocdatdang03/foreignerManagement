<?php

namespace App\Models;

use App\Mail\ResetPasswordMail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;

class NguoiDung extends Authenticatable implements CanResetPassword
{
    use HasFactory;

    protected $table = 'nguoi_dungs';
    protected $primaryKey = 'idNguoiDung';
    public $timestamps = false;

    protected $fillable = [
        'idVaiTro',
        'email',
        'sdt',
        'matKhau',
        'hoVaTen',
        'soCCCD',
        'trangThai',
        'google_id',
    ];

    protected $hidden = [
        'matKhau',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->matKhau; // Laravel sử dụng trường "matKhau"
    }

    public function sendPasswordResetNotification($token)
    {
        // Sử dụng Mail để gửi email đặt lại mật khẩu
        Mail::to($this->email)->send(new ResetPasswordMail($token));
    }

    public function vaiTro()
    {
        return $this->belongsTo(VaiTro::class, 'idVaiTro');
    }

    public function thongBaos()
    {
        return $this->hasMany(ThongBao::class, 'idNguoiDung');
    }

    public function coSoLuuTrus()
    {
        return $this->hasMany(CoSoLuuTru::class, 'idNguoiDung');
    }
}
