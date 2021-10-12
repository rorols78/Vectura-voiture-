<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <?php require_once "db.php" ?>

    <?php
    $voiture = $bdd->query('SELECT * FROM marque');
    if ($voiture->rowCount() > 0) {
        $card = 0;
        while ($card <= ($card / 3 + 1)) { ?>
            <div class="container">
                <div class="row">
                    <?php
                    while (($card < 15) && ($info = $voiture->fetch())) { ?>
                        <div class="card">
                            <div class="card-header">
                                <h2 id="Nom"><?php echo $info["Nom"]; ?></h2>
                                <h2><?php echo $info["Modele"]; ?></h2>
                            </div>
                            <div class="card-body">
                                <img class="img" <?php echo "<img src = 'img/" . $info["Images"] .
                                                        "'width=\"130px\" height = '80px'"; ?>>
                                <a href="rendezvous.php?id=<?php echo $info["ID"]; ?> " class="btn">Voir</a> <!-- LIEN POUR ACHETER -->
                            </div>
                        </div>
                <?php
                        $card++;
                    }
                }
                ?>
                </div>
            </div>
        <?php
        $card = $card + 1;
    } ?>


</body>

</html>