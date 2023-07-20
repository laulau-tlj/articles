<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Articles</title>
    <style type="text/css">
        .center{
            width: 70%;
            margin-right: auto;
            margin-left: auto;
        }

        .all_articles {
            display: flex;
            flex-wrap: wrap;
            align-content: space-between;
        }

        .card {
            margin-right: 30px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="center">
        <h1>Nos articles</h1><br><br><br>
        <div class="all_articles">

        <?php 
        include_once('../admin/includes/database.php');
        $req= $db->prepare('SELECT * FROM  all_articles');
        $req->execute();
        while ($response = $req->fetch(PDO::FETCH_OBJ)) { ?>
            <div class="card">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img src="../admin/images/<?php echo $response->image_name ?>" class="img-fluid"/>
                    <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $response->titre  ?></h5>
                    <p class="card-text"><?php echo substr($response->description, 0,30)  ?></p>
                    <?php
                    // Je récupère les données dans l'URL
                    ?>
                    <a href="plus.php?titre=<?php echo $response->titre ?>, & description=<?php echo $response->description ?>, & image_name=<?php echo $response->image_name ?>" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
        <?php }
        ?>
            
        </div>
    </div>
    <?php
    // J'importe le footer
    include_once('../admin/includes/footer.php');
    ?>
</body>
</html>