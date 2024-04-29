(function ($) {

    "use strict";
    var TB = {};
    var getLocationUrl = document.getElementById('getLocationUrl').value;
    // console.log(getLocationUrl);
    TB.getLocation = () => {
        $(document).on('change', '.location', function () {
            // console.log(123);
            let option = {
                'data': {
                    'location_id': $(this).val()
                },
                'target': $(this).attr('data-target')
            }

            console.log(option);

            TB.senDataToGetLocation(option)
        })
    }

    TB.senDataToGetLocation = (option) => {
        $.ajax({

            url: getLocationUrl,
            method: "GET",
            data: option,
            dataType: 'json',
            success: function (response) {
                // Xử lý dữ liệu trả về khi yêu cầu thành công
                // console.log("Dữ liệu nhận được:", response);
                $('.' + option.target).html(response.html)
            },
            error: function (xhr, status, error) {
                // Xử lý lỗi khi yêu cầu thất bại
                console.error("Lỗi khi gửi yêu cầu:", error);
            }
        });
    }


    $(document).ready(function () {
        TB.getLocation();
    });

})(jQuery);
