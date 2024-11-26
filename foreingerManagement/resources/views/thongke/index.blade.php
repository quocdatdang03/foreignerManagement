<!-- resources/views/chart.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart.js in Laravel</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/010f48540d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/thongke.css') }}">

</head>
<body>
    <main style="margin-left: 32px; margin-right: 32px">
        <h1>THỐNG KÊ</h1>
        <section class="overview row g-3">
            <div class="col-md-4">
                <div class="overview__item" style="--bg-color: #63BDCA">
                    <div>
                        <span class="overview__count">{{ $tongSoNguoiNuocNgoai  }}</span><br>
                        <span>Số người nước ngoài</span>
                    </div>
                    <i class="fa-solid fa-users" style="font-size: 40px"></i>
                </div>
            </div>
            <div class="col-md-4">
                <div class="overview__item" style="--bg-color: #4C63B5">
                    <div>
                        <span class="overview__count">{{ $tongSoCoSoLuuTru  }}</span><br>
                        <span>Số cơ sở lưu trú </span>
                    </div>
                    <i class="fa-solid fa-hotel" style="font-size: 40px"></i>
                </div>
            </div>
            <div class="col-md-4">
                <div class="overview__item" style="--bg-color: #1F005C">
                    <div>
                        <span class="overview__count">{{ $giayPhepDaPheDuyet  }}</span><br>
                        <span>Số giấy phép đã phê duyệt </span>
                    </div>
                    <i class="fa-solid fa-file-circle-check" style="font-size: 40px"></i>
                </div>

            </div>



        </section>

        <section class="row g-3">
            <div class="col-md-7">
                <div class="mb-3 card  ">
                    <div class="card-header">
                        <div>Lượng giấy phép đã cấp theo tháng</div>

                        <form id="yearForm">
                            <div class="form-group">
                                <select id="year" name="year" class="form-control form-select form-select-sm">
                                    @foreach($years as $year)
                                        <option value="{{ $year->year }}" {{ $selectedYear == $year->year ? 'selected' : '' }}>
                                            {{ $year->year }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <canvas id="giayPhepChart"></canvas>
                    </div>

                    <div class="card-header">
                        Cơ sở đăng ký gần đây
                    </div>

                    <div class="card-body" style="text-align: center">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên cơ sở</th>
                                    <th>Chủ cơ sở</th>
                                    <th>Địa chỉ</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coSoMoiNhats as $coSoMoiNhat)
                                    <tr>
                                        <td>{{ $coSoMoiNhat->idCoSo}}</td>
                                        <td>{{ $coSoMoiNhat->tenCoSo}}</td>
                                        <td>{{ $coSoMoiNhat->nguoiDung->hoVaTen}}</td>
                                        <td>
                                            {{ $coSoMoiNhat->diaChiCoSo }},
                                            {{ $coSoMoiNhat->phuongXa ? $coSoMoiNhat->phuongXa->tenPhuongXa : '' }},
                                            {{ $coSoMoiNhat->phuongXa && $coSoMoiNhat->phuongXa->quanHuyen ? $coSoMoiNhat->phuongXa->quanHuyen->tenQuanHuyen : '' }},
                                            {{ $coSoMoiNhat->phuongXa && $coSoMoiNhat->phuongXa->quanHuyen && $coSoMoiNhat->phuongXa->quanHuyen->tinhThanh ? $coSoMoiNhat->phuongXa->quanHuyen->tinhThanh->tenTinhThanh : '' }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a class="btn btn-primary" href="/cosoluutrus" role="button">Xem tất cả</a>

                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3 card ">
                    <div class="card-header">
                        Báo cáo lượng khách nước ngoài
                    </div>
                    <div class="card-body">
                        <canvas id="quocTichChart"></canvas>
                    </div>
                </div>

                <div class="mb-3 card">
                    <div class="card-header">
                        Số cơ sở theo loại hình
                    </div>

                    <div class="card-body">
                        <canvas id="loaiHinhChart"></canvas>
                    </div>

                </div>

            </div>
        </section>

    </main>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script>
        var loaiHinhData = @json($loaiHinh);
        drawLoaiHinhChart(loaiHinhData);

        var quocTichData = @json($quocTich);
        drawPieChart('quocTichChart', quocTichData);

        document.addEventListener('DOMContentLoaded', function () {
        const initialYear = document.getElementById('year').value;
        initializeGiayPhepChart(initialYear);
    });
    </script>

</body>

</html>

