<?php

session_start();
include 'connexionBDD.php';
$cmdp = new connexionBDD();
$cmdp->changer_mdp();
