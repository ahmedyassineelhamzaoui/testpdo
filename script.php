<?php
include('connect.php');
if (isset($_POST["saveProduct"])) {
    ajouterProduit();
}
if (isset($_POST["delete"])) {
    supprimer();
}
if (isset($_POST["update"])) {

    modifier();
}






// ajouter produit 
function ajouterProduit()
{
    global $connect;
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    $quantité = $_POST["quantité"];
    $photo = $_FILES["photo"]["name"];
    $file = $_FILES["photo"]["tmp_name"];
    //  c'est une chose n'est pas efficace
    // $sqlinsert=$connect->prepare(" INSERT INTO product VALUES(null,'$nom','$prix','$quantité','$photo') "); ce n'est efficace d'utilise cette methode
    // l'idée de preparation des requete  c'est separer le traitement des donnes
    // la meilleur methode pour specier les argument et de metter dans un tableau soit associatif ou bien indexé
    // voila le traitment
    // ? marquer intergoatif
    // :nom marqueur nomé
    $sqlinsert= $connect->prepare("INSERT INTO product(nom,prix,quantité,photo) VALUES(:nom,:prix,:quantité,:photo)");
    $sqlinsert->execute(array(":nom"=>"$nom",":prix"=>"$prix",":quantité"=>"$quantité",":photo"=>"$photo"));
    $sqlinsert = $connect->prepare("INSERT INTO product(nom,prix,quantité,photo) VALUES(?,?,?,?)");
    $sqlinsert->execute(array($nom, $prix, $quantité, $photo));//tableau indexé 
    move_uploaded_file($file, './image/' . $photo);
    header('location:dashboard.php');
}
// delete product
function supprimer()
{
    global $connect;
    $id = $_POST["id"];
    $sqlreq = $connect->prepare("DELETE FROM product WHERE id=?");
    $sqlreq->execute(array($id));
    header('location:dashboard.php');
}

// edit product
function modifier()
{

    global $connect;
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    $quantité = $_POST["quantité"];
    $photo = $_FILES["photo"]["name"];
    $file = $_FILES["photo"]["tmp_name"];
    if(empty($photo)){
        $sql=$connect->prepare("UPDATE product SET nom=?,prix=?,quantité=? WHERE id=? ");
        $sql->execute(array($nom,$prix,$quantité,$id));
        header('location:dashboard.php');
    }else{
        $sql = $connect->prepare("UPDATE product  SET nom=?,photo=?,prix=?,quantité=? WHERE id=? ");
        move_uploaded_file($file, 'image/' . $photo);
        $sql->execute(array($nom,$photo,$prix,$quantité,$id));
        header('location:dashboard.php');
    }
  
}
