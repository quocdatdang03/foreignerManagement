var listquoctich
const quoctich = document.getElementById("quoctich")



async function getquoctich(){
    return new Promise((resolve, reject) => {
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/api/address/country",
            success: function(data) {
                console.log(data)

                for(let i=0;i<data.length;i++){
                    let node = `<option value="${data[i].id}">${data[i].tenQuocTich}</option>`
                    quoctich.innerHTML += node
                    resolve()
                }
            }
        })
    })
}

getquoctich()