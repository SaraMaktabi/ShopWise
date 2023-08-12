<?php
include('includes/header.php');
include('../config/dbconn.php');

// Vérifier si le formulaire a été soumis et traiter les mises à jour de quantité
if (isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];
    $new_quantity = $_POST['new_quantity'];

    // Mettre à jour la quantité dans la base de données
    $update_quantity_query = "UPDATE stock SET QUANTITE_EN_STOCK = $new_quantity WHERE PRODUIT_ID = $product_id";
    $update_quantity_result = mysqli_query($conn, $update_quantity_query);

    if ($update_quantity_result) {
        // La mise à jour a réussi, vérifier si le stock est bas et insérer une nouvelle notification si nécessaire
        $check_stock_query = "SELECT QUANTITE_EN_STOCK, ALERTE_DE_STOCK_BAS, is_read FROM stock WHERE PRODUIT_ID = $product_id";
        $check_stock_result = mysqli_query($conn, $check_stock_query);
        $row = mysqli_fetch_assoc($check_stock_result);
        $quantity_in_stock = $row['QUANTITE_EN_STOCK'];
        $alert_threshold = $row['ALERTE_DE_STOCK_BAS'];
        $is_read = $row['is_read'];

        if ($quantity_in_stock <= $alert_threshold && $is_read == 0) {
            // Le stock est bas et il n'y a pas encore de notification pour ce produit, insérer une nouvelle notification
            $insert_notification_query = "INSERT INTO notifications (PRODUIT_ID) VALUES ($product_id)";
            mysqli_query($conn, $insert_notification_query);
        }
    } else {
        echo "Erreur lors de la mise à jour de la quantité.";
    }
}
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Notifications</h4>
                </div>
                <div class="card-body">
                    <?php
                    // Récupérer les notifications de stock bas depuis la table stock
                    $query = "SELECT produits.name AS product_name, stock.QUANTITE_EN_STOCK AS quantity_in_stock, stock.ALERTE_DE_STOCK_BAS AS alert_threshold, stock.EMAIL_ENTREPRISE AS company_email FROM stock JOIN produits ON stock.PRODUIT_ID = produits.ID_PRODUIT WHERE stock.QUANTITE_EN_STOCK <= stock.ALERTE_DE_STOCK_BAS";
                    $result = mysqli_query($conn, $query);

                    // Vérifier s'il y a des résultats
                    if (mysqli_num_rows($result) > 0) {
                        ?>
                        <ul>
                            <?php
                            // Afficher les notifications dans une liste
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <li>
                                    Product: <?= $row['product_name']; ?><br>
                                    Current Quantity in Stock: <?= $row['quantity_in_stock']; ?><br>
                                    Alert Threshold: <?= $row['alert_threshold']; ?><br>
                                    
                                    <?php
                                    // Vérifier si le stock est bas
                                    if ($row['quantity_in_stock'] <= $row['alert_threshold']) {
                                        echo '<p style="color: red;">Le stock est bas !</p>';
                                    }
                                    ?>
                                </li>
                                <br>
                            <?php } ?>
                        </ul>
                    <?php } else {
                        echo "Aucune notification de stock bas trouvée.";
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
