<?php
include('connect.php');
if (isset($_GET["show"])) {
    $id = $_GET["id"];
    $sql = $connect->prepare("SELECT * FROM product WHERE id=?");
    $sql->execute(array($id));
    $ligne = $sql->fetch();
}
?>


<!DOCTYPE html>
<html lang="en">
<?php
$title = "edit.php";
include('head.php');
?>

<body>
    <div class="row d-flex row align-items-center justify-content-center mx-2" style="min-height: 100vh">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xsm">
            <form id="edit-form" action="script.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $ligne["id"]; ?>">
                <div class="form-group">
                    <label class="form-label">Picture</label>
                    <div>
                        <img style="width:100px;height:100px;" <?= 'src=image/' . $ligne["photo"] ?> alt="photo">
                    </div>
                    <input name="photo" type="file" accept=".jpg, .png" class="form-control" id="product-file">
                </div>
                <div class="form-group">
                    <label class="form-label">Nom du produit</label>
                    <input name="nom" type="text" class="form-control" id="product-title" value="<?= $ligne["nom"]; ?>">
                </div>
                <div class="form-group">
                    <label class="form-label">Prix</label>
                    <input name="prix" type="number" min="0" class="form-control" id="product-price" value="<?= $ligne["prix"]; ?>">
                </div>
                <div class="form-group">
                    <label class="form-label">quantité</label>
                    <input name="quantité" type="number" min="0" class="form-control" id="product-amount" value="<?= $ligne["quantité"]; ?>">
                </div>
                <div class="mt-4 form-group d-flex justify-content-end">
                    <input id="update-form" name="update" type="submit" class="me-1 btn btn-warning" value="update">
                    <a href="dashboard.php" class="me-1 btn btn-dark">Retour</a>
                </div>
            </form>

</body>

</html>