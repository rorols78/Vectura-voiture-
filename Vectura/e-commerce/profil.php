<!DOCTYPE <html>

<head>
    <title>Profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="navbarpage.css">
    <link rel="stylesheet" href="profil.css">
</head>

<body>
    <?php session_start(); ?>
    <?php include "navbar.php" ?><br></br>
    <?php require_once "db.php" ?>
    <?php if (isset($_SESSION['mail'])) { ?>

        <center>
            <h1>Profil de <?php echo $_SESSION['pseudo']; ?></h1>
        </center>

        <?php

        if (isset($_SESSION['ID'])) {
            $requser = $bdd->prepare("SELECT * FROM client WHERE ID = ?");
            $requser->execute(array($_SESSION['ID']));
            $user = $requser->fetch();
            if (isset($_POST['newpseudo']) and !empty($_POST['newpseudo']) and $_POST['newpseudo'] != $user['pseudo']) {
                $newpseudo = htmlspecialchars($_POST['newpseudo']);
                $insertpseudo = $bdd->prepare("UPDATE client SET pseudo = ? WHERE ID = ?");
                $insertpseudo->execute(array($newpseudo, $_SESSION['ID']));
                // header('Location: profil.php?id=' . $_SESSION['ID']);
            }
            if (isset($_POST['newmail']) and !empty($_POST['newmail']) and $_POST['newmail'] != $user['mail']) {
                $newmail = htmlspecialchars($_POST['newmail']);
                $insertmail = $bdd->prepare("UPDATE client SET mail = ? WHERE ID = ?");
                $insertmail->execute(array($newmail, $_SESSION['ID']));
                // header('Location: profil.php?id=' . $_SESSION['ID']);
            }
            if (isset($_POST['newnumero']) and !empty($_POST['newnumero']) and $_POST['newnumero'] != $user['numero']) {
                $newnumero = htmlspecialchars($_POST['newnumero']);
                $insertnumero = $bdd->prepare("UPDATE client SET numero = ? WHERE ID = ?");
                $insertnumero->execute(array($newnumero, $_SESSION['ID']));
                //header('Location: profil.php?id=' . $_SESSION['ID']);
            }

            if (isset($_POST['newadresse']) and !empty($_POST['newadresse']) and $_POST['newadresse'] != $user['adresse']) {
                $newadresse = htmlspecialchars($_POST['newadresse']);
                $insertadresse = $bdd->prepare("UPDATE client SET adresse = ? WHERE ID = ?");
                $insertadresse->execute(array($newadresse, $_SESSION['ID']));
                // header('Location: profil.php?id=' . $_SESSION['ID']);
            }
            if (isset($_POST['newcodepostal']) and !empty($_POST['newcodepostal']) and $_POST['newcodepostal'] != $user['codepostal']) {
                $newcodepostal = htmlspecialchars($_POST['newcodepostal']);
                $insertcodepostal = $bdd->prepare("UPDATE client SET codepostal = ? WHERE ID = ?");
                $insertcodepostal->execute(array($newcodepostal, $_SESSION['ID']));
                //header('Location: profil.php?id=' . $_SESSION['ID']);
            }
            if (isset($_POST['newville']) and !empty($_POST['newville']) and $_POST['newville'] != $user['ville']) {
                $newville = htmlspecialchars($_POST['newville']);
                $insertville = $bdd->prepare("UPDATE client SET ville = ? WHERE ID = ?");
                $insertville->execute(array($newville, $_SESSION['ID']));
                // header('Location: profil.php?id=' . $_SESSION['ID']);
            }
            if (isset($_POST['newmdp1']) and !empty($_POST['newmdp1']) and isset($_POST['newmdp2']) and !empty($_POST['newmdp2'])) {
                $mdp1 = ($_POST['newmdp1']);
                $mdp2 = ($_POST['newmdp2']);
                if ($mdp1 == $mdp2) {
                    $insertmdp = $bdd->prepare("UPDATE client SET mdp = ? WHERE ID = ?");
                    $insertmdp->execute(array($mdp1, $_SESSION['ID']));
                    //header('Location: profil.php?id=' . $_SESSION['ID']);
                } else {
                    $msg = "Vos mots de passe ne correspondent pas !";
                }
                $msg1 = "Vos informations ont bien été mis à jour !";
            }
        }
        ?>

        <div class="container">
            <div class="container_profil">

                <h3>Modifier vos coordonnées :</h3><br>
                <form method="post" action="profil.php">
                    <label>Pseudo :</label>
                    <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /><br />
                    <label>Mail :</label>
                    <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /><br />
                    <label>Mot de passe :</label>
                    <input type="password" name="newmdp1" placeholder="Mot de passe" /><br />
                    <label>Confirmation du mot de passe :</label>
                    <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br />
                    <label>Numéro de téléphone :</label>
                    <input type="text" name="newnumero" placeholder="Numéro de téléphone" value="<?php echo $user['numero']; ?>" /><br />
                    <label>Adresse :</label>
                    <input type="text" name="newadresse" placeholder="Adresse" value="<?php echo $user['adresse']; ?>" /><br />
                    <label>Code postal :</label>
                    <input type="text" name="newcodepostal" placeholder="Code postal" value="<?php echo $user['codepostal']; ?>" /><br />
                    <label>Ville :</label>
                    <input type="text" name="newville" placeholder="Ville" value="<?php echo $user['ville']; ?>" /><br />
                    <button type="submit"> Mettre à jour mon profil ! </button>
            </div>
        </div>
        </div>
        </form>
        <center>
            <?php if (isset($msg)) {
                echo $msg;
            } else {
                echo $msg1;
            } ?><br /><br />
        </center>

</body>

<?php include "footer.php" ?>

</html>

<?php } else {
        header("Location: connexion.php");
    } ?>