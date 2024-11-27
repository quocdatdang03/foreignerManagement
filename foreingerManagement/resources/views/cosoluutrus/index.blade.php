<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Cơ sở lưu trú</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/010f48540d.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">

    <div class="row justify-content-between">
        <div class="col-4">
            <a href="{{ route('cosoluutrus.create') }}" class="btn btn-success"><span>Thêm mới</span> <i class="fa-solid fa-plus"></i></a>
        </div>
        <div class="col-4">
            <form method="GET" action="{{ route('cosoluutrus.index') }}" class="mb-4">
                <div class="d-flex gap-1">
                    <div class="">
                        <input type="text" name="search" placeholder="Nhập tên cơ sở lưu trú" value="{{ $search ?? '' }}" class="form-control">
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary" onclick="clearSearch()"><i class="fa-solid fa-rotate-right"></i></button>
                    </div>
                </div>
            </form>


        </div>
    </div>

    @if ($cosoluutrus->isEmpty())
    <p>Không tìm thấy cơ sở lưu trú nào.</p>
@else

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên cơ sở</th>
                <th>Chủ cơ sở</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Loại Hình</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cosoluutrus as $index => $cosoluutru)
                <tr>
                    {{-- <td>{{ $cosoluutru->idCoSo}}</td> --}}
                    <td>{{ $cosoluutrus->firstItem() + $index }}</td>
                    <td>{{ $cosoluutru->tenCoSo}}</td>
                    <td>{{ $cosoluutru->nguoiDung->hoVaTen}}</td>
                    <td>
                        {{ $cosoluutru->diaChiCoSo }},
                        {{ $cosoluutru->phuongXa ? $cosoluutru->phuongXa->tenPhuongXa : '' }},
                        {{ $cosoluutru->phuongXa && $cosoluutru->phuongXa->quanHuyen ? $cosoluutru->phuongXa->quanHuyen->tenQuanHuyen : '' }},
                        {{ $cosoluutru->phuongXa && $cosoluutru->phuongXa->quanHuyen && $cosoluutru->phuongXa->quanHuyen->tinhThanh ? $cosoluutru->phuongXa->quanHuyen->tinhThanh->tenTinhThanh : '' }}
                    </td>
                    <td>{{ $cosoluutru->email}}</td>
                    <td>{{ $cosoluutru->sdt}}</td>
                    <td>{{ $cosoluutru->loaiHinh}}</td>

                    <td>
                        <a href="/cosoluutrus/{{ $cosoluutru->idCoSo }}/edit" class="btn btn-warning btn-sm"><i class="fa-solid fa-file-pen"></i></a>

                        <form action="/cosoluutrus/{{ $cosoluutru->idCoSo }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif

        <div class="d-flex justify-content-center">
            <nav>
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    <li class="page-item {{ $cosoluutrus->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cosoluutrus->previousPageUrl() . '&search=' . request('search') }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    <!-- Pagination Links -->
                    @foreach ($cosoluutrus->links()->elements[0] as $page => $url)
                        <li class="page-item {{ $page == $cosoluutrus->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url . '&search=' . request('search') }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <!-- Next Page Link -->
                    <li class="page-item {{ $cosoluutrus->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $cosoluutrus->nextPageUrl() . '&search=' . request('search') }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <script>
            function clearSearch() {
                window.location.href = "{{ route('cosoluutrus.index') }}";
            }
        </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html
