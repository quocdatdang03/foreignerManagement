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
    <div class="container">
        @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif

   <a href="{{ route('nguoinuocngoais.create') }}" class="btn btn-primary">Đăng ký</a>

  <form method="GET" action="{{ route('giaypheps.index') }}" class="mb-4">
        <div class="d-flex gap-1">
            <div class="">
                <input type="text" name="keyword" placeholder="Nhập từ khóa để tìm kiếm" value="{{ request()->search }}" class="form-control">
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
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
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($giayPheps as $giayPhep)
                <tr>
                    <td>{{ $giayPhep->nguoiNuocNgoai->hoTen }}</td>
                    <td>{{ $giayPhep->nguoiNuocNgoai->soPassport }}</td>
                    <td>{{ $giayPhep->ngayDen }}</td>
                    <td>{{ $giayPhep->lyDoDen }}</td>
                    <td>{{ $giayPhep->nguoiNuocNgoai->quoctich->tenQuocTich }}</td>
                    <td>{{ $giayPhep->coSo->tenCoSo }}</td>
                    <td>
                        <a href="{{ route('giaypheps.edit', $giayPhep->idGiayPhep) }}" class="btn btn-warning btn-sm">Sửa</a>
                        {{-- 
                        <form action="{{ route('giaypheps.destroy', $giayPhep->idGiayPhep) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                        --}}
                        <form action="{{ route('giaypheps.destroy', $giayPhep->idGiayPhep) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa giấy phép này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
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
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html