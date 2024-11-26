$(document).ready(function () {
    $("#idNguoiDung").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "/search-nguoi-dung", // API tìm kiếm người dùng
                dataType: "json",
                data: {
                    term: request.term, // Gửi từ khóa người dùng đã nhập
                },
                success: function (data) {
                    if (data.results.length === 0) {
                        // Nếu không có kết quả, hiển thị thông báo "Không có người này trên hệ thống"
                        response([
                            {
                                label: "Không có người này trên hệ thống",
                                value: "", // Chúng ta không muốn gán giá trị cho ô input
                            },
                        ]);
                    } else {
                        // Nếu có kết quả, hiển thị danh sách gợi ý người dùng
                        response(
                            $.map(data.results, function (item) {
                                return {
                                    label: item.text, // Hiển thị tên người dùng
                                    value: item.text, // Giá trị là tên người dùng
                                    id: item.id, // ID người dùng (để chọn khi submit form)
                                };
                            })
                        );
                    }
                },
            });
        },
        minLength: 2, // Chỉ tìm kiếm khi người dùng nhập ít nhất 2 ký tự
        select: function (event, ui) {
            // Khi người dùng chọn một gợi ý, bạn có thể lưu lại ID người dùng
            $("#idNguoiDung").val(ui.item.value); // Hiển thị tên trong input
            $("#idNguoiDungHidden").val(ui.item.id); // Lưu ID vào trường ẩn (nếu cần)
        },
    });
});
