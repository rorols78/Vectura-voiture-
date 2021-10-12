<?php
/*Toute la partie barre de naviagtion (qui varie en fonction de l'utilisateur*/
session_start();
include ($_SERVER['DOCUMENT_ROOT'] ."virathavon/Commons/Main/DB.php");
/*partie connection*/
$connect=false;
if (isset($_SESSION["MecanotopSessionKey"])){
    $macon=connect();
    $req="SELECT Username FROM User WHERE Password =\"".$_SESSION["MecanotopSessionKey"]."\"";
    $response=mysqli_query($macon,$req);
    if ($response->num_rows == 1) {
        global $connect,$username;
        $row = $response->fetch_assoc();
        $username=$row["Username"];
        $connect=true;
    };
};

?>
<!-- Barre de navigation (avec changement dynamique)-->
<div class="container-fluid">
  <nav id="navbartop" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button style="color:white" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse"> <i class="fa fa-caret-down"></i> </button>
        <a class="navbar-brand page-scroll" href="/Home/Home.php"> <span class="light">Mécano</span>Top
        </a>
    </div>
      <div class="collapse navbar-collapse navbar-main-collapse">
        <ul class="nav navbar-nav">
          <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
          <li class="hidden barredenavigation"> <a href="#page-top"></a> </li>
          <li class="barredenavigation"> <a  href="#howto">Comment ça marche</a> </li>
          <li class="barredenavigation"> <a  href="#advantages">Avantages</a> </li>
          <li class="barredenavigation"> <a  href="#reservation">Réservation</a> </li>
          <li class="barredenavigation"> <a href="#contact">Contact</a> </li>
          </ul>
        <?php
        /*Changement en fonction de la connection de l'utilisateur*/
        if(isset($connect)){
            if($connect){
                echo ' <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
       <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user-circle"></i> &nbsp; '.$username.'
       <span class="caret"></span></a>
       <ul class="dropdown-menu">
         <li><a href="/SignIn/PageAffec.php">Mon Compte</a></li>
         <li class="divider"></li>
         <li><a href="/SignIn/Disconnect.php">Déconnexion</a></li>
       </ul>
       </li>
       </ul>';
            }
            else{echo '<p data-toggle="modal" href="#connexion" style="color:white" class="btn navbar-right navbar-btn "><i class="fa fa-sign-in fa-fw"></i> Connexion</p>
            <p data-toggle="modal" href="#inscription" style="color:white" class="btn navbar-right navbar-btn "><i class="fa fa-user-plus fa-fw"></i> Inscription</p>}';}
        }
        else{echo '<p data-toggle="modal" href="#connexion" style="color:white" class="btn navbar-right navbar-btn "><i class="fa fa-sign-in fa-fw"></i> Connexion</p>
        <p data-toggle="modal" href="#inscription" style="color:white" class="btn navbar-right navbar-btn "><i class="fa fa-user-plus fa-fw"></i> Inscription</p>}';}

        ?>
      </div>
    </div>
  </nav>                                               
</div>
<!-- Header -->
