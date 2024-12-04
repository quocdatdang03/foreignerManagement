
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="icon" href="../fe/image/logo.png">
    <link rel="stylesheet" href="../fe/css/grid.css">
    <link rel="stylesheet" href="../fe/css/header-footer.css">
    <link rel="stylesheet" href="../fe/css/update.css">
    <link rel="stylesheet" href="../fe/css/quanlytaikhoan.css">
    <link rel="stylesheet" href="../fe/css/registry.css">
    <link rel="stylesheet" href="../fe/css/menu.css">
    <style>
        .updateuser{
            margin-top: 100px;
        }
        .item_tb{
            margin:30px 0px 0px 30px;
        }

        .item_tb a{
            font-size: 25px;
            color: red;

        }

        .item_tb a:hover{

            color: rgb(255, 141, 141);

        }
    </style>
</head>
<body>
    <x-user-header-grid />

    <div class="nav">
        <x-user-menu />

        <div class="main grid">
            <div class="container registry login">
                <h3>Đổi Mật Khẩu</h3>
                <div class="boxwide">
                    @if (session('success'))
                    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
                    @endif

                    @if ($errors->any())
                    <div style="color: red; margin-bottom: 10px;">
                        {{ $errors->first() }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="box">
                            <div class="col">
                                <div class="item">
                                    <p>Mật Khẩu Hiện Tại:</p>
                                    <div class="daybox pass">
                                        <input type="password" name="current_password" required>
                                    </div>
                                </div>
                                <div class="item">
                                    <p>Mật Khẩu Mới:</p>
                                    <div class="daybox pass">
                                        <input type="password" name="new_password" required>
                                    </div>
                                </div>
                                <div class="item">
                                    <p>Nhập Lại Mật Khẩu Mới:</p>
                                    <div class="daybox pass">
                                        <input type="password" name="new_password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="regis">
                            <button type="submit">Đổi Mật Khẩu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer grid">
        <div class="container gridfoot" >
            <div class="logo">
                <img src="./image/logo.png" alt="">
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
        document.getElementById('logout').addEventListener('click', function (event) {
            event.preventDefault(); // Ngăn không chuyển hướng
            const form = document.createElement('form'); // Tạo một form ẩn
            form.method = 'POST';
            form.action = "{{ route('logout') }}"; // Route đăng xuất Laravel
            form.innerHTML = `
                @csrf
            `;
            document.body.appendChild(form); // Thêm form vào body
            form.submit(); // Gửi form
        });
    </script>
</body>
</html>
