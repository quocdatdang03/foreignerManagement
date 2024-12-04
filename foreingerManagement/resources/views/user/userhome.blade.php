
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
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
    <x-user-header-grid />

    <div class="nav">
        @auth
            <x-user-menu />
        @endauth

        <div class="main grid">
            <div class="container grid wide updateuser"  id="list_tb">
                <div class="item_tb" >
                        <a href="">Trang người dùng</a>
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
        @if(session('user'))
            const user = @json(session('user'));
            localStorage.setItem('currentUser', JSON.stringify(user));
        @endif
    </script>
</body>
</html>
