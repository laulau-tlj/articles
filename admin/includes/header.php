<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
    <style type="text/css">
        body{
            width: 100%;
            height: 100vh;
            background: #eee;
        }

        .center{
            width: 60%;
            margin-right: auto;
            margin-left: auto;
            background: white;
            min-height: 520px;
            padding: 30px 30px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="/pages/index.php">Home</a>
            <a class="nav-link" href="?action=add_article">New articles</a>
            <a class="nav-link" href="?action=update_delete">Update or delete</a>
        </div>
        </div>
    </div>
    </nav>
</body>
</html>