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
        <h1>Details</h1><br><br><br>
        <div class="all_articles">
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img
                            src="../admin/images/<?php echo $_GET['image_name'] ?>"
                            alt="Trendy Pants and Shoes"
                            class="img-fluid rounded-start"
                        />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                            This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.
                            </p>
                            <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <?php
    // J'importe le footer
    include_once('../admin/includes/footer.php');
    ?>
</body>
</html>