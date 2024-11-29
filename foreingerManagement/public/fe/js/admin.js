const admin = localStorage.getItem("ad_email")
const ad_token =  localStorage.getItem("ad_accessToken")
const menu_bar = document.getElementById('menu_bar')
const user_show = document.getElementById("user_show")
if(ad_token){
    $.ajax({
        type: "get",
        url: "http://localhost:8080/api/user",
        headers:{"Authorization": 'Bearer '+ad_token },
        
        success: function(data) {
            console.log(data)
            // if(location.href.includes("v_admin/home.html")){
            //     user_show.innerHTML = data.hoVaTen
            //     if(data.vaiTro =="NhanVienQL"){
                
            //         menu_bar.innerHTML = `<div class="item">Tổng quan</div>
    
            //         <div class="item"><a href="./quanlykhaibaotamtru.html">Quản lý khai báo tạm trú</a></div>
            //         <div class="item"><a href="#" id="a_logout">Đăng Xuất</a></div>`
            //     }else if( data.vaiTro=="QTV"){
            //         menu_bar.innerHTML = `<div class="item">Tổng quan</div>
    
            //         <div class="item"><a href="./quanlytaikhoan.html">Quản lý tài khoản</a></div>
            //         <div class="item"><a href="#" id="a_logout">Đăng Xuất</a></div>`
            //     }else{
            //         location.href="http://127.0.0.1:5501/v_admin/dangnhap.html"
            //     }
            // }else{
            //     user_show.innerHTML = data.hoVaTen
            // }
            user_show.innerHTML = data.hoVaTen
            if(data.vaiTro =="NhanVienQL"){
            
                menu_bar.innerHTML = `<div class="item">Tổng quan</div>

                <div class="item"><a href="./quanlykhaibaotamtru.html">Quản lý khai báo tạm trú</a></div>
                <div class="item"><a href="#" id="a_logout">Đăng Xuất</a></div>`
            }else if( data.vaiTro=="QTV"){
                menu_bar.innerHTML = `<div class="item">Tổng quan</div>

                <div class="item"><a href="./quanlytaikhoan_us.html">Tài khoản user</a></div>
                <div class="item"><a href="./xulyyeucau.html">Yêu cầu hỗ trợ</a></div>
                 <div class="item"><a href="./danhsachvanban.html">Thêm văn bản</a></div>
                <div class="item"><a href="#" id="a_logout">Đăng Xuất</a></div>`
            }else if( data.vaiTro=="Master"){
                menu_bar.innerHTML = `<div class="item">Tổng quan</div>
                  <div class="item"><a href="./quanlykhaibaotamtru.html">Quản lý khai báo tạm trú</a></div>
                <div class="item"><a href="./quanlytaikhoan_us.html">Tài khoản user</a></div>
                <div class="item"><a href="./quanlytaikhoan_ad.html">Tài khoản admin</a></div>
                <div class="item"><a href="./xulyyeucau.html">Yêu cầu hỗ trợ</a></div>
                 <div class="item"><a href="./danhsachvanban.html">Thêm văn bản</a></div>
                 <div class="item"><a href="./quanlyvipham.html">Quản lý vi phạm</a></div>
                <div class="item"><a href="#" id="a_logout">Đăng Xuất</a></div>`
            }else{
                location.href="http://127.0.0.1:5501/v_admin/dangnhap.html"
            }
            
           
        },error:function(message){
            console.log(message)
            alert(message?.responseJSON?.message||"có lỗi sảy ra")
            location.href="http://127.0.0.1:5501/v_admin/dangnhap.html"
        }
    })
}else{
    location.href="http://127.0.0.1:5501/v_admin/dangnhap.html"
}
