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


    $('.add-to-cart').click(function(e){
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var prod_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id":prod_id,
                "prod_qty":qty,
                "scope":"add"
            },
        
            success: function(response){
                if(response == 401){
                    alert("login to continue");
                }
            }
        })
    });

});