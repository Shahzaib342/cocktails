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
<?php include('includes/home-header.php'); ?>
<!-- Add your site or application content here -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <form class="card card-sm" method="get">
                <div class="card-body row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-search h4 text-body"></i>
                    </div>
                    <!--end of col-->
                    <div class="col">
                        <input class="form-control form-control-lg form-control-borderless" type="search"
                               placeholder="Search topics or keywords" name="search">
                    </div>
                    <!--end of col-->
                    <div class="col-auto">
                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                    </div>
                    <!--end of col-->
                </div>
            </form>
        </div>
        <!--end of col-->
    </div>
    <div class="row cocktail-row">
        <?php
        while ($cocktail = $result->fetch_assoc()) {
            ?>
            <div class="card col col-lg-3 col-sm-12 col-md-12">
                <img class="card-img-top" src="../uploads/<?php echo $cocktail["photo"] ?>" alt="Image does not exist">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $cocktail["title"] ?></h5>
                    <p class="card-text"><strong>Cocktail Type:</strong> <?php echo $cocktail["type"] ?></p>
                    <a href="/home/cocktailDetails?id=<?php echo $cocktail["id"] ?>" class="btn btn-primary">More
                        Details</a>
                </div>
            </div>
            <?php
        }
        if (mysqli_num_rows($result) == 0) { ?>

            <h1>No Cocktails Found</h1>

        <?php } ?>
    </div>
</div>


<script src="../assets/js/home.js"></script>

</body>
</html>
