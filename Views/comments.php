<?php
include('config/session.php');
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
    <!-- External JS Fils -->
    <script src="../assets/js/login.js"></script>
    <!-- External CSS file -->
    <link href="../assets/css/app.css" rel="stylesheet" type="text/css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:wght@400;500;700&family=Lato:wght@400;700&family=Noto+Serif:wght@400;700&display=swap"
          rel="stylesheet">

    <meta name="theme-color" content="#fafafa">
</head>

<body>
<?php
include('includes/header.php');
include('includes/sidebar.php')
?>

<!-- Add your site or application content here -->
<div class="container">
    <?php
    if (!isset($_SESSION) || $_SESSION["session_id"] == "") {
        echo "You are not allowed to access the admin features";
        die();
    }
    ?>

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
                            <div class="p-2"><img src="../assets/images/avatar.jpeg" alt="user" width="50"
                                                  class="rounded-circle"></div>
                            <div class="comment-text active w-100">
                                <h6 class="font-medium">Anonymous User</h6> <span
                                    class="m-b-15 d-block"><?php echo $comment["comment"]; ?> </span>
                                <div class="comment-footer"><span
                                        class="text-muted float-right"><?php echo $comment["date"]; ?></span>
                                    <a type="button" class="btn btn-danger"
                                       href="../php/getCocktails.php?delete=<?php echo $comment["id"]; ?>">Delete
                                        Comment</a>
                                    <a class="btn btn-danger"
                                       href="/home/cocktailDetails?id=<?php echo $comment["cocktail_id"]; ?>">View
                                        cocktail</a></div>
                            </div>
                        </div> <!-- Comment Row -->
                    <?php } ?>
                </div> <!-- Card -->
            </div>
        </div>
    </div>

</div>

</body>
</html>
