var listquan
const quanhuyen = document.getElementById("quanhuyen")
const phuongxa = document.getElementById("phuongxa")

getquan()
async function getquan(){
    return new Promise((resolve, reject) => {
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/api/address/province",
            success: function(data) {
                console.log(data)
                listquan = data.quanHuyens
                for(let i=0;i<listquan.length;i++){
                    let node = `<option value="${listquan[i].id}">${listquan[i].tenQuanHuyen}</option>`
                    quanhuyen.innerHTML += node
                    resolve()
                }
            }
        })
    })
}

quanhuyen.addEventListener("change",function(){
    console.log(this.value)
    for(let i=0;i<listquan.length;i++){
        if(this.value==listquan[i].id){
            console.log(listquan[i])
            let listxa = listquan[i].phuongXas
            phuongxa.innerHTML = `<option value="0"></option>`
            for(let j=0;j<listxa.length;j++){
                let node = `<option value="${listxa[j].id}">${listxa[j].tenPhuongXa}</option>`
                phuongxa.innerHTML += node
            }
        }

    }
})


phuongxa.onclick = function(){
    if(quanhuyen.value ==0){
        alert("vui lòng chọn quận huyện")

    }
}


function bind_phuong(id){
    console.log(id)
    for(let i=0;i<listquan.length;i++){
        let listxa = listquan[i].phuongXas
       for(let j=0;j<listxa.length;j++){
        if(listxa[j].id==id){
            quanhuyen.innerHTML = `<option value="${listquan[i].id}">${listquan[i].tenQuanHuyen}</option>` + quanhuyen.innerHTML
            phuongxa.innerHTML = `<option value="${listxa[j].id}">${listxa[j].tenPhuongXa}</option>` + phuongxa.innerHTML
        }
       }
    }
}