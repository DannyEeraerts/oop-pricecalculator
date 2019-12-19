
<?php

require 'model/import_products.php';

function getProductNames(){
   $productList = importProduct();
   $_SESSION['productList'] = $productList;

    foreach($productList as $product) {
        $productName = $product->get_productName();
        $productId = $product->get_productID();
        echo "<option value=\"$productId\" name=\"product\">"  .$productName.  "</option>";
     }
}

?>