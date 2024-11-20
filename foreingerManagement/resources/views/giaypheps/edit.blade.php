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
        <h2 class="mb-4">Cập nhật giấy phép</h2>

        {{-- <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <!-- Form to update Giấy phép -->
        <form action="{{ route('giaypheps.update', $giayPhep->idGiayPhep) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row row-cols-2">
                <!-- Họ tên -->
                <div class="mb-3">
                    <label for="hoTen" class="form-label">Họ tên</label>
                    <input type="text" class="form-control @error('hoTen') is-invalid @enderror" id="hoTen" name="hoTen" value="{{ old('hoTen', $giayPhep->nguoiNuocNgoai->hoTen) }}">
                    @error('hoTen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Số passport -->
                <div class="mb-3">
                    <label for="soPassport" class="form-label">Số passport</label>
                    <input type="text" class="form-control @error('soPassport') is-invalid @enderror" id="soPassport" name="soPassport" value="{{ old('soPassport', $giayPhep->nguoiNuocNgoai->soPassport) }}">
                    @error('soPassport')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Số điện thoại -->
                <div class="mb-3">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control @error('sdt') is-invalid @enderror" id="sdt" name="sdt" value="{{ old('sdt', $giayPhep->nguoiNuocNgoai->sdt) }}">
                    @error('sdt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $giayPhep->nguoiNuocNgoai->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Ngày sinh -->
                <div class="mb-3">
                    <label for="ngaySinh" class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control @error('ngaySinh') is-invalid @enderror" id="ngaySinh" name="ngaySinh" value="{{ old('ngaySinh', $giayPhep->nguoiNuocNgoai->ngaySinh) }}">
                    @error('ngaySinh')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Ngày đến -->
                <div class="mb-3">
                    <label for="ngayDen" class="form-label">Ngày đến</label>
                    <input type="date" class="form-control @error('ngayDen') is-invalid @enderror" id="ngayDen" name="ngayDen" value="{{ old('ngayDen', $giayPhep->ngayDen ? \Carbon\Carbon::parse($giayPhep->ngayDen)->format('Y-m-d') : '') }}">
                    @error('ngayDen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Ngày dự kiến rời khỏi -->
                <div class="mb-3">
                    <label for="ngayDuKienRoiKhoi" class="form-label">Ngày dự kiến rời khỏi</label>
                    <input type="date" class="form-control @error('ngayDuKienRoiKhoi') is-invalid @enderror" id="ngayDuKienRoiKhoi" name="ngayDuKienRoiKhoi" value="{{ old('ngayDuKienRoiKhoi', $giayPhep->ngayDuKienRoiKhoi ? \Carbon\Carbon::parse($giayPhep->ngayDuKienRoiKhoi)->format('Y-m-d') : '') }}">
                    @error('ngayDuKienRoiKhoi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Lý do đến -->
                <div class="mb-3">
                    <label for="lyDoDen" class="form-label">Lý do đến</label>
                    <input type="text" class="form-control @error('lyDoDen') is-invalid @enderror" id="lyDoDen" name="lyDoDen" value="{{ old('lyDoDen', $giayPhep->lyDoDen) }}">
                    @error('lyDoDen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Quốc tịch -->
                <div class="mb-3">
                    <label for="idQuocTich" class="form-label">Quốc tịch</label>
                    <select class="form-select @error('idQuocTich') is-invalid @enderror" id="idQuocTich" name="idQuocTich">
                        @foreach ($quocTichs as $quoctich)
                            <option value="{{ $quoctich->idQuocTich }}" {{ old('idQuocTich', $giayPhep->nguoiNuocNgoai->idQuocTich) == $quoctich->idQuocTich ? 'selected' : '' }}>
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
                    <select class="form-select @error('idCoSo') is-invalid @enderror" id="idCoSo" name="idCoSo">
                        @foreach ($coSos as $coso)
                            <option value="{{ $coso->idCoSo }}" {{ old('idCoSo', $giayPhep->idCoSo) == $coso->idCoSo ? 'selected' : '' }}>
                                {{ $coso->tenCoSo }}
                            </option>
                        @endforeach
                    </select>
                    @error('idCoSo')
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