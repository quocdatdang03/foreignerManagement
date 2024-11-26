document.addEventListener("DOMContentLoaded", function () {
    const tinhThanhSelect = document.getElementById("tinhThanh");
    const quanHuyenSelect = document.getElementById("quanHuyen");
    const phuongXaSelect = document.getElementById("phuongXa");

    // Khi chọn tỉnh/thành, tải quận/huyện tương ứng
    tinhThanhSelect.addEventListener("change", function () {
        const tinhThanhId = this.value;

        // Xóa các option cũ của quận/huyện và phường/xã
        quanHuyenSelect.innerHTML = '<option value=""></option>';
        phuongXaSelect.innerHTML = '<option value=""></option>';
        quanHuyenSelect.disabled = true;
        phuongXaSelect.disabled = true;

        // Nếu không chọn tỉnh/thành, không làm gì cả
        if (!tinhThanhId) return;

        // Gửi yêu cầu lấy quận/huyện
        fetch(`/get-quanhuyen/${tinhThanhId}`)
            .then((response) => response.json())
            .then((data) => {
                if (data.quanhuyens && data.quanhuyens.length > 0) {
                    // Thêm các option quận/huyện vào select
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

    // Khi chọn quận/huyện, tải phường/xã tương ứng
    quanHuyenSelect.addEventListener("change", function () {
        const quanHuyenId = this.value;

        // Xóa các option cũ của phường/xã
        phuongXaSelect.innerHTML = '<option value=""></option>';
        phuongXaSelect.disabled = true;

        // Nếu không chọn quận/huyện, không làm gì cả
        if (!quanHuyenId) return;

        // Gửi yêu cầu lấy phường/xã
        fetch(`/get-phuongxa/${quanHuyenId}`)
            .then((response) => response.json())
            .then((data) => {
                if (data.phuongxas && data.phuongxas.length > 0) {
                    // Thêm các option phường/xã vào select
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
