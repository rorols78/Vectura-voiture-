<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <link href="connexion.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body>

    <?php require_once "db.php" ?>
    <?php session_start(); ?>
    <?php
    if (isset($_POST['formconnexion'])) {
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = sha1($_POST['mdp']);

        $req = $bdd->query('select * from client where mail = "' . $_POST['mail'] . '" and mdp = "' . $_POST['mdp'] . '"')->fetch();

        if ($req) {
            $_SESSION['ID'] = $req['ID'];
            $_SESSION['pseudo'] = $req['pseudo'];
            $_SESSION['mail'] = $req['mail'];
            $_SESSION['mdp'] = $req['mdp'];
            header("Location: index.php");
        }
    }
    ?>

    <section class="login-connexion">
        <div class="loginbox">
            <h1>Connexion</h1>
            <form action="" method="post">
                <p>Mail</p>
                <input type="email" name="mail" placeholder="Mail" required="required" />
                <p>Mot de passe</p>
                <input type="password" name="mdp" placeholder="Mot de passe" required="required" />
                <input type="submit" name="formconnexion" value="Connexion"> <br />
                <button type="submit" onclick="window.location.href = 'inscription.php';">Créer un compte </button><br /><br />
                <button type="submit" onclick="window.location.href = 'index.php';">Retour</button><br />
                <!--<a href="#">Mot de passe oublier ?</a><br> -->
            </form>
        </div>
    </section>
</body>

</html>