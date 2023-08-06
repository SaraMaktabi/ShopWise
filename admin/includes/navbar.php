<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                    <label class="form-label">Type here...</label>
                    <input type="text" class="form-control">
                    <!--try-->
                    <div class="notification-icon">
                        <!-- Ici, vous pouvez ajouter l'icône de votre choix (par exemple, une icône de cloche) -->
                        <a href="notif.php" class="fas fa-bell" id="notif"></a>
                        <!-- Afficher le badge uniquement lorsque le stock est bas -->
                        <?php
                        include('../config/dbconn.php');
                        $query = "SELECT COUNT(*) AS unread_notifications FROM stock WHERE QUANTITE_EN_STOCK <= ALERTE_DE_STOCK_BAS AND is_read = 0";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);
                        $unread_notifications = $row['unread_notifications'];
                        if ($unread_notifications > 0) {
                            echo '<span class="notification-badge">' . $unread_notifications . '</span>';
                        }
                        ?>
                    </div>
                    <style>
                        /* Style pour l'icône */
                        .notification-icon {
                            position: relative;
                        }

                        /* Style pour le badge */
                        .notification-badge {
                            position: absolute;
                            top: -10px;
                            right: -10px;
                            background-color: red;
                            color: white;
                            width: 20px;
                            height: 20px;
                            border-radius: 50%;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            font-size: 14px;
                        }

                        #notif {
                            font-size: 2.5rem;
                            margin-left: 1.5rem;
                            padding-right: 5px;
                            color: #444;
                            cursor: pointer;
                        }

                        #notif:hover {
                            color: #b97375;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
</nav>
