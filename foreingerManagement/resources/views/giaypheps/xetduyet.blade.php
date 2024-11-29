<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khai báo tạm trú</title>
    <link rel="icon" href="../fe/image/logo.png">
    <link rel="stylesheet" href="../fe/css/grid.css">
    <link rel="stylesheet" href="../fe/css/header-footer.css">
    <link rel="stylesheet" href="../fe/css/update.css">
    <link rel="stylesheet" href="../fe/css/quanlytaikhoan.css">
    <link rel="stylesheet" href="../fe/css/registry.css">
    <link rel="stylesheet" href="../fe/css/menu.css">

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
            @if (Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif
    
            <div class="my-3">
                <h1>Quản lý khai báo tạm trú</h1>
            </div>
    
            <form method="GET" action="{{ route('giaypheps.index.xet_duyet') }}" class="mb-4">
                <div class="row row-cols-2">
                    <div class="">
                        <input type="search" name="keyword" placeholder="Nhập từ khóa để tìm kiếm" value="{{ request()->get('keyword') }}" class="form-control">
                    </div>
                    <div class="d-flex items-center gap-2">
                        <!-- Combobox Quốc Tịch -->
                        <div class="">
                            <select name="idQuocTich" class="form-select">
                                <option value="">Chọn Quốc Tịch</option>
                                @foreach ($quocTichs as $quocTich)
                                    <option value="{{ $quocTich->idQuocTich }}" 
                                            {{ request()->get('idQuocTich') == $quocTich->idQuocTich ? 'selected' : '' }}>
                                        {{ $quocTich->tenQuocTich }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Combobox Cơ sở -->
                        <div class="">
                            <select name="idCoSo" class="form-select">
                                <option value="">Chọn Cơ sở</option>
                                @foreach ($coSos as $coSo)
                                    <option value="{{ $coSo->idCoSo }}" 
                                            {{ request()->get('idCoSo') == $coSo->idCoSo ? 'selected' : '' }}>
                                        {{ $coSo->tenCoSo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                        <div class="">
                            <a href="{{ route('giaypheps.index.xet_duyet') }}" class="btn btn-secondary">Clear</a>
                        </div>
                    </div>
                </div>
            </form>
    
    
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Họ tên</th>
                        <th>Số passport</th>
                        <th>Ngày đến</th>
                        <th>Lý do đến</th>
                        <th>Quốc tịch</th>
                        <th>Cơ sở</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($giayPheps as $giayPhep)
                        <tr>
                            <td>{{ $giayPhep->nguoiNuocNgoai->hoTen }}</td>
                            <td>{{ $giayPhep->nguoiNuocNgoai->soPassport }}</td>
                            <td>{{ \Carbon\Carbon::parse($giayPhep->ngayDen)->format('d/m/Y') }}</td>
                            <td>{{ $giayPhep->lyDoDen }}</td>
                            <td>{{ $giayPhep->nguoiNuocNgoai->quoctich->tenQuocTich }}</td>
                            <td>{{ $giayPhep->coSo->tenCoSo }}</td>
                            <td>
                                <span class="badge 
                                    @if ($giayPhep->trangThai === 'Đang xử lý') bg-secondary 
                                    @elseif ($giayPhep->trangThai === 'Đã phê duyệt') bg-success 
                                    @elseif ($giayPhep->trangThai === 'Không phê duyệt') bg-danger 
                                    @endif">
                                    {{ $giayPhep->trangThai }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('giaypheps.edit.xet_duyet', $giayPhep->idGiayPhep) }}" class="btn btn-warning btn-sm">Xem chi tiết</a>
                                {{-- 
                                <form action="{{ route('giaypheps.destroy', $giayPhep->idGiayPhep) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                </form>
                                --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    
            {{-- <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $giayPheps->links() }}
            </div> --}}
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                <nav>
                    <ul class="pagination">
                        <!-- Previous Page Link -->
                        <li class="page-item {{ $giayPheps->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $giayPheps->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
    
                        <!-- Pagination Links -->
                        @foreach ($giayPheps->links()->elements[0] as $page => $url)
                            <li class="page-item {{ $page == $giayPheps->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach
    
                        <!-- Next Page Link -->
                        <li class="page-item {{ $giayPheps->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $giayPheps->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html