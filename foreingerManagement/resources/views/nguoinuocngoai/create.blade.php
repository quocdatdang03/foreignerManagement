
<div class="container">
    <h2>Đăng ký người nước ngoài</h2>

    <form action="{{ route('nguoinuocngoai.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="hoTen">Họ tên</label>
            <input type="text" class="form-control" id="hoTen" name="hoTen" required>
        </div>
        <div class="form-group">
            <label for="soPassport">Số Passport</label>
            <input type="text" class="form-control" id="soPassport" name="soPassport" required>
        </div>
        <div class="form-group">
            <label for="sdt">Số điện thoại</label>
            <input type="text" class="form-control" id="sdt" name="sdt" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="ngaySinh">Ngày sinh</label>
            <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" required>
        </div>
        <div class="form-group">
            <label for="ngayDen">Ngày đến</label>
            <input type="date" class="form-control" id="ngayDen" name="ngayDen" required>
        </div>
        <div class="form-group">
            <label for="lyDoDen">Lý do đến</label>
            <input type="text" class="form-control" id="lyDoDen" name="lyDoDen" required>
        </div>
        <div class="form-group">
            <label for="ngayDuKienRoiKhoi">Ngày dự kiến rời khỏi</label>
            <input type="date" class="form-control" id="ngayDuKienRoiKhoi" name="ngayDuKienRoiKhoi" required>
        </div>
        <div class="form-group">
            <label for="idQuocTich">Quốc tịch</label>
            <select class="form-control" id="idQuocTich" name="idQuocTich" required>
                @foreach ($quoctichs as $quoctich)
                    <option value="{{ $quoctich->idQuocTich }}">{{ $quoctich->tenQuocTich }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="idCoSo">Cơ sở lưu trú</label>
            <select class="form-control" id="idCoSo" name="idCoSo" required>
                @foreach ($cosos as $coso)
                    <option value="{{ $coso->idCoSo }}">{{ $coso->tenCoSo }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </form>
</div>
