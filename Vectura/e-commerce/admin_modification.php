<!-- <?php

        $objetPdo = new PDO('mysql:host=localhost; dbname=vectura', 'root', '');
        $pdoStat = $objetPdo->prepare('SELECT * FROM marque WHERE id = :num');
        $pdoStat->bindValue(':num', $_GET['numModifier'], PDO::PARAM_INT);
        $executeIfOk = $pdoStat->execute();
        $marque = $pdoStat->fetch();
        var_dump($marque);

        ?> -->
<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Modification</title>
    <link rel="stylesheet" href="modification.css">

</head>

<body>

    <h1>Modifier un modele :</h1>

    <form action="modifier.php" method="post">

        <input type="hidden" name="numModele" value="<?= $marque['ID'] ?>">

        <p>
            <label for="Modele">Modele :</label><br />
            <input id="Modele" type="text" size="100px" name="Modele" value="<?= $marque['Modele']; ?>">
        </p>
        <p>
            <label for="Description">Description :</label><br />
            <textarea id="Description" rows='10' cols='91' name="Description" value="<?= $marque['Description']; ?>"><?= $marque['Description']; ?></textarea>
        </p>
        <p>
            <label for="Prix">Prix :</label><br />
            <input id="Prix" type="text" size="100px" name="Prix" value="<?= $marque['Prix']; ?>">
        </p>
        <p>
            <label for="Quantite">Quantite :</label><br />
            <input id="Quantite" type="text" size="100px" name="Quantite" value="<?= $marque['Quantite']; ?>">
        </p>
        <p>
            <label for="Images"></label><br />
            <input id="Images" type="hidden" size="100px" name="Images" value="<?= $marque['Images']; ?>">
        </p>
        <p>
            <button id="modif" type="submit">Enregistrer les modifications</button>
        </p>
    </form>
    <button type="submit" onclick="window.location.href = 'index_administrateur.php';">Retour</button><br /><br />
    <button type="submit" onclick="window.location.href = 'index.php';">Retour vers le site</button>
</body>

</html>