<?php

//Fonction utilisateurs authentifie
//fonction permettant de savoir si l'utilisateur est authentifié sur le site
function userConnected(){

    //si l'indice user dans le fichier de sessions n'est pas définit, cela veut dire que l'internaute n'est pas passé par la page connexion et n'est pas authentifié
    if(isset($_SESSION['user'])) return true;
    else
    return false; // on retourne true si l'indice 'user' est définit dans la session
}


//Fonction administrateur authentifie
//fonction permettant de savoir si l'administrateur est authentifié sur le site

function adminConnected(){
    //si à l'indice 'roles, la valeur est  egale a admin, cela veut dire que c'est un admin, donc retourne true
    if(userConnected() && $_SESSION['user']['roles'] == 'admin') return true;
    return false;  // on retourne false si le role n'est pas admin



}