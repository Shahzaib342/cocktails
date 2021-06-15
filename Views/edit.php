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
    $result = $result->fetch_assoc();
    ?>
    <div class="container">
        <table class="table table-striped">
            <th style="width:300px;">Add new Cocktail</th>
            <th>Details</th>
            <form action="../Controllers/UpdateCocktailController.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $result["id"]; ?> ">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name='title' value="<?php echo $result["title"] ?>" required></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>
                        <select class="type" name="type" style="width:90%" required>
                            <option disabled>Choose cocktail type</option>
                            <option value="Alcoholic">Alcoholic</option>
                            <option value="Non Alcoholic">Non Alcoholic</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Type of Glass</td>
                    <td>
                        <select class="glass-type" name="glass-type" style="width:90%" required>
                            <option disabled>Choose cocktail glass type</option>
                            <option value="Cocktail">Cocktail</option>
                            <option value="Letterbox">Letterbox</option>
                            <option value="Whiskey Glass">Whiskey Glass</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Instruction</td>
                    <td><input type="text" name='instructions' value="<?php echo $result["instructions"] ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Ingrediants</td>
                    <td><input type="text" name='Ingrediants' value="<?php echo $result["ingrediants"] ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Select Photo to upload:</td>
                    <td>
                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                        <p><a href="../uploads/<?php echo $result['photo'] ?>">Previous Photo</a></p>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button class="btn btn-primary float-right" type="submit"
                                onclick="return confirm('Update Entry?')">Update
                        </button>
                    </td>
                </tr>
            </form>
        </table>
    </div>
</div>
</body>
</html>
