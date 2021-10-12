<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="inscription.css">

<body>
    <?php require_once "db.php" ?>
    <?php
    if (isset($_POST['forminscription'])) {
        if (
            !empty($_POST['pseudo']) and !empty($_POST['mail']) and
            !empty($_POST['mdp']) and !empty($_POST['mdp2'])
        ) {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mail = htmlspecialchars($_POST['mail']);
            $mdp = ($_POST['mdp']);
            $mdp2 = ($_POST['mdp2']);

            header("Location: connexion.php"); {
                $req = $bdd->query('select * from client where mail = "' . $_POST['mail'] . '"')->rowCount();

                if ($req == 0) {
                    $sent = 'insert into client(pseudo, mail, mdp) 
        values(\'' . $_POST['pseudo'] . '\',\'' . $_POST['mail'] . '\',\'' . $_POST['mdp'] . '\')';
                    $bdd->exec($sent);
                }
            }
        }
    }
    ?>

    <section class="login-inscription">
        <div class="loginbox">
            <h1>Inscription</h1>
            <form action="" method="post">
                <p>Pseudo</p>
                <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required="required" />
                <p>Mail</p>
                <input type="email" name="mail" id="mail" placeholder="Mail" required="required" />
                <p>Mot de passe</p>
                <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required="required" />
                <p>Confirmation du mot de passe</p>
                <input type="password" name="mdp2" id="mdp2" placeholder="Confirmation du mot de passe" onBlur="checkPass()" required="required" />
                <div id="divcomp"></div><br />
                <input type="checkbox" name="souvenir" checked required><?php echo '&nbsp;&nbsp' ?><a href="condition_generale.php" METHOD="POST" TARGET=_BLANK>J'ai lu et j'accepte les conditions génerales d'utilisation</a>
                <input type="submit" name="forminscription" value="Inscription">
                <button type="submit" onclick="window.location.href = 'connexion.php';">Se connecter</button><br /><br />
                <button type="submit" onclick="window.location.href = 'index.php';">Retour</button>
            </form>
        </div>
    </section>

    <script>
        function checkPass() {
            var mdp = document.getElementById("mdp").value;
            var mdp2 = document.getElementById("mdp2").value;
            var div_comp = document.getElementById("divcomp");

            if (mdp == mdp2) {
                divcomp.innerHTML = "Vos mots de passe sont indentiques";
            } else {
                divcomp.innerHTML = "Vos mots de passe ne correspondent pas !";
            }
        }
    </script>

</body>

</html>