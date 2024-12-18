<div class="header grid">
    <div class="container gridhead wide">
        <div class="item">
            <div class="logo">
                <a href="/"><img src="../fe/image/logo.png" alt=""></a>
            </div>
        </div>
        <div class="item">
            <a href="">TRANG CHỦ</a>
        </div>
        <div class="item">
            <a href="">GIỚI THIỆU</a>
        </div>
        <div class="item">
            <a href="">THỦ TỤC</a>
        </div>
        <div class="item">
            <a href="">QUY ĐỊNH</a>
        </div>
        <div class="item">
            <a href="">HỖ TRỢ</a>
        </div>
        <div class="item">
            <a href="">THÔNG TIN</a>
        </div>
        <div class="item">
            <a href="">TIN TỨC</a>
        </div>
        <div class="item">
            <a href="">LIÊN HỆ</a>
        </div>
        <div class="item seach">
            <form action="{{ route('accommodation.search.submit') }}" method="POST">
                @csrf
                <input type="text" name="keyword" placeholder="Tìm kiếm cơ sở lưu trú..." style="padding: 5px; width: 200px;">
                <button type="submit" style="padding: 5px;">Tìm</button>
            </form>
        </div>
        <div class="item user">
            @auth
                @if(Auth::user()->idVaiTro == 2)
                    <a href="{{ route('admin.home') }}">Xin chào {{ Auth::user()->hoVaTen }}</a>
                @else
                    <a href="{{ route('user.home') }}">Xin chào {{ Auth::user()->hoVaTen }}</a>
                @endif
            @else
                <a href="{{ route('login') }}">ĐĂNG NHẬP</a>
            @endauth
        </div>
    </div>
</div>

<style>
    * {
        font-family: Arial, sans-serif;
    }
</style>
