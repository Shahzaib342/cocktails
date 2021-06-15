<?php
include('config/session.php');
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
    <h1> All Available Cocktails</h1>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Type</th>
            <th scope="col">Glass Type</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($cocktail = $result->fetch_assoc()) { ?>
            <tr>
                <th scope="row"><?php echo $cocktail["id"] ?> </th>
                <td><?php echo $cocktail["title"] ?> </td>
                <td><?php echo $cocktail["type"] ?> </td>
                <td><?php echo $cocktail["glass_type"] ?> </td>
                <td><a href="/admin/edit?id=<?php echo $cocktail["id"] ?>"> Edit </a> <a
                            href="/admin?delete-cocktail=<?php echo $cocktail["id"] ?>"> Delete </a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
