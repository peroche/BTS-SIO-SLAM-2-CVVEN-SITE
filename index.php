<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    include('header.php');
    ?>
    <body>
        <header>
            <h1>ACCUEIL</h1>
        </header>
        <?php include('menu.php') ?>
        <div id="index"><a>Bonjour et bienvenue sur notre site,</a><br>
            <a>Vous pouvez trouver des logements à prix reduit.</a><br>
        <img src="img/logement.jpg"  width="150" height="135">
        <img src="img/logement (5).jpg"  width="150" height="135">
        
        
        <br>
        
        <?php
        if (isset($_SESSION['idUtil'])) {
            echo '<legend>Hello ' . $_SESSION['login'] . '</legend>';
            if ($_SESSION['admin'] == 1) {
                echo '<a>Vous êtes connecté en tant que Administrateur</a>';
            } else {
                echo '<a>Vous êtes connecté en tant que Utilisateur</a>';
            }
            echo '<br>';
        }
        ?>
        <div class="img">
                <img src="img/logement (1).jpg"  width="150" height="135">
            </a>
            <div class="desc">Logement à Champs sur marne</div>
        </div>
        <div class="img">
                <img src="img/logement (2).jpg"  width="150" height="135">
            </a>
            <div class="desc">Logement à Champs sur marne</div>
        </div>
        <div class="img">
                <img src="img/logement (3).jpg"  width="150" height="135">
            </a>
            <div class="desc">Logement à Meaux</div>
        </div>
        <div class="img">
                <img src="img/logement (4).jpg"  width="150" height="135">
            </a>
            <div class="desc">Logement à Paris</div>
        </div>
        <div class="img">
                <img src="img/logement (6).jpg"  width="150" height="135">
            </a>
            <div class="desc">Logement à Paris</div>
        </div>
        </div>
    </body>
</html>
