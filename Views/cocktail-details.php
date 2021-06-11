<?php
include('config/db.php');
include('php/getCocktails.php');
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- Bootstrap CSS file -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>
    <!-- External CSS file -->
    <link href="../assets/css/home.css" rel="stylesheet" type="text/css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:wght@400;500;700&family=Lato:wght@400;700&family=Noto+Serif:wght@400;700&display=swap"
          rel="stylesheet">

    <meta name="theme-color" content="#fafafa">
</head>

<body>

<!-- Add your site or application content here -->
<div class="container">
    <?php include('includes/home-header.php'); ?>
    <?php if (mysqli_num_rows($result) == 0) { ?>
        <h1>No Cocktail Found</h1>
    <?php } else {
        $result = $result->fetch_assoc(); ?>
        <h1> Cocktail Details for: <strong><?php echo $result["title"] ?> </strong></h1>

        <div id="mainContainer">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-default my_panel">
                                <div class="panel-body">
                                    <img src="../uploads/<?php echo $result["photo"] ?>" alt=""
                                         class="img-responsive center-block"/>
                                </div>
                                <div class="panel-footer">
                                    <p><strong>Title: </strong> <?php echo $result["title"] ?></p>
                                    <p><strong>Type: </strong> <?php echo $result["type"] ?></p>
                                    <p><strong>Glass Type: </strong> <?php echo $result["glass_type"] ?></p>
                                    <p><strong>Instructions: </strong> <?php echo $result["instructions"] ?></p>
                                    <p><strong>Ingrediants: </strong> <?php echo $result["ingrediants"] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
</div>

</body>
</html>
