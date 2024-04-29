(function ($) {
    "use strict";
    var TB = {};
    TB.select2 = () => {
        $('.setupSelect2').select2();
    }
    $(document).ready(function () {
        TB.select2();
    });

})(jQuery);
