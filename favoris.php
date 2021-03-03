<?php
session_start();
require('inc/functions.php');
require('inc/pdo.php');
require('inc/header.php');
// verif utilisateur connecter 

// afficher les favoris de l'utilisateur 
if (!empty($_GET['id'])) 
    {              // on verifie si l'id est present puis on le recupere 
            $id = $_GET['id'];
            echo $id; 

        if (isLogged())
            {
             echo ('Film ajouter a vos favoris' );
            }
        else
        {            
           '<p>'. die('    error 403').'</p>';
        }
    }
else 
    {
        die('404');
    }