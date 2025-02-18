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


//Fonction création panier session

function createCart(){
    //si l'indice cart n'est pas defini dans la session utilisateur cela veut dire que l'utilisateur n'a ajouté aucuns produits dans le panier alors on crée les differents tableaux dans la session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
        $_SESSION['cart']['id_product'] = [];
        $_SESSION['cart']['title'] = [];
        $_SESSION['cart']['picture'] = [];
        $_SESSION['cart']['reference'] = [];
        $_SESSION['cart']['quantity'] = [];
        $_SESSION['cart']['price'] = [];

    }
}

//Fonction ajouter produit dans panier session

function addProductToCart($id_product, $title, $picture, $reference, $quantity, $price){

    createCart(); // on controle que le panier existe dans la session

    // on controle si l'id du produit qu'on essai d'ajouter existe deja 
    $positionProduct = array_search($id_product, $_SESSION['cart']['id_product']);
    // var_dump($positionProduct);
    //si la valeur de $positionProduct est differente de false cela veut dire que l'id_product existe dans le panier , on modifie seulement la quantite du produit
    if($positionProduct !== false){

        $_SESSION['cart']['quantity'][$positionProduct]  += $quantity;

    }else
    //sinon l'id n'est pas dans la session, on créer une nouvelle ligne dans le panier
    //les tableaux vides [] permettent de creer des indices numerique dans les tableaux

    $_SESSION['cart']['id_product'][] = $id_product;
    $_SESSION['cart']['title'][]  = $title;
    $_SESSION['cart']['picture'][] = $picture;
    $_SESSION['cart']['reference'][]  = $reference;
    $_SESSION['cart']['quantity'][]  = $quantity;
    $_SESSION['cart']['price'][] = $price;
}

//Fonction supprimer produit du panier

function removeProductFromCart($id_product){

    //on recupere la position du produit dans le panier
    $positionProduct = array_search($id_product, $_SESSION['cart']['id_product']);
    // var_dump($positionProduct);

    //si la valeur de $positionProduct est differente de false cela veut dire que l'id_product existe dans le panier , on supprime la ligne du produit
    if($positionProduct !== false){

        //array_splice permet de supprimer un element dans un array a un indice correspondant et elle remonte les indices inférieure vers les indices superieurs,  si je supprime le produit à l'indice 2 du tableau Array, le produit à l'indice 3 remonte à l'indice 2
        array_splice($_SESSION['cart']['id_product'], $positionProduct, 1);
        array_splice($_SESSION['cart']['title'], $positionProduct, 1);
        array_splice($_SESSION['cart']['picture'], $positionProduct, 1);
        array_splice($_SESSION['cart']['reference'], $positionProduct, 1);
        array_splice($_SESSION['cart']['quantity'], $positionProduct, 1);
        array_splice($_SESSION['cart']['price'], $positionProduct, 1);
    }
}



//Fonction montant total du panier

function totalAmount(){

    $total = 0;
    for($i = 0; $i < count($_SESSION['cart']['id_product']); $i++){
        $total += $_SESSION['cart']['price'][$i] * $_SESSION['cart']['quantity'][$i];
    }
    return round($total, 2);
}


//Fonction liens actifs navbar

function activeLink($url){

    //on verifie si l'url en cours correspond au lien de la navbar
    if($_SERVER['PHP_SELF'] == $url)
        echo 'active';
   
    }