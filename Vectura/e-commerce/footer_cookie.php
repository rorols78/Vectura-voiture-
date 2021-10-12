<?php
if (isset($_COOKIE['accept_cookie'])) {
    $showcookie = false;
} else {
    $showcookie = true;
}
require_once('footer.view.php');
?>

<head>
    <link rel="stylesheet" href="footer.css">
</head>
<footer>

    <div class="contenu-footer">
        <div class="bloc-footer-contact">
            <h3 id="mail">Restons en contact</h3><br>
            <p>05 06 07 08 09</p>
            <a id="mail-" href="mailto:supportclient@contact.com">supportclient@contact.com</a><br>
            <a id="adresse-" href="https://www.google.com/search?q=17+rue+Linn%C3%A9%2C+Paris+V%2C+75005&oq=17+rue+Linn%C3%A9%2C+Paris+V%2C+75005&aqs=chrome..69i57.716j0j7&sourceid=chrome&ie=UTF-8" METHOD="POST" TARGET=_BLANK>17 rue Linné,<br> Paris V - 75005</a>
        </div>

        <div class="bloc footer-horaires">
            <h3>Les horaires</h3>
            <ul class="liste-horaires">
                <li>✔️ Lun 10h-19h</li>
                <li>✔️ Mar 10h-19h</li>
                <li>✔️ Mer 10h-19h</li>
                <li>✔️ Jeu 10h-19h</li>
                <li>✔️ Ven 10h-19h</li>
                <li>❌ Sam fermé</li>
                <li>❌ Dim fermé</li>
            </ul>
        </div>

        <div class="bloc footer-medias">
            <h3 id="réseaux">Nos réseaux</h3>
            <ul class="liste-media">
                <li><a href="https://www.facebook.com/" METHOD="POST" TARGET=_BLANK>
                        <img src="img/facebook.png" alt="icones réseaux sociaux">Facebook</a></li>
                <li><a href="https://www.instagram.com/?hl=fr" METHOD="POST" TARGET=_BLANK>
                        <img src="img/instagram.png" alt="icones réseaux sociaux">Instagram</a></li>
                <li><a href="https://twitter.com/" METHOD="POST" TARGET=_BLANK>
                        <img src="img/twitter.png" alt="icones réseaux sociaux">Twitter</a></li>
                <li><a href="https://github.com/" METHOD="POST" TARGET=_BLANK>
                        <img src="img/github.png" alt="icones réseaux sociaux">Github</a></li>
                <li><a href="https://www.youtube.com/" METHOD="POST" TARGET=_BLANK>
                        <img src="img/youtube.webp" alt="icones réseaux sociaux">Youtube</a></li>
            </ul>
        </div>

    </div>

</footer>