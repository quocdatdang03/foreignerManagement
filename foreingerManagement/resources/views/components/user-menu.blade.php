<div class="menu">
    <div class="item">Tổng quan</div>
    <div class="item"><a href="{{ route('user.update-info') }}">Thông tin cá nhân</a></div>
    <div class="item"><a href="{{ route('password.change') }}">Đổi mật khẩu</a></div>
    <div class="item"><a href="{{ route('nguoinuocngoais.create') }}">Đăng ký khách tạm trú</a></div>
    <div class="item"><a href="" id="logout" style="color: red">Đăng Xuất</a></div>
</div>

<style>
    * {
        font-family: Arial, sans-serif;
    }
</style>

<script>
    document.getElementById('logout').addEventListener('click', function (event) {
        event.preventDefault(); // Ngăn không chuyển hướng
        const form = document.createElement('form'); // Tạo một form ẩn
        form.method = 'POST';
        form.action = "{{ route('logout') }}"; // Route đăng xuất Laravel
        form.innerHTML = `
            @csrf
        `;
        document.body.appendChild(form); // Thêm form vào body
        form.submit(); // Gửi form
    });
</script>
