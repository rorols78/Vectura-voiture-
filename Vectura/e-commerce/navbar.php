<nav>
    <!-- <label for="menu-mobile" class="menu-mobile"> Menu </label>
    <input type="checkbox" id="menu-mobile" role="button"> -->
    <ul>
    <!--
        <li class="imglogo"><a href="index.php"><img id="logo" src="img/logo-petit.png"/></a></li>
    -->
        <li class="menu-accueil"><a href="index.php">Accueil</a>
            <ul class="submenu">
                <li><a href="index.php#histoire">Notre histoire</a></li> <!-- ################### rajouter un nom de page sur "#" ###################### -->
                <li><a href="index.php#trouver">Ou nous trouvers</a></li>
                <li><a href="index.php#marche">Comment ça marche</a></li>
            </ul>
        </li>
        <li class="menu-modele"><a href="modele.php">Modèle</a>
            <ul class="submenu">
                <li><a href="rendezvous.php?id=1">Aston Martin</a></li>
                <li><a href="rendezvous.php?id=2">BMW</a></li> <!-- ################### rajouter un nom de page sur "#" ###################### -->
                <li><a href="rendezvous.php?id=3">Bugati</a></li>
                <li><a href="rendezvous.php?id=4">Ferrari</a></li>
                <li><a href="rendezvous.php?id=5">Lamborghini</a></li>
                <li><a href="rendezvous.php?id=6">Lotus</a></li>
                <li><a href="rendezvous.php?id=7">Maserati</a></li>
                <li><a href="rendezvous.php?id=8">Porsche</a></li>
                <li><a href="rendezvous.php?id=9">Tesla</a></li>
            </ul>
        </li>
        <li class="menu-contact"><a href="contact.php">Contact</a>
            <ul class="submenu">
                <li><a href="#mail">Mail</a></li> <!-- ################### rajouter un nom de page sur "#" ###################### -->
                <li><a href="#réseaux">Réseau sociaux</a></li>
                <?php if (isset($_SESSION['mail'])) { ?>
                    <li><a href="formulairerdv.php">Rendez-vous</a></li>
                <?php } else { ?>
                    <li><a href="connexion.php">Rendez-vous</a></li>
                <?php } ?>
            </ul>
        </li>
        <?php
        if (isset($_SESSION['mail'])) { ?>
            <li class="menu-deconnexion"><a href="deconnexion.php">Déconnexion</a></li>
            <li class="menu-profil"><a href="profil.php">Mon compte</a></li>
        <?php
        } else { ?>
            <li class="menu-inscription"><a href="inscription.php">Inscription</a></li>
            <li class="menu-connexion"><a href="connexion.php">Connexion</a></li>
        <?php }
        ?>
    </ul>
</nav>