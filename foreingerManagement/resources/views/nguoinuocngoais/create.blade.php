<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký Người Nước Ngoài</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        .invalid-feedback {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="mx-auto" style="max-width: 500px;">
            <h2 class="mb-4">Đăng ký khách tạm trú</h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('nguoinuocngoais.store') }}" method="POST">
                @csrf

               <div class="row row-cols-2">
                 <!-- Họ tên -->
                <div class="mb-3">
                    <label for="hoTen" class="form-label">Họ tên</label>
                    <input type="text" class="form-control @error('hoTen') is-invalid @enderror" id="hoTen" name="hoTen" value="{{ old('hoTen') }}" >
                    @error('hoTen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Ngày sinh -->
                <div class="mb-3">
                    <label for="ngaySinh" class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control @error('ngaySinh') is-invalid @enderror" id="ngaySinh" name="ngaySinh" value="{{ old('ngaySinh') }}" >
                    @error('ngaySinh')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                

                <!-- Số điện thoại -->
                <div class="mb-3">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control @error('sdt') is-invalid @enderror" id="sdt" name="sdt" value="{{ old('sdt') }}" >
                    @error('sdt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

               <!-- Số Passport -->
                <div class="mb-3">
                    <label for="soPassport" class="form-label">Số Passport</label>
                    <input type="text" class="form-control @error('soPassport') is-invalid @enderror" id="soPassport" name="soPassport" value="{{ old('soPassport') }}" >
                    @error('soPassport')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Ngày đến -->
                <div class="mb-3">
                    <label for="ngayDen" class="form-label">Ngày đến</label>
                    <input type="date" class="form-control @error('ngayDen') is-invalid @enderror" id="ngayDen" name="ngayDen" value="{{ old('ngayDen') }}" >
                    @error('ngayDen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Lý do đến -->
                <div class="mb-3">
                    <label for="lyDoDen" class="form-label">Lý do đến</label>
                    <input type="text" class="form-control @error('lyDoDen') is-invalid @enderror" id="lyDoDen" name="lyDoDen" value="{{ old('lyDoDen') }}" >
                    @error('lyDoDen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Ngày dự kiến rời khỏi -->
                <div class="mb-3">
                    <label for="ngayDuKienRoiKhoi" class="form-label">Ngày dự kiến rời khỏi</label>
                    <input type="date" class="form-control @error('ngayDuKienRoiKhoi') is-invalid @enderror" id="ngayDuKienRoiKhoi" name="ngayDuKienRoiKhoi" value="{{ old('ngayDuKienRoiKhoi') }}" >
                    @error('ngayDuKienRoiKhoi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Quốc tịch -->
                <div class="mb-3">
                    <label for="idQuocTich" class="form-label">Quốc tịch</label>
                    <select class="form-select @error('idQuocTich') is-invalid @enderror" id="idQuocTich" name="idQuocTich" >
                        @foreach ($quoctichs as $quoctich)
                            <option value="{{ $quoctich->idQuocTich }}" {{ old('idQuocTich') == $quoctich->idQuocTich ? 'selected' : '' }}>
                                {{ $quoctich->tenQuocTich }}
                            </option>
                        @endforeach
                    </select>
                    @error('idQuocTich')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Cơ sở lưu trú -->
                <div class="mb-3">
                    <label for="idCoSo" class="form-label">Cơ sở lưu trú</label>
                    <select class="form-select @error('idCoSo') is-invalid @enderror" id="idCoSo" name="idCoSo" >
                        @foreach ($cosos as $coso)
                            <option value="{{ $coso->idCoSo }}" {{ old('idCoSo') == $coso->idCoSo ? 'selected' : '' }}>
                                {{ $coso->tenCoSo }}
                            </option>
                        @endforeach
                    </select>
                    @error('idCoSo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

                <button type="submit" class="btn btn-primary">Đăng ký</button>
                <a href="{{ route('giaypheps.index') }}" class="btn btn-primary">Xem danh sách thông tin khách tạm trú</a>
            </form>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
