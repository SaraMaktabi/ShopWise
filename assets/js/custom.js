$(document).ready(function(){

    $('.increment_btn').click(function(e){
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10){
            value++;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    $('.decrement_btn').click(function(e){
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1){
            value--;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });


    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        console.log("Add to Cart button clicked"); // Ajout de console.log
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();

        console.log("Product ID:", prod_id); // Ajout de console.log
        
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope":"add"
            },

            success: function (response){
                console.log("AJAX response:", response); // Ajout de console.log
                if(response == 201){
                    alertify.success("Product added to card");
                }else if(response == "exist"){
                    alertify.success("Product already in cart");     
                }else if(response == 401){
                    alertify.success("Login to continue");     
                }else if(response == 500){
                    alertify.success("Something went wrong");     
                }
            },
            error: function (xhr, status, error) {
                console.log("AJAX Error:", error); // Ajout de console.log en cas d'erreur AJAX
            }
        });

    });

    $(document).on('click','.updateqty', function () {
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        
        var prod_id = $(this).closest('.product_data').find('.prodId').val();

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope":"update"
            },
            success: function(response){
                //alert(response);
            }
        });
    });

    $(document).on('click','.deleteitem', function () {
        var cart_id = $(this).val();
        //alert(cart_id);
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "cart_id": cart_id, 
                "scope":"delete"
            },
            success: function(response){
                if(response == 200){
                    alertify.success("Item deleted succesfully");
                }else{
                    alertify.success(response);
                }
            }
        });

    });

});