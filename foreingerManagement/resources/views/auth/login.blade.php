<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="icon" href="../fe/image/logo.png">
    <link rel="stylesheet" href="../fe/css/grid.css">
    <link rel="stylesheet" href="../fe/css/header-footer.css">
    <link rel="stylesheet" href="../fe/css/registry.css">
    <script src="../fe/js/jquery.js"></script>
</head>
<body>
    <x-user-header-grid />
    <div class="main grid">
        <div class="router grid wide">
            <a href="">ĐĂNG NHẬP</a>
        </div>
        <div class="container registry login">
            <h3>THÔNG TIN TÀI KHOẢN</h3>
            <div class="boxwide">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div style="color: red; font-size: 14px; margin-bottom: 10px;">
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
                                    <input type="text" id="user" name="email">
                                </div>
                            </div>
                            <div class="item">
                                <p>Mật Khẩu (*):</p>
                                <div class="daybox pass">
                                    <input type="password" id="pass" name="password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checked">
                        <div>
                            <input type="checkbox" name="remember">
                        </div>
                        <div>
                            <label>Lưu mật khẩu</label>
                        </div>
                    </div>
                    <a href="{{ route('password.request') }}" class="repass">Quên mật khẩu</a>
                    <div class="regis">
                        <label>Bạn chưa có tài khoản? <a href="{{ route('register') }}">Hãy đăng ký</a></label>
                        <button type="submit" id="login">Đăng Nhập</button>
                    </div>
                    <div class="google-login">
                        <a href="{{ route('google.login') }}" class="google-btn">
                            <img src="../fe/image/google_logo.png" alt="Google Logo" class="google-logo">
                            <span>Đăng nhập với Google</span>
                        </a>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const emailInput = document.querySelector('input[name="email"]');
            const passwordInput = document.querySelector('input[name="password"]');
            const emailError = document.createElement('div');
            const passwordError = document.createElement('div');

            // Style cho thông báo lỗi
            emailError.style.color = 'red';
            emailError.style.fontSize = '14px';
            emailError.style.marginTop = '5px';

            passwordError.style.color = 'red';
            passwordError.style.fontSize = '14px';
            passwordError.style.marginTop = '5px';

            form.addEventListener('submit', function (event) {
                // Reset thông báo lỗi
                emailError.textContent = '';
                passwordError.textContent = '';
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

                // Validate password
                if (!passwordInput.value.trim()) {
                    passwordError.textContent = 'Vui lòng nhập mật khẩu.';
                    passwordInput.parentNode.appendChild(passwordError);
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
