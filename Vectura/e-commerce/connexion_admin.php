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
    if (isset($_POST['aformconnexion'])) {
        $admin = htmlspecialchars($_POST['admin']);
        $mdp = sha1($_POST['mdp']);

        $req = $bdd->query('select * from admin where admin = "' . $_POST['admin'] . '" and mdp = "' . $_POST['mdp'] . '"')->fetch();

        if ($req) {
            $_SESSION['ID'] = $req['ID'];
            $_SESSION['admin'] = $req['admin'];
            $_SESSION['mdp'] = $req['mdp'];
            header("Location: index_administrateur.php");
        }
    }
    ?>

    <section class="login-connexion">
        <div class="loginbox">
            <h1>Connexion</h1>
            <form action="" method="post">
                <p>Admin</p>
                <input type="text" name="admin" placeholder="Admin" required="required" />
                <p>Mot de passe</p>
                <input type="password" name="mdp" placeholder="Mot de passe" required="required" />
                <input type="submit" name="aformconnexion" value="Connexion"> <br />
                <button type="submit" onclick="window.location.href = 'index.php';">Retour</button><br />
            </form>
        </div>
    </section>

</body>

</html>