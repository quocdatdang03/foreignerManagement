<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giấy phép không được phê duyệt</title>
</head>
<body>
    <h1>Thông báo phê duyệt giấy phép tạm trú</h1>
    <p>Giấy phép người nước ngoài không được phê duyệt. Dưới đây là thông tin chi tiết:</p>
    <ul>
        <li><strong>Họ tên:</strong> {{ $giayPhep->nguoiNuocNgoai->hoTen }}</li>
        <li><strong>Số passport:</strong> {{ $giayPhep->nguoiNuocNgoai->soPassport }}</li>
        <li><strong>Quốc tịch:</strong> {{ $giayPhep->nguoiNuocNgoai->quocTich->tenQuocTich }}</li>
        <li><strong>Ngày đến:</strong> {{ \Carbon\Carbon::parse($giayPhep->ngayDen)->format('d/m/Y') }}</li>
        <li><strong>Ngày dự kiến rời khỏi:</strong> {{ \Carbon\Carbon::parse($giayPhep->ngayDuKienRoiKhoi)->format('d/m/Y') }}</li>
        <li><strong>Lý do đến:</strong> {{ $giayPhep->lyDoDen }}</li>
        <li><strong>Chủ cơ sở lưu trú:</strong> {{ $giayPhep->coSo->nguoiDung->hoVaTen }}</li>
        <li><strong>Địa chỉ cơ sở lưu trú:</strong> {{ $giayPhep->coSo->diaChiCoSo }}</li>
        <li><strong>Trạng thái:</strong><span style="color: red;"> {{ $giayPhep->trangThai }}</span></li>
        <li><strong>Lý do không phê duyệt:</strong> {{ $giayPhep->lyDoKhongXetDuyet }}</li>
    </ul>
</body>
</html>
