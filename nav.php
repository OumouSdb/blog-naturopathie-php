<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    </head>

    <body>
        <header>
            <nav>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="remede.php">Article</a></li>
                <li><a href="detox.php">Cure detox</a></li>
                <li><a href="imc.php">Calculer mon IMC</a></li>
                <li><a href="contact.php">Contact</a></li>
                <form action="search.php" method="GET" class="question">
                    <input type="search" placeholder="aliment, plante..." name="question">
                    <button class="btn btn-warning" href="search.php?=<?php echo $searchValue ?>">Rechercher</button>
                </form>
            </nav>

        </header>
        <?php
        if (isset($_GET['question'])) {
            $searchValue = $_GET['question'];
        }
        ?>