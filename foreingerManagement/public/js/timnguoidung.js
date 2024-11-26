$(document).ready(function () {
    $("#idNguoiDung").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "/search-nguoi-dung",
                dataType: "json",
                data: {
                    term: request.term,
                },
                success: function (data) {
                    if (data.results.length === 0) {
                        response([
                            {
                                label: "Không có người này trên hệ thống",
                                value: "",
                            },
                        ]);
                    } else {
                        response(
                            $.map(data.results, function (item) {
                                return {
                                    label: item.text,
                                    value: item.text,
                                    id: item.id,
                                };
                            })
                        );
                    }
                },
            });
        },
        minLength: 2,
        select: function (event, ui) {
            $("#idNguoiDung").val(ui.item.value);
            $("#idNguoiDungHidden").val(ui.item.id);
        },
    });
});
