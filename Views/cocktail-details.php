<?php
include ('config/db.php');
include('php/getCocktails.php');
include('php/comments.php');
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
        <h4> Cocktail Details for: <strong><?php echo $result["title"] ?> </strong> <a style="float: right"  href="/home"> Go Back</a></h4>

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
            <div class="row d-flex justify-content-center" style="margin-top: 20px;">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title">Latest Comments</h4>
                        </div>
                        <div class="comment-widgets" style="padding: 20px">
                            <!-- Comment Row -->
                            <?php while ($comment = $comments->fetch_assoc()) { ?>
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2"><img src="../assets/images/avatar.jpeg" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text active w-100">
                                    <h6 class="font-medium">Anonymous User</h6> <span class="m-b-15 d-block"><?php  echo $comment["comment"]; ?> </span>
                                </div>
                            </div> <!-- Comment Row -->
                        <?php   } ?>
                        </div> <!-- Card -->
                    </div>
                </div>
            </div>
            <form method="post" action="../php/comments.php">
                <input type="hidden" name="cocktail-id" value="<?php echo  $result["id"]?>">
                <div class="form-group">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    <?php } ?>
</div>

</body>
</html>
