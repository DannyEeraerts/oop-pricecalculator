<?php
/**
 * Created by Danny Eeraerts
 * Date: 2019-12-12
 * Time: 09:31
 */

//session_start();

require_once 'controller/Overview_Organisations_Departments.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Discount Calculator</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content= "">
    <meta name ="keywords" content = "Meta Tags, Metadata" />
    <meta name ="author" content = "Danny Eeraerts" />

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/slate/bootstrap.min.css"  rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container">

    <header>
        <div class="row d-flex  align-items-center mt-3 ">
            <div class="col_12 mx-auto">
                <h1 class="p-3 float-left">Discount Calculator</h1>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary d-flex">
            <a class="navbar-brand" href="#">DC</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarColor01">
                <ul class="navbar-nav d-flex">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link mr-auto" href="category_view.php">Organisation & Departments Overview<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a class="nav-link ml-auto" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container border border-success m-1 mt-5 p-3">
            <?php overview(); ?>
        </div>
    </main>

    <footer class="container bg-primary mx-auto row d-flex align-items-center  py-3 mt-2 px-3 ">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left px-0">
            <p class="mb-0">&copy;&nbsp;<?= date("Y")." "; ?><span class="text-danger">ED</span>web&photo Studio</p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right px-0">
            <a href="#" class ="mr-4">disclaimer</a>
            <a href="#" class ="mr-4">privacy policy</a>
            <a href="#" class ="mr-2">cookie policy</a>
        </div>
    </footer>

</div>

</body>

</html>



