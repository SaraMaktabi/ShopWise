$(document).ready(function(){

    $('.delete_prod_btn').click(function(e){
        e.preventDefault();

        var id = $(this).val();
        

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: 'code.php', // L'URL du script PHP à appeler
                    data: {
                        'ID_PRODUIT':id,
                        'delete_prod_btn':true
                    },
                    dataType: "dataType", 
                    success: function(response) {
                        if (response == 200) {
                            console.log("Suppression réussie !");
                            swal("Success!", "Product deleted Successfully", "success");
                            // Rafraîchir automatiquement la page après une courte attente (par exemple, 500 ms)
                            setTimeout(function() {
                                location.reload(); // Recharger la page actuelle
                            }, 500);
                        } else if (response == 500) {
                            console.log("Erreur lors de la suppression.");
                            swal("Error!", "Something went wrong", "Error");
                        }
                    },
                    
                  });
            } 
          });
    });

    $('.delete_cat_btn').click(function(e){
        e.preventDefault();

        var id = $(this).val();
        

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: 'code.php', // L'URL du script PHP à appeler
                    data: {
                        'category_id':id,
                        'delete_cat_btn':true
                    },
                    dataType: "dataType", 
                    success: function(response) {
                        if (response == 200) {
                            console.log("Suppression réussie !");
                            swal("Success!", "Category deleted Successfully", "success");
                            // Rafraîchir automatiquement la page après une courte attente (par exemple, 500 ms)
                            $("#category_table").load(location.href + " #category_table");
                        } else if (response == 500) {
                            console.log("Erreur lors de la suppression.");
                            swal("Error!", "Something went wrong", "Error");
                        }
                    },
                    
                  });
            } 
          });
    });
});