
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


<div class="container" style="max-width: 800px; margin: 50px auto; padding: 20px; text-align: center; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h1 style="font-size: 24px; color: #333; margin-bottom: 20px;">Kết quả tìm kiếm với từ khóa "{{ $keyword }}"</h1>

    @if($results->isEmpty())
    <p style="font-size: 18px; color: #ff0000;">Không tìm thấy kết quả nào.</p>
    @else
    <p style="font-size: 18px; color: #007bff;">Tìm thấy {{ $results->count() }} kết quả:</p>
    <ul style="list-style-type: none; padding: 0; margin: 20px 0;">
        @foreach($results as $result)
        <li style="margin-bottom: 20px; padding: 10px; border: 1px solid #ddd; border-radius: 5px; background-color: #fff; text-align: left; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
            <strong style="font-size: 18px; color: #333;">{{ $result->tenCoSo }}</strong><br>
            <span style="font-size: 16px; color: #555;">Địa chỉ: {{ $result->diaChiCoSo }}</span><br>
            <span style="font-size: 16px; color: #555;">Loại hình: {{ $result->loaiHinh }}</span><br>
            <span style="font-size: 16px; color: #555;">SĐT: {{ $result->sdt }}</span>
        </li>
        @endforeach
    </ul>
    @endif
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
