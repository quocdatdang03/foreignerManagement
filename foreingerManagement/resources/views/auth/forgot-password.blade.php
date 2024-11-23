<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên Mật Khẩu</title>
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
        <a href="">QUÊN MẬT KHẨU</a>
    </div>
    <div class="container registry login">
        <h3>QUÊN MẬT KHẨU</h3>
        <div class="boxwide">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div style="color: green; font-size: 14px; margin-bottom: 10px;">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>
                <div class="box">
                    <div class="col">
                        <div class="item">
                            <p>Email (*):</p>
                            <div class="daybox acc">
                                <input type="email" id="user" name="email" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="regis">
                    <label>Vui lòng nhập email để nhận liên kết đặt lại mật khẩu.</label>
                    <button type="submit" id="forgot-password">Gửi Liên Kết</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="footer grid">
    <div class="container gridfoot">
        <div class="logo">
            <img src="../fe/image/logo.png" alt="">
        </div>
        <div class="info">
            <h3>BẢN QUYỀN CỦA ỦY BAN NHÂN DÂN THÀNH PHỐ ĐÀ NẴNG</h3>
            <p><b>Giấy phép:</b> 612/GP-STTTT cấp ngày 21 tháng 10 năm 2016.</p>
            <p><b>Trưởng Ban biên tập:</b> Trần Chí Cường, Phó Chủ tịch UBND thành phố.</p>
            <p><b>Trụ sở:</b> 24 Trần Phú, P.Thạch Thang, Q. Hải Châu, TP. Đà Nẵng.</p>
            <p><b>Điện thoại:</b> (+84.236) 3.817.366</p>
            <p><b>Email:</b> toasoan@danang.gov.vn</p>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        const emailInput = document.querySelector('input[name="email"]');
        const emailError = document.createElement('div');

        // Style cho thông báo lỗi
        emailError.style.color = 'red';
        emailError.style.fontSize = '14px';
        emailError.style.marginTop = '5px';

        form.addEventListener('submit', function (event) {
            // Reset thông báo lỗi
            emailError.textContent = '';
            let hasError = false;

            // Validate email
            if (!emailInput.value.trim()) {
                emailError.textContent = 'Vui lòng nhập email.';
                emailInput.parentNode.appendChild(emailError);
                hasError = true;
            } else if (!validateEmail(emailInput.value.trim())) {
                emailError.textContent = 'Email không đúng định dạng.';
                emailInput.parentNode.appendChild(emailError);
                hasError = true;
            }

            // Ngăn form submit nếu có lỗi
            if (hasError) {
                event.preventDefault();
            }
        });

        // Hàm kiểm tra định dạng email
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    });
</script>
</body>
</html>
