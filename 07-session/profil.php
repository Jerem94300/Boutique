<?php
session_start();

echo '<pre>'; print_r($_SESSION); echo'</pre>';

//permet de supprimer des données

unset($_SESSION['panier']);

//suppression de la session
session _destroy();

/*
Les informations de la session sont enregistrées côté serveur, elle contient des informations sensible comme l'email, les données du panier, elles sont stockées et accessibles via la superglobale #_SESSION, qui est un tableau de données Array (identique à $ GET et $_POST), le session permet d'avoir accès à des données sur n'importe quelle page de l'application, il y a un fichier de session par utilisateur, la session a une durée de vie illimitée, si on ne la supprime pas, elle perdure. Elle permet d'être authentifier sur une application, sans elle nous serions déconnecter à cahque changement de page */


