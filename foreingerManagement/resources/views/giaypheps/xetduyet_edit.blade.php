<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khai báo tạm trú</title>
    <link rel="icon" href="{{ asset('fe/image/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/header-footer.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/update.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/quanlytaikhoan.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/registry.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/menu.css') }}">

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
    <x-user-header-grid />

    <div class="nav">
        <x-admin-menu />

        <div class="main mt-5 container w-75">
            <h2 class="mb-4">Thông tin chi tiết của khai báo tạm trú</h2>
    
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
            <div class="row row-cols-2">
                <!-- Họ tên -->
                <div class="mb-3">
                    <label for="hoTen" class="form-label">Họ tên</label>
                    <input type="text" class="form-control @error('hoTen') is-invalid @enderror" id="hoTen" name="hoTen" value="{{ old('hoTen', $giayPhep->nguoiNuocNgoai->hoTen) }}" readonly>
                    @error('hoTen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Số passport -->
                <div class="mb-3">
                    <label for="soPassport" class="form-label">Số passport</label>
                    <input type="text" class="form-control @error('soPassport') is-invalid @enderror" id="soPassport" name="soPassport" value="{{ old('soPassport', $giayPhep->nguoiNuocNgoai->soPassport) }}" readonly>
                    @error('soPassport')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Số điện thoại -->
                <div class="mb-3">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control @error('sdt') is-invalid @enderror" id="sdt" name="sdt" value="{{ old('sdt', $giayPhep->nguoiNuocNgoai->sdt) }}" readonly>
                    @error('sdt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $giayPhep->nguoiNuocNgoai->email) }}" readonly>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Ngày sinh -->
                <div class="mb-3">
                    <label for="ngaySinh" class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control @error('ngaySinh') is-invalid @enderror" id="ngaySinh" name="ngaySinh" value="{{ old('ngaySinh', $giayPhep->nguoiNuocNgoai->ngaySinh) }}" readonly>
                    @error('ngaySinh')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Ngày đến -->
                <div class="mb-3">
                    <label for="ngayDen" class="form-label">Ngày đến</label>
                    <input type="date" class="form-control @error('ngayDen') is-invalid @enderror" id="ngayDen" name="ngayDen" value="{{ old('ngayDen', $giayPhep->ngayDen ? \Carbon\Carbon::parse($giayPhep->ngayDen)->format('Y-m-d') : '') }}" readonly>
                    @error('ngayDen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Ngày dự kiến rời khỏi -->
                <div class="mb-3">
                    <label for="ngayDuKienRoiKhoi" class="form-label">Ngày dự kiến rời khỏi</label>
                    <input type="date" class="form-control @error('ngayDuKienRoiKhoi') is-invalid @enderror" id="ngayDuKienRoiKhoi" name="ngayDuKienRoiKhoi" value="{{ old('ngayDuKienRoiKhoi', $giayPhep->ngayDuKienRoiKhoi ? \Carbon\Carbon::parse($giayPhep->ngayDuKienRoiKhoi)->format('Y-m-d') : '') }}" readonly>
                    @error('ngayDuKienRoiKhoi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Lý do đến -->
                <div class="mb-3">
                    <label for="lyDoDen" class="form-label">Lý do đến</label>
                    <input type="text" class="form-control @error('lyDoDen') is-invalid @enderror" id="lyDoDen" name="lyDoDen" value="{{ old('lyDoDen', $giayPhep->lyDoDen) }}" readonly>
                    @error('lyDoDen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Quốc tịch -->
                <div class="mb-3">
                    <label for="idQuocTich" class="form-label">Quốc tịch</label>
                    <input type="text" class="form-control @error('idQuocTich') is-invalid @enderror" id="idQuocTich" value="{{ old('idQuocTich', $giayPhep->nguoiNuocNgoai->quocTich->tenQuocTich) }}" readonly>
                    <!-- Hidden field -->
                    <input type="hidden" name="idQuocTich" value="{{ old('idQuocTich', $giayPhep->nguoiNuocNgoai->idQuocTich) }}">
                    @error('idQuocTich')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Cơ sở lưu trú -->
                <div class="mb-3">
                    <label for="idCoSo" class="form-label">Cơ sở lưu trú</label>
                    <input type="text" class="form-control @error('idCoSo') is-invalid @enderror" id="idCoSo" value="{{ old('idCoSo', $giayPhep->coSo->tenCoSo) }}" readonly>
                    <!-- Hidden field -->
                    <input type="hidden" name="idCoSo" value="{{ old('idCoSo', $giayPhep->idCoSo) }}">
                    @error('idCoSo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                {{-- <!-- Trạng thái -->
                <div class="mb-3">
                        <label for="trangThai" class="form-label">Trạng thái giấy phép</label>
                        <input type="text" class="form-control @error('trangThai') is-invalid @enderror" id="trangThai" name="trangThai" value="{{ old('trangThai', $giayPhep->trangThai) }}" readonly>
                        @error('trangThai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div> --}}
                {{-- Trạng thái --}}
                <div>
                    <p class="d-flex align-items-center gap-1">
                        <span>Trạng thái: </span>
                        <span class="badge badge
                            @if ($giayPhep->trangThai === 'Đang xử lý') bg-secondary 
                            @elseif ($giayPhep->trangThai === 'Đã phê duyệt') bg-success 
                            @elseif ($giayPhep->trangThai === 'Không phê duyệt') bg-danger 
                            @endif">
                            {{ $giayPhep->trangThai }}
                        </span>
                    </p>
                </div>
            </div>
    
            <!-- Submit Button -->
            @if($giayPhep->trangThai === 'Đang xử lý')
                <div class="row row-cols-2 mb-3">
                    <div class="col">
                        <form action="{{ route('giaypheps.approve', $giayPhep->idGiayPhep) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success" style="width:100%;">Phê duyệt</button>
                        </form>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-danger" style="width:100%;" data-bs-toggle="modal" data-bs-target="#rejectModal">
                            Không phê duyệt
                        </button>
                    </div>
                </div>
            @endif
            <div class="d-flex items-center gap-3 justify-content-center">
                <a href="{{ route('giaypheps.index.xet_duyet') }}" class="btn btn-secondary px-5">Quay lại</a>
            </div>
    
            <!-- Modal Không Phê Duyệt -->
            <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="rejectModalLabel">Xác nhận không phê duyệt</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="rejectForm" action="{{ route('giaypheps.reject', $giayPhep->idGiayPhep) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="lyDoKhongXetDuyet" class="form-label">Lý do không phê duyệt</label>
                                    <textarea class="form-control @error('lyDoKhongXetDuyet') is-invalid @enderror" id="lyDoKhongXetDuyet" name="lyDoKhongXetDuyet" rows="4" required></textarea>
                                    @error('lyDoKhongXetDuyet')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" form="rejectForm" class="btn btn-danger">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html