<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php
 $title="dashboard.php";
 include('head.php')
 ?>
<body>
    <header class="dashboard-header bg-dark d-flex px-4 align-items-center  justify-content-between">
        <div class="dashboard-breand">
            <a class="d-flex align-items-center" href="">
                <img src="./photo/logo.png" class="dashboard-logo me-2" alt="console">
                <p class="m-0">Enjoy Game</p>
            </a>
        </div>
        <div class="dashboard-pages">
            <ul class="d-flex align-items-center m-0">
                <li class="me-3"> <a class="px-3 py-1" href="#" target="_blank">Home</a></li>
                <li class="me-3"> <a class="px-3 py-1" href="#" target="_blank">About</a></li>
                <li class="me-3"> <a class="px-3 py-1" href="#" target="_blank">Contact</a></li>
            </ul>
        </div>
        <div class="dashboard-compte">
            <ul class="d-flex align-items-center m-0">
                <li class="me-3"><a class="text-light" href="#" target="_blank">Sign up</a></li>
                <li class="me-3"><a class="text-light" href="#" target="_blank">Sign in</a></li>
            </ul>
        </div>
        <div class="dashboard-menu d-none">
            <i id="burger-menu" class="fa-solid fa-bars text-light fs-2 d-block"></i>
            <i id="burger-colse" class="fa-solid fa-rectangle-xmark text-light fs-2 d-none"></i>
        </div>
    </header>
    <header id="affichage-header" class="responsive-header bg-dark ">
        <div class="responsive-pages">
            <ul class="">
                <li class="me-3"> <a class="px-3 py-1" href="#" target="_blank">Home</a></li>
                <li class="me-3"> <a class="px-3 py-1" href="#" target="_blank">About</a></li>
                <li class="me-3"> <a class="px-3 py-1" href="#" target="_blank">Contact</a></li>
            </ul>
        </div>
        <div class="responsive-compte">
            <ul class="">
                <li class="me-3"><a class="text-light" href="#" target="_blank">Sign up</a></li>
                <li class="me-3"><a class="text-light" href="#" target="_blank">Sign in</a></li>
            </ul>
        </div>
        <div class="dashboard-menu d-none">
            <i class="fa-solid fa-bars text-light fs-2"></i>
        </div>
    </header>
    <main class="dashboard-main">

        <div class="mt-4 d-flex">
            <a class="btn btn-primary ms-auto me-2" data-bs-target="#modal-product" data-bs-toggle="modal">add product</a>
        </div>
        <div class="container table-responsive">
            <table class="table caption-top">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $req=$connect->prepare("SELECT * FROM product");
                    $req->execute();
                    $num=$req->rowCount();
                    if($num==0){
                       ?>
                       <tr>il n' éxiste aucun produit</tr>
                       <?php
                    }
                    while($ligne=$req->fetch()):
                    ?>
                    <tr>
                        <td><?php echo $ligne["id"]?></td>
                        <td>
                          <img style="width:100px;height:100px;" <?= 'src=image/' . $ligne["photo"] ?> alt="photo">
                        </td>
                        <td><?php echo $ligne["nom"]?></td>
                        <td><?php echo $ligne["prix"]?></td>
                        <td><?php echo $ligne["quantité"]?></td>
                        <form action="edit.php?id=<?php $ligne["id"];?>"  >
                        <input type="hidden" name="id" value="<?php echo $ligne["id"]?>">
                        <th> <input type="submit" class="btn btn-warning" name="show" value="modifier"> </th>
                        </form>
                        <form action="script.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $ligne["id"]?>">
                        <th > <input type="submit" name="delete" class="btn btn-danger" value="supprimer"> </th>
                        </form>
                    </tr>
                    <?php endwhile?>
                </tbody>
            </table>
        </div>
    </main>










    <!-- Modal -->
    <div class="modal" tabindex="-1" id="modal-product">
        <div class="modal-dialog">
            <form id="product-form" action="script.php" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter Produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Nom du produit</p>
                        <div class="mb-2">
                            <input class="form-control" type="text" name="nom" id="nom">
                        </div>
                        <p>Prix</p>
                        <div class="mb-2">
                            <input class="form-control" type="number" name="prix" id="prix">
                        </div>
                        <p>Quantité</p>
                        <div class="mb-2">
                            <input class="form-control" type="number" name="quantité" id="quantité">
                        </div>
                        <p>Photo</p>
                        <div class="mb-2">
                            <input class="form-control" type="file" name="photo" id="photo">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button name="saveProduct" type="" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>

</html>