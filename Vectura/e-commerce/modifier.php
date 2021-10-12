<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="modification.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <title>Modification : résultat</title>
</head>

<body>
    <?php session_start(); ?>
    <?php if (isset($_SESSION['admin'])) { ?>
        <?php
        $objetPdo = new PDO('mysql:host=localhost; dbname=vectura', 'root', '');

        $pdoStat = $objetPdo->prepare('UPDATE marque set Modele=:Modele, Description=:Description, Prix=:Prix, Quantite=:Quantite, Images=:Images WHERE ID=:num LIMIT 1');

        $pdoStat->bindValue(':num', $_POST['numModele'], PDO::PARAM_INT);
        $pdoStat->bindValue(':Modele', $_POST['Modele'], PDO::PARAM_STR);
        $pdoStat->bindValue(':Description', $_POST['Description'], PDO::PARAM_STR);
        $pdoStat->bindValue(':Prix', $_POST['Prix'], PDO::PARAM_STR);
        $pdoStat->bindValue(':Quantite', $_POST['Quantite'], PDO::PARAM_STR);
        $pdoStat->bindValue(':Images', $_POST['Images'], PDO::PARAM_STR);

        $executeIfOk = $pdoStat->execute();

        if ($executeIfOk) {
            $message = 'Les caractères ont été mis à jour';
        } else {
            $message = 'Echec de la mise à jour des caractères';
        }
        ?>
        <h1>Résultat de la modification :</h1>
        <h2><?php echo $message; ?></h2>
        <button type="submit" onclick="window.location.href = 'index_administrateur.php?type=client&supprime=0';">Retour</button><br /><br />
        <button type="submit" onclick="window.location.href = 'index.php';">Retour vers le site</button>
</body>

</html>

<?php } else {
        header("Location: connexion_admin.php");
    } ?>