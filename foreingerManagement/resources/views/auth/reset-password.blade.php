<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Lại Mật Khẩu</title>
    <link rel="icon" href="../fe/image/logo.png">
    <link rel="stylesheet" href="../fe/css/grid.css">
    <link rel="stylesheet" href="../fe/css/header-footer.css">
    <link rel="stylesheet" href="../fe/css/registry.css">
    <script src="../fe/js/jquery.js"></script>
</head>
<body>
<div class="header grid">
    <div class="container gridhead wide">
        <div class="item">
            <div class="logo">
                <a href="./home.html"><img src="../fe/image/logo.png" alt=""></a>
            </div>
        </div>
        <div class="item">
            <a href="">TRANG CHỦ</a>
        </div>
        <div class="item">
            <a href="">GIỚI THIỆU</a>
        </div>
        <div class="item">
            <a href="">THỦ TỤC</a>
        </div>
        <div class="item">
            <a href="">QUY ĐỊNH</a>
        </div>
        <div class="item">
            <a href="">HỖ TRỢ</a>
        </div>
        <div class="item">
            <a href="">THÔNG TIN</a>
        </div>
        <div class="item">
            <a href="">TIN TỨC</a>
        </div>
        <div class="item">
            <a href="">LIÊN HỆ</a>
        </div>
        <div class="item seach">
            <input type="text">
        </div>
        <div class="item user">
            <a href="{{ route('login') }}">ĐĂNG NHẬP</a>
        </div>
    </div>
</div>

<div class="main grid">
    <div class="router grid wide">
        <a href="">ĐẶT LẠI MẬT KHẨU</a>
    </div>
    <div class="container registry login">
        <h3>ĐẶT LẠI MẬT KHẨU</h3>
        <div class="boxwide">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Token Reset -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Hiển thị lỗi chung -->
                @if ($errors->any())
                <div style="color: red; font-size: 14px; margin-bottom: 10px;">
                    {{ $errors->first() }}
                </div>
                @endif

                <div class="box">
                    <div class="col">
                        <div class="item">
                            <p>Email (*):</p>
                            <div class="daybox acc">
                                <input type="email" name="email" value="{{ old('email', $request->email) }}" required>
                                @if ($errors->has('email'))
                                <div style="color: red; font-size: 12px;">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="item">
                            <p>Mật Khẩu Mới (*):</p>
                            <div class="daybox pass">
                                <input type="password" name="password" required>
                                @if ($errors->has('password'))
                                <div style="color: red; font-size: 12px;">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="item">
                            <p>Nhập Lại Mật Khẩu (*):</p>
                            <div class="daybox pass">
                                <input type="password" name="password_confirmation" required>
                                @if ($errors->has('password_confirmation'))
                                <div style="color: red; font-size: 12px;">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="regis">
                    <button type="submit">Đặt lại mật khẩu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="footer grid">
    <div class="container gridfoot" >
        <div class="logo">
            <img src="../fe/image/logo.png" alt="">
        </div>
        <div class="info">
            <h3>BẢN QUYỀN CỦA ỦY BAN NHÂN DÂN THÀNH PHỐ ĐÀ NẴNG</h3>
            <p><b>Giấy phép:</b> 612/GP-STTTT cấp ngày 21 tháng 10 năm 2016.</p>
            <p><b>Trưởng Ban biên tập:</b> Trần Chí Cường, Phó Chủ tịch UBND thành phố.</p>
            <p><b>Trụ sở:</b> 24 Trần Phú, P.Thạch Thang, Q. Hải Châu, TP. Đà Nẵng.</p>
            <p><b>Điện thoại:</b> (+84.236) 3.817.366 </p>
            <p><b>Email:</b> toasoan@danang.gov.vn</p>
        </div>
    </div>
</div>
</body>
</html>
