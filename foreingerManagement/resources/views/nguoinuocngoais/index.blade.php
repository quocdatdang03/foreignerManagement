<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Người Nước Ngoài</title>

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
        @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif

  <form method="GET" action="{{ route('nguoinuocngoais.index') }}" class="mb-4">
        <div class="d-flex gap-1">
            <div class="">
                <input type="search" name="keyword" placeholder="Nhập từ khóa để tìm kiếm" value="{{ request()->get('keyword') }}" class="form-control">
            </div>

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
            <div class="d-flex">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
            <div class="">
                <a href="{{ route('nguoinuocngoais.index') }}" class="btn btn-secondary">Clear</a>
            </div>
        </div>
    </form>


    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Họ tên</th>
                <th>Số passport</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Ngày sinh</th>
                <th>Quốc tịch</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nguoiNuocNgoais as $nguoiNuocNgoai)
                <tr>
                    <td>{{ $nguoiNuocNgoai->hoTen }}</td>
                    <td>{{ $nguoiNuocNgoai->soPassport }}</td>
                    <td>{{ $nguoiNuocNgoai->sdt }}</td>
                    <td>{{ $nguoiNuocNgoai->email }}</td>
                    <td>{{ $nguoiNuocNgoai->ngaySinh }}</td>
                    <td>{{ $nguoiNuocNgoai->quocTich->tenQuocTich }}</td>
                    <td>
                        <a href="{{ route('nguoinuocngoais.edit', $nguoiNuocNgoai->idNguoiNuocNgoai) }}" class="btn btn-warning btn-sm">Sửa</a>
                        {{-- <form action="{{ route('giaypheps.destroy', $giayPhep->idGiayPhep) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa giấy phép này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form> --}}
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
                    <li class="page-item {{ $nguoiNuocNgoais->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $nguoiNuocNgoais->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    <!-- Pagination Links -->
                    @foreach ($nguoiNuocNgoais->links()->elements[0] as $page => $url)
                        <li class="page-item {{ $page == $nguoiNuocNgoais->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <!-- Next Page Link -->
                    <li class="page-item {{ $nguoiNuocNgoais->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $nguoiNuocNgoais->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html