const user = localStorage.getItem("email")
const token =  localStorage.getItem("accessToken")
const user_id = localStorage.getItem("id")
if(token){
    // const menu_bar = document.getElementById('menu_bar')
        $.ajax({
            type: "get",
            url: "http://localhost:8080/api/user",
            headers:{"Authorization": 'Bearer '+token },
            
            success: function(data) {
                console.log(data)
                document.getElementById("user_show").innerHTML = data.hoVaTen
            },error:function(message){
                console.log(message)
                alert(message?.responseJSON?.message||"có lỗi sảy ra")
                location.href ="http://127.0.0.1:5501/v_user/dangnhap.html"
            }
        })
}else{
    alert("vui lòng đăng nhập")
    location.href ="http://127.0.0.1:5501/v_user/dangnhap.html"
}

     
