(function($){

    $(document).ready(function () {

        $(".how_to_send ul li").click(function () {
            
            $(".how_to_send ul li").removeClass("active");

            $(this).addClass("active");

            var index = $(this).index();

            $(".contnet-navbar-panel .navbar-items").removeClass("active");

            $(".contnet-navbar-panel .navbar-items").eq(index).addClass("active");
			
        });
    });

    $(document).ready(function(e){
        $("#send_date_order,#send_date_order_delivery").persianDatepicker({
            formatDate: "ND DD NM YYYY|hh:mm",
            
        });
    });

})( jQuery );