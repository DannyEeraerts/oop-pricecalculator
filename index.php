<?php
/**
 * Created by Danny Eeraerts
 * Date: 2019-12-12
 * Time: 09:31
 */

//session_start();

require_once 'controller/ProductNames.php';
require_once 'controller/CustomersNames.php';
require_once 'controller/ProductView.php';


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
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link mr-auto" href="#">Organisation & Departments Overview</a>
                        </li>
                        <li class="nav-item ml-auto">
                            <a class="nav-link ml-auto" href="#">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <form method="post" action="">

            <div class = "row">

                <div class = "col-5">
                    <select name ="customer" class="custom-select custom-select-lg mb-3 mt-5">
                        <option selected>Choose customer</option>
                        <?php
                         echo getCustomerNames()
                        ?>
                    </select>
                </div>

                <div class = "col-5">
                    <select name = "product" class="custom-select custom-select-lg mb-3 mt-5">
                        <option selected>Choose product</option>
                          <?php
                          echo getProductNames();
                          ?>
                    </select>
                </div>
                <div class="col-2">
                    <input name="number" class="form-control text-right mb-3 mt-5 p-n2" type="number" value="1" min="1" id="number-input">
                </div>

            </div>

            <?php
            ?>

            <div class = "row">
                <div class = "col-6 bg.info">
                    <input type="submit" value="Calculate Discount" class ="btn btn-success bg p-2 btn-lg">
                </div>
            </div>

        </form>




        <div class="row border border-success m-1 mt-5 p-3">
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {?>
                <div class = col-6>
                    <h3 class="text-success">customer</h3>
                    <?php customerDetails($_POST['customer']); ?>
                </div>
                <div class = col-6>
                    <h3 class="text-success">product</h3>
                    <?php productDetails($_POST['product'],($_POST['number'])); ?>
                </div>
            <?php }?>
        </div>

        <footer class="container fixed-lg-bottom mx-auto row d-flex align-items-center  py-3 mt-2 px-0 ">

            <!-- Grid column -->
            <div class="col-md-6 col-lg-5 text-center text-md-left px-0">
                <p class="mb-0">&copy;&nbsp;<?php echo date("Y")." "; ?><span class="text-danger">ED</span>web&photo Studio</p>
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


