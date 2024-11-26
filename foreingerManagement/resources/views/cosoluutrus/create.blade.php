<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm cơ sở lưu trú</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Thêm jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
        label {
            font-weight: 500;
        }

        label::after {
            content: '*';
            color: red;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="mx-auto" style="max-width: 500px;">
            <h2 class="mb-4">Thêm cơ sở lưu trú</h2>

            <form action="{{ route('cosoluutrus.store') }}" method="POST">
                @csrf
                <div >
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="idNguoiDung" class="form-label">Chọn người dùng</label>
                            <input type="text" id="idNguoiDung" name="idNguoiDung" class="form-control" placeholder="Nhập tên người dùng">

                            <input type="hidden" id="idNguoiDungHidden" name="idNguoiDungHidden">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="tenCoSo" class="form-label">Tên cơ sở</label>
                            <input type="text" class="form-control @error('tenCoSo') is-invalid @enderror" id="tenCoSo" name="tenCoSo" >
                            @error('tenCoSo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="diaChiCoSo" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control @error('sdt') is-invalid @enderror" id="diaChiCoSo" name="diaChiCoSo">
                            @error('diaChiCoSo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mb-3">
                            <label for="tinhThanh" class="form-label">Tỉnh /thành phố</label>
                            <select class="form-select @error('tinhThanh') is-invalid @enderror" id="tinhThanh" name="tinhThanh">
                                <option value="" selected></option>
                                @foreach ($tinhThanhs as $tinhThanh)
                                    <option value="{{ $tinhThanh->idTinhThanh }}">
                                        {{ $tinhThanh->tenTinhThanh }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tinhThanh')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-4 mb-3">
                            <label for="quanHuyen" class="form-label">Quận huyện</label>
                            <select class="form-select @error('quanHuyen') is-invalid @enderror" id="quanHuyen" name="quanHuyen">
                                <option value="" selected></option>
                                @foreach ($quanHuyens as $quanHuyen)
                                    <option value="{{ $quanHuyen->idQuanHuyen }}">
                                        {{ $quanHuyen->tenQuanHuyen }}
                                    </option>
                                @endforeach
                            </select>
                            @error('quanHuyen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-4 mb-3">
                            <label for="phuongXa" class="form-label">Phường /xã</label>
                            <select class="form-select @error('phuongXa') is-invalid @enderror" id="phuongXa" name="phuongXa">
                                <option value="" selected></option>
                                @foreach ($phuongXas as $phuongXa)
                                    <option value="{{ $phuongXa->idPhuongXa }}">
                                        {{ $phuongXa->tenPhuongXa }}
                                    </option>
                                @endforeach
                            </select>
                            @error('phuongXa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="sdt" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control @error('sdt') is-invalid @enderror" id="sdt" name="sdt">
                            @error('sdt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="loaiHinh" class="form-label">Loại hình</label>
                            <input type="text" class="form-control @error('loaiHinh') is-invalid @enderror" id="loaiHinh" name="loaiHinh">
                            @error('loaiHinh')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="float: right">Đăng ký</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/timnguoidung.js') }}"></script>
    <script src="{{ asset('js/diachi.js') }}"></script>


</body>
</html>
