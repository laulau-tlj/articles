<?php
// J'importe le header
include_once('includes/header.php');
?>

<div class="center">
    <h1>Admin</h1>
    <?php
    // Si la variable get action existe on affiche le formulaire
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'add_article') {
            require_once('includes/database.php');
            if (isset($_POST['submit'])) {

                extract($_POST);

                print_r($_FILES['fichier']);

                $content_dir = ('images/');
            }
            ?>
            <h3>Ajouter un article</h3><br>
            <form method="POST" action="" enctype="multipart/form-data" style="border: #D3D3D3 solid 1px; padding: 3%; border-radius: 5px">
                <input type="text" name="titre" id="" placeholder="Entrer le nom de l'article" required="" class="form form-control"><br>
                <textarea name="description" id="" placeholder="Entrer la description de l'article" class="form form-control"></textarea><br>
                <input type="file" name="fichier"><br><br>
                <input type="submit" name="submit" class="btn btn-primary">
            </form>

            <?php
        }
    }
    ?>
</div>

<?php
// J'importe le footer
include_once('includes/footer.php');
?>