<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật Cơ sở lưu trú</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        .form-label {
            font-weight: 500;
            color: #0F78B5;
        }

        .form-label::after {
            content: '*';
            color: red;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
    <div class="mx-auto" style="max-width: 800px;">
        <h2 class="mb-4">Cập nhật Cơ sở lưu trú</h2>

        <form action="/cosoluutrus/{{ $cosoluutru->idCoSo }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="tenCoSo" class="form-label">Tên cơ sở</label>
                        <input type="text" class="form-control @error('tenCoSo') is-invalid @enderror" id="tenCoSo" name="tenCoSo" value="{{ old('hoTen',$cosoluutru->tenCoSo) }} " >
                        @error('tenCoSo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mb-3">
                        <label for="chuCoSo" class="form-label">Chủ cơ sở</label>
                        <input type="text" class="form-control" id="chuCoSo" name="chuCoSo" value="{{ old('chuCoSo', $cosoluutru->nguoiDung->hoVaTen) }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="diaChiCoSo" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control @error('diaChiCoSo') is-invalid @enderror" id="diaChiCoSo" name="diaChiCoSo" value="{{ old('sdt', $cosoluutru->diaChiCoSo) }}">
                        @error('diaChiCoSo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 mb-3">
                        <label for="tinhThanh" class="form-label">Tỉnh /thành phố</label>
                        <select class="form-select @error('tinhThanh') is-invalid @enderror" id="tinhThanh" name="tinhThanh">
                            @foreach ($tinhThanhs as $tinhThanh)
                                <option value="{{ $tinhThanh->idTinhThanh }}" {{  $cosoluutru->phuongXa->quanHuyen->idTinhThanh == $tinhThanh->idTinhThanh ? 'selected' : '' }}>
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
                            @foreach ($quanHuyens as $quanHuyen)
                                <option value="{{ $quanHuyen->idQuanHuyen }}" {{  $cosoluutru->phuongXa->idQuanHuyen == $quanHuyen->idQuanHuyen ? 'selected' : '' }}>
                                    {{ $quanHuyen->tenQuanHuyen }}
                                </option>
                            @endforeach
                        </select>
                        @error('idQuocTich')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-4 mb-3">
                        <label for="phuongXa" class="form-label">Phường /xã</label>
                        <select class="form-select @error('phuongXa') is-invalid @enderror" id="phuongXa" name="phuongXa">
                            @foreach ($phuongXas as $phuongXa)
                                <option value="{{ $phuongXa->idPhuongXa }}" {{ $cosoluutru->idPhuongXa == $phuongXa->idPhuongXa ? 'selected' : '' }}>
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
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $cosoluutru->email )}}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mb-3">
                        <label for="sdt" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control @error('sdt') is-invalid @enderror" id="sdt" name="sdt" value="{{ old('sdt', $cosoluutru->sdt) }}">
                        @error('sdt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="loaiHinh" class="form-label">Loại hình</label>
                        <select class="form-control @error('loaiHinh') is-invalid @enderror" id="loaiHinh" name="loaiHinh">
                            <option value=""></option>
                            @foreach($loaiHinhs as $loaiHinh)
                            <option value="{{ $loaiHinh }}" {{ old('loaiHinh', $cosoluutru->loaiHinh) == $loaiHinh ? 'selected' : '' }}>
                                {{ $loaiHinh }}
                            </option>
            @endforeach
                        </select>
                        @error('loaiHinh')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary" style="float: right">Cập nhật</button>
        </form>
        {{-- @if ($errors->any())
        <div>
        @foreach ($errors->all() as $error)
            <p class="text-danger">
                {{ $error }}
            </p>
        @endforeach
        </div>

        @endif --}}
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/diachi.js') }}"></script>

</body>
</html
