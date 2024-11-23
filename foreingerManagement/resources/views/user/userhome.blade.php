
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="../fe/image/logo.png">
    <link rel="stylesheet" href="../fe/css/grid.css">
    <link rel="stylesheet" href="../fe/css/header-footer.css">
    <link rel="stylesheet" href="../fe/css/update.css">
    <link rel="stylesheet" href="../fe/css/quanlytaikhoan.css">
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
        <div class="item user" id="user_show">
            <a href="{{ route('user.home') }}">Xin chào {{ Auth::user()->hoVaTen }}</a>
        </div>
    </div>
</div>









<div class="nav">
    <div class="menu">
        <div class="item">Tổng quan</div>
        <div class="item"><a href="./danhsachvanban.html">Văn bản mới</a></div>
        <div class="item"><a href="./thontintaikhoan_tk.html">Thông tin cá nhân</a></div>
        <div class="item"><a href="{{ route('password.change') }}">Đổi mật khẩu</a></div>
        <div class="item"><a href="./thontintaikhoan_cslt.html">Quản lý cơ sở lưu trú</a></div>
        <div class="item"><a href="./dangkykhachtamtru.html">Đăng ký khách tạm trú</a></div>
        <div class="item"><a href="./guiyeucauhotro.html">Gửi yêu cầu hỗ trợ</a></div>
        <div class="item"><a href="#" id="logout" style="color: red">Đăng Xuất</a></div>
        <!-- <div class="item">Quản lý khai báo</div> -->
    </div>


    <div class="main grid">
        <div class="container grid wide updateuser"  id="list_tb">
            <!-- <div class="item_tb" >
                    <a href="">vi phạm</a>
            </div> -->
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
