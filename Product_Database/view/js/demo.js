
$(document).ready(function () {
    $("#product").on("click", ".js-delete", function () {
        var button = $(this)
        bootbox.confirm("Are you sure?", function (result) {
            if (result) {
                $.ajax({
                    url: "../controllers/product_manager.php?delete_product=" + button.attr("data-product-id"),
                    method: "POST",
                    success: function () {
                        button.parents("tr").remove();
                    }
                })
            }
        })
    });
    
    $("#datepicker").datepicker();

    

});

