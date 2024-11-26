// Hàm để vẽ biểu đồ cột phân bố loại hình cơ sở lưu trú
function drawLoaiHinhChart(loaiHinhData) {
    var labels = loaiHinhData.map(function (item) {
        return item.loaiHinh;
    });
    var values = loaiHinhData.map(function (item) {
        return item.soLuong;
    });

    var ctx = document.getElementById("loaiHinhChart").getContext("2d");
    var loaiHinhChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Số lượng cơ sở lưu trú",
                    data: values,
                    backgroundColor: [
                        "rgba(91, 145, 202, 0.3)",
                        "rgba(30, 69, 193, 0.3)",
                        "rgba(0, 20, 221, 0.3)",
                        "rgba(17, 0, 69, 0.3)",
                    ],
                    borderColor: ["#08A3BA", "#CFBBFF", "#9265FF", "#492C83"],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
}

function drawPieChart(chartId, quocTichData) {
    var labels = quocTichData.map(function (item) {
        return item.tenQuocTich; // Quốc tịch
    });

    var data = quocTichData.map(function (item) {
        return item.soLuong; // Số lượng người nước ngoài
    });

    var ctx = document.getElementById(chartId).getContext("2d");
    new Chart(ctx, {
        type: "doughnut", // Biểu đồ tròn
        data: {
            labels: labels, // Các quốc tịch
            datasets: [
                {
                    label: "Tỷ lệ quốc tịch",
                    data: data,
                    backgroundColor: [
                        "#EFC3CA",
                        "#F394A3",
                        "#DCCDFF",
                        "#B699FD",
                        "#75C8CC",
                        "#24AFB5",
                        "#1E666A",
                        "#8ECBEF",
                        "#53B3E9",
                        "#2682B8",
                    ],
                    borderColor: [
                        "#F394A3",
                        "#F16F83",
                        "#B699FD",
                        "#6735DE",
                        "#358D91",
                        "#B699FC",
                        "#1F4788",
                        "#53B3E9",
                        "#2682B8",
                        "#145B85",
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "top",
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            return (
                                tooltipItem.label +
                                ": " +
                                tooltipItem.raw +
                                " người"
                            );
                        },
                    },
                },
            },
        },
    });
}

function renderLineChart(canvasId, labels, data, chartLabel) {
    var ctx = document.getElementById(canvasId).getContext("2d");

    new Chart(ctx, {
        type: "line",
        data: {
            labels: labels,
            datasets: [
                {
                    label: chartLabel,
                    data: data,
                    borderColor: "#007bff",
                    borderWidth: 2,
                    fill: false,
                },
            ],
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
}

let giayPhepChart;

// Hàm khởi tạo biểu đồ
function initializeGiayPhepChart(initialYear) {
    fetchGiayPhepData(initialYear);

    // Gắn sự kiện thay đổi năm
    const yearSelect = document.getElementById("year");
    yearSelect.addEventListener("change", function () {
        const selectedYear = this.value;
        fetchGiayPhepData(selectedYear);
    });
}

// Hàm fetch dữ liệu từ server
function fetchGiayPhepData(year) {
    fetch(`/giayphep/chart/data?year=${year}`)
        .then((response) => response.json())
        .then((data) => updateGiayPhepChart(data))
        .catch((error) => console.error("Error fetching data:", error));
}

// Hàm cập nhật biểu đồ
function updateGiayPhepChart(data) {
    if (giayPhepChart) {
        giayPhepChart.destroy();
    }

    const ctx = document.getElementById("giayPhepChart").getContext("2d");
    giayPhepChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: data.months,
            datasets: [
                {
                    label: "Số lượng giấy phép",
                    data: data.soLuong,
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 2,
                    fill: false,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: "top",
                },
            },
            scales: {
                x: { title: { display: true, text: "Tháng" } },
                y: { title: { display: true, text: "Số lượng" } },
            },
        },
    });
}
