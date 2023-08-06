<?php
include('includes/header.php');
include('../config/dbconn.php');
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
                                    Company Email: <?= $row['company_email']; ?>
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
                        <?php
                        // Marquer les notifications comme lues une fois qu'elles ont été affichées
                        $mark_read_query = "UPDATE stock SET is_read = 1 WHERE QUANTITE_EN_STOCK <= ALERTE_DE_STOCK_BAS";
                        mysqli_query($conn, $mark_read_query);
                    } else {
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
