<?php
// J'importe le header
include_once('includes/header.php');
?>

<div class="center">
    <h1>Admin</h1>
    <?php
    // Ajouter un article
    // Si la variable get action existe on affiche le formulaire
    if (isset($_GET['action'])) {
        // si action correspond à add_article
        if ($_GET['action'] == 'add_article') {
            // On se connexte à la bdd
            require_once('includes/database.php');
            // Si on clique sur le bouton submit, on récupère les données du formulaire
            if (isset($_POST['submit'])) {

                extract($_POST);

                // print_r($_FILES['fichier']);
                // Variable qui va contenir l'image
                $content_dir = 'images/';
                // le nom de l'image
                $tmp_file = $_FILES['fichier']['tmp_name'];

            // Gestion des erreurs de l'image
                // Si le fichier image est introuvable
                if (!is_uploaded_file($tmp_file)) {
                    exit('Le fichier est introuvable');
                }

                // On récupère le type de l'image
                $type_file = $_FILES['fichier']['type'];

                // On verifie l'extension ou le format de l'image du fichier 
                if (!strstr($type_file, 'jpeg') && !strstr($type_file, 'png')) {
                    exit("Ce fichier n'est pas au bon format");
                }

                // On stock le nom du fichier 
                $name_file = time().'.jpg';

                // On enregistre l'image dans la variable content_dir
                if (!move_uploaded_file($tmp_file, $content_dir.$name_file)) {
                    exit("Impossible de copier le fichier");
                }

                // On stock dans la bdd
                $save_article = $db->prepare('INSERT INTO all_articles(titre,description,image_name) VALUES(?,?,?)');

                $save_article->execute(array($titre,$description,$name_file));
                echo('Opération réussie avec succes !');
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
            // sinon si action correspond à update_delete
        }elseif ($_GET['action'] == 'update_delete') {
            
            $req_all_article
            // On se connexte à la bdd
            require_once('includes/database.php');
            // Si on clique sur le bouton update on affiche le formulaire de modification
            if (isset($_POST['update'])) {

            }
        }
    }

    
    ?>
</div>

<?php
// J'importe le footer
include_once('includes/footer.php');
?>