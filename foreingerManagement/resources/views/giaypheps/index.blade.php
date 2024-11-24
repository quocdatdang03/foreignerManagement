<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý giấy phép tạm trú</title>
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
                <h1>Quản lý giấy phép đăng ký tạm trú</h1>
            </div>
    
            <h1></h1>
            <div class="my-3">
                <a href="{{ route('nguoinuocngoais.create') }}" class="btn btn-primary">Đăng ký</a>
            </div>
    
            <form method="GET" action="{{ route('giaypheps.index') }}" class="mb-4">
                <div class="row row-cols-2">
                    <div class="">
                        <input type="search" name="keyword" placeholder="Nhập từ khóa để tìm kiếm" value="{{ request()->get('keyword') }}" class="form-control">
                    </div>
                    <div class="d-flex gap-1">
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
                            <a href="{{ route('giaypheps.index') }}" class="btn btn-secondary">Clear</a>
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
                                <a href="{{ route('giaypheps.edit', $giayPhep->idGiayPhep) }}" class="btn btn-warning btn-sm">Sửa</a>
                                {{-- 
                                <form action="{{ route('giaypheps.destroy', $giayPhep->idGiayPhep) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                </form>
                                --}}
                                {{-- <form action="{{ route('giaypheps.destroy', $giayPhep->idGiayPhep) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa giấy phép này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                </form> --}}
                                <button type="button" class="btn btn-danger btn-sm delete-btn" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"  data-id="{{ $giayPhep->idGiayPhep }}">
                                    Xóa
                                </button>
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
    
            <!-- Modal Confirm delete -->
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Bạn có chắc chắn muốn xóa giấy phép này không?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <form id="deleteForm" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" form="deleteForm" class="btn btn-danger">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Confirm delete  -->
        </div>
    </div>    

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const deleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const idGiayPhep = button.getAttribute('data-id');
                    const actionUrl = `{{ route('giaypheps.destroy', ':id') }}`.replace(':id', idGiayPhep);
                    deleteForm.setAttribute('action', actionUrl);
                });
            });

            const currentUser = JSON.parse(localStorage.getItem('currentUser'));
            if (currentUser && currentUser.idNguoiDung) {
                fetch("{{ route('giaypheps.index') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    body: JSON.stringify({
                        idNguoiDung: currentUser.idNguoiDung,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    // Xử lý kết quả nếu cần
                    console.log(data);
                })
                .catch(error => console.error("Error:", error));
            }
        });
    </script>
</body>
</html