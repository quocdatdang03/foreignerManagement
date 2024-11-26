document.addEventListener("DOMContentLoaded", function () {
    const tinhThanhSelect = document.getElementById("tinhThanh");
    const quanHuyenSelect = document.getElementById("quanHuyen");
    const phuongXaSelect = document.getElementById("phuongXa");

    tinhThanhSelect.addEventListener("change", function () {
        const tinhThanhId = this.value;

        quanHuyenSelect.innerHTML = '<option value=""></option>';
        phuongXaSelect.innerHTML = '<option value=""></option>';
        quanHuyenSelect.disabled = true;
        phuongXaSelect.disabled = true;

        if (!tinhThanhId) return;

        fetch(`/get-quanhuyen/${tinhThanhId}`)
            .then((response) => response.json())
            .then((data) => {
                if (data.quanhuyens && data.quanhuyens.length > 0) {
                    data.quanhuyens.forEach((quanHuyen) => {
                        const option = document.createElement("option");
                        option.value = quanHuyen.idQuanHuyen;
                        option.textContent = quanHuyen.tenQuanHuyen;
                        quanHuyenSelect.appendChild(option);
                    });
                    quanHuyenSelect.disabled = false;
                }
            })
            .catch((error) => {
                console.error("Lỗi khi tải quận/huyện:", error);
            });
    });

    quanHuyenSelect.addEventListener("change", function () {
        const quanHuyenId = this.value;

        phuongXaSelect.innerHTML = '<option value=""></option>';
        phuongXaSelect.disabled = true;

        if (!quanHuyenId) return;

        fetch(`/get-phuongxa/${quanHuyenId}`)
            .then((response) => response.json())
            .then((data) => {
                if (data.phuongxas && data.phuongxas.length > 0) {
                    data.phuongxas.forEach((phuongXa) => {
                        const option = document.createElement("option");
                        option.value = phuongXa.idPhuongXa;
                        option.textContent = phuongXa.tenPhuongXa;
                        phuongXaSelect.appendChild(option);
                    });
                    phuongXaSelect.disabled = false;
                }
            })
            .catch((error) => {
                console.error("Lỗi khi tải phường/xã:", error);
            });
    });
});
