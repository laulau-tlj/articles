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
                // On extrait les differentes variables $_POST du formulaire
                extract($_POST);

                // print_r($_FILES['fichier']);
                // Variable qui va contenir l'image
                $content_dir = 'images/';
                // Récuperation d'un fichier par le nom de l'image
                $tmp_file = $_FILES['fichier']['tmp_name'];

            // Gestion des erreurs de l'image
                // Si le fichier image est introuvable
                if (!is_uploaded_file($tmp_file)) {
                    exit('Le fichier est introuvable');
                }

                // On récupère le fichier par le type de l'image
                $type_file = $_FILES['fichier']['type'];

                // On verifie l'extension ou le format de l'image du fichier 
                if (!strstr($type_file, 'jpeg') && !strstr($type_file, 'png')) {
                    exit("Ce fichier n'est pas au bon format");
                }

                // On crée le nouveau nom du fichier  
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
            <!-- enctype pour dire au navigateur que le formulaire va upload des fichiers  -->
           
            <form method="POST" action="" enctype="multipart/form-data" style="border: #D3D3D3 solid 1px; padding: 3%; border-radius: 5px">
                <input type="text" name="titre" id="" placeholder="Entrer le nom de l'article" required="" class="form form-control"><br>
                <textarea name="description" id="" placeholder="Entrer la description de l'article" class="form form-control"></textarea><br>
                <input type="file" name="fichier"><br><br>
                <input type="submit" name="submit" class="btn btn-primary">
            </form>

            <?php
        // sinon si action correspond à update_delete
        }elseif ($_GET['action'] == 'update_delete') {
            // Connexion à la bdd
            require_once('includes/database.php');
            // On récupère les articles de la table
            $req_all_article = $db->prepare('SELECT * FROM  all_articles');
            // On execute la requêtte
            $req_all_article->execute(); ?>
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Update</th>
                    <th>Delete</th>
                    </tr>
                </thead>
            <?php
            // Boucle while qui va afficher le contenue de la table
            while ($reponse = $req_all_article->fetch(PDO::FETCH_OBJ)) {
            ?>

                <tr>
                    <td>
                        <?php echo $reponse->image_name ?>
                    </td>
                    <td>
                        <?php echo $reponse->titre ?>
                    </td>
                    <td>
                        <a href="?action=update&id=<?php echo $reponse->id ?>">Update</a>
                    </td>
                    <td>
                        <a href="?action=delete&id=<?php echo $reponse->id ?>">Delete</a>
                    </td>
                </tr>

            <?php
            }  ?>
            </table>
<?php
        }
        // sinon si action correspond à delete
        elseif ($_GET['action'] == 'delete') {
            // Connexion à la bdd
            require_once('includes/database.php');
            // On récupère les articles de la table
            $delete_art = $db->prepare('DELETE FROM all_articles WHERE id=?');
            // On execute la requêtte
            $delete_art->execute(array($_GET['id']));
            // Redirection vers la page admin
            header('location:admin.php?action=update_delete');

        }// sinon si action correspond à update
        elseif ($_GET['action'] == 'update') {
            // Connexion à la bdd
            require_once('includes/database.php');
            // Si on soumet le formulaire de modification
            if (isset($_POST['submit'])) {
                // Extraire le contenu de la variable $_POST
                extract($_POST);
                // Requêtte de modofication
                $update_art = $db->prepare('UPDATE all_articles set titre=? and description=? WHERE id=?');
                // On execute la requêtte
                $update_art->execute(array($titre,$description,$_GET['id']));
                // On redirige
                header('location:admin.php?action=update_delete');

            }
            // On récupère les articles de la table
            $get_art = $db->prepare('SELECT * FROM all_articles WHERE id=?');
            // On execute la requêtte
            $get_art->execute(array($_GET['id']));

            $reponses = $get_art->fetch(PDO::FETCH_OBJ);
            
            ?>
            <h3>Modifier un article</h3><br>
            <form method="POST" action="" style="border: #D3D3D3 solid 1px; padding: 3%; border-radius: 5px">
                <input type="text" name="titre" value="<?php echo $reponses->titre?>" required class="form form-control"><br>
                <textarea name="description" class="form form-control" required><?php echo $reponses->description?></textarea><br>
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