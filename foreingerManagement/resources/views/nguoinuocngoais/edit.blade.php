<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật Người Nước Ngoài</title>

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
        <h2 class="mb-4">Cập nhật thông tin người nước ngoài</h2>

        <!-- Form to update Giấy phép -->
        <form action="{{ route('nguoinuocngoais.update', $nguoiNuocNgoai->idNguoiNuocNgoai) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row row-cols-2">
                <!-- Họ tên -->
                <div class="mb-3">
                    <label for="hoTen" class="form-label">Họ tên</label>
                    <input type="text" class="form-control @error('hoTen') is-invalid @enderror" id="hoTen" name="hoTen" value="{{ old('hoTen', $nguoiNuocNgoai->hoTen) }}">
                    @error('hoTen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Số passport -->
                <div class="mb-3">
                    <label for="soPassport" class="form-label">Số passport</label>
                    <input type="text" class="form-control @error('soPassport') is-invalid @enderror" id="soPassport" name="soPassport" value="{{ old('soPassport', $nguoiNuocNgoai->soPassport) }}">
                    @error('soPassport')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Số điện thoại -->
                <div class="mb-3">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control @error('sdt') is-invalid @enderror" id="sdt" name="sdt" value="{{ old('sdt', $nguoiNuocNgoai->sdt) }}">
                    @error('sdt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $nguoiNuocNgoai->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Ngày sinh -->
                <div class="mb-3">
                    <label for="ngaySinh" class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control @error('ngaySinh') is-invalid @enderror" id="ngaySinh" name="ngaySinh" value="{{ old('ngaySinh', $nguoiNuocNgoai->ngaySinh) }}">
                    @error('ngaySinh')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Quốc tịch -->
                <div class="mb-3">
                    <label for="idQuocTich" class="form-label">Quốc tịch</label>
                    <select class="form-select @error('idQuocTich') is-invalid @enderror" id="idQuocTich" name="idQuocTich">
                        @foreach ($quocTichs as $quoctich)
                            <option value="{{ $quoctich->idQuocTich }}" {{ old('idQuocTich', $nguoiNuocNgoai->idQuocTich) == $quoctich->idQuocTich ? 'selected' : '' }}>
                                {{ $quoctich->tenQuocTich }}
                            </option>
                        @endforeach
                    </select>
                    @error('idQuocTich')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html