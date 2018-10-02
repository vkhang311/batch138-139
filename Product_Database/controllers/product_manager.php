<?php require_once("../models/database.php") ?>

<?php
    global $db;
    $errName = $errDes = $errPrice = $errCat = $errdate
    = $errQuantity = $errFile = "";
    $checkSubmit = true;
    // var_dump($_POST['submit']);
    if (isset($_GET['add_product']) && isset($_POST['submit'])) {
        $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : "";
        $product_des = isset($_POST['product_des']) ? $_POST['product_des'] : "";
        $price = isset($_POST['price']) ? $_POST['price'] : "";
        $price_reduce = isset($_POST['price_reduce']) ? $_POST['price_reduce'] : 0;
        $product_cat_id = isset($_POST['product_cat_id']) ? $_POST['product_cat_id'] : "";
        $product_quantity = isset($_POST['product_quantity']) ? $_POST['product_quantity'] : "";
        $date_post = isset($_POST['date_post']) ? $_POST['date_post'] : "";
        $fileUpload = isset($_FILES['file']) ? $_FILES['file'] : "";
        $fileName = isset($fileUpload['name']) ? uniqid().'_'.$fileUpload['name'] : "";
        if ($product_name == '') {
            $checkSubmit = false;
            $errName = "Please input name of product!";
        }
        if ($product_des == '') {
            $checkSubmit = false;
            $errDes = "Please input description of product!";
        }
        if ($price == '') {
            $checkSubmit = false;
            $errPrice = "Please input price of product!";
        }
        if ($product_cat_id == '') {
            $checkSubmit = false;
            $errCat = "Please input categories of product!";
        }
        if ($product_quantity == '') {
            $checkSubmit = false;
            $errQuantity = "Please input quantity of product!";
        }
        if ($date_post == '') {
            $checkSubmit = false;
            $errdate = "Please input date post of product!";
        }
        if ($fileUpload == '') {
            $checkSubmit = false;
            $errFile = "Please input file picture of product!";
        }
		//$date_post = date('Y-m-d h:i:s')
        if ($checkSubmit) { //must be check insert right first later upload file
            // upload file
            $targetUpload = "../controllers/uploads/".$fileName;
            // var_dump($fileUpload);
            move_uploaded_file($fileUpload['tmp_name'], $targetUpload);
            $datePost = date('Y-m-d', strtotime($_POST['date_post']));
            // echo $_POST['date_post'];
            // echo "<br/>";
            // echo $datePost;
            $query="INSERT INTO products 
            (product_name, product_cat, product_des, product_price, product_reduce, product_quantity, product_dateCreate, product_image) VALUES 
            ('$product_name', '$product_cat_id', '$product_des', '$price', '$price_reduce', '$product_quantity','$datePost', '$fileName')";
            $db -> exec($query);
            header("Location: ../view/index.php");
        }
    }

    // var_dump($_POST['submitEdit']);
    // var_dump($_GET['id']);
    // var_dump($checkSubmit);
    if (isset($_POST['submitEdit'])) {
        $product_id = isset($_GET['id']) ? $_GET['id'] : "";
        $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : "";
        $product_des = isset($_POST['product_des']) ? $_POST['product_des'] : "";
        $price = isset($_POST['price']) ? $_POST['price'] : "";
        $price_reduce = isset($_POST['price_reduce']) ? $_POST['price_reduce'] : 0;
        $product_cat_id = isset($_POST['product_cat_id']) ? $_POST['product_cat_id'] : "";
        $product_quantity = isset($_POST['product_quantity']) ? $_POST['product_quantity'] : "";
        $date_post = isset($_POST['date_post']) ? $_POST['date_post'] : "";
        $fileUpload = isset($_FILES['file']) ? $_FILES['file'] : "";
        $fileName = isset($fileUpload['name']) ? uniqid().'_'.$fileUpload['name'] : "";
        if ($product_name == '') {
            $checkSubmit = false;
            $errName = "Please input name of product!";
        }
        if ($product_des == '') {
            $checkSubmit = false;
            $errDes = "Please input description of product!";
        }
        if ($price == '') {
            $checkSubmit = false;
            $errPrice = "Please input price of product!";
        }
        if ($product_cat_id == '') {
            $checkSubmit = false;
            $errCat = "Please input categories of product!";
        }
        if ($product_quantity == '') {
            $checkSubmit = false;
            $errQuantity = "Please input quantity of product!";
        }
        if ($date_post == '') {
            $checkSubmit = false;
            $errdate = "Please input date post of product!";
        }
        if ($fileUpload == '') {
            $checkSubmit = false;
            $errFile = "Please input file picture of product!";
        }
        if ($checkSubmit) {
            // upload file
            $targetUpload = "../controllers/uploads/".$fileName;
            // var_dump['$fileUpload'];
            move_uploaded_file($fileUpload['tmp_name'], $targetUpload);
            $datePost = date('Y-m-d', strtotime($_POST['date_post']));

            if ($_FILES['file']['name'] == "") {
                $query="UPDATE products SET product_name = '$product_name', product_cat = '$product_cat_id', 
                    product_des = '$product_des', 
                    product_price = '$price', 
                    product_reduce = '$price_reduce', 
                    product_quantity = '$product_quantity',
                    product_dateCreate = '$datePost'
                    WHERE id = '$product_id'";
            } else {
                $fileImg = "../controllers/uploads/".get_file_name($product_id);
                unlink($fileImg);

                $query="UPDATE products SET
                    product_name = '$product_name', 
                    product_cat = '$product_cat_id', 
                    product_des = '$product_des', 
                    product_price = '$price', 
                    product_reduce = '$price_reduce', 
                    product_quantity = '$product_quantity',
                    product_dateCreate = '$datePost', 
                    product_image = '$fileName'
                    WHERE id = '$product_id'";
            }
            
            $db -> exec($query);
            header("Location: ../view/index.php");
        }
    }

    if (isset($_GET['delete_product'])) {
        $fileImg = "uploads/".get_file_name($_GET['delete_product']);

        if (!unlink($fileImg)) {
            echo("Error deleting $fileImg");
        } else {
            echo("Deleted $fileImg");
        }
        insertToDeleteTable($_GET['delete_product']);
        $queryDelete = "DELETE FROM products WHERE id = " . $_GET['delete_product'] . " ";
        $db -> exec($queryDelete);
    }

    function insertToDeleteTable($id)
    {
        global $conn;
        $query = "SELECT * FROM products WHERE id = {$id}";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)) {
            $productId = $row['id'];
            $productName = $row['product_name'];
            $productCatId = $row['product_cat'];
            $productDes = $row['product_des'];
            $price = $row['price'];
            $priceReduce = $row['product_reduce'];
            $productQuantity = $row['product_quantity'];
            $datePost = $row['product_dateCreate'];
            $productImage = $row['product_image'];
            $query2 = "INSERT INTO productsDelete 
            (id, product_name, product_cat, product_des, product_price, product_reduce, product_quantity, product_dateCreate, product_image) VALUES 
            ('$productId','$productName', '$productCatId', '$productDes', '$price', '$priceReduce', '$productQuantity','$datePost', '$productImage')";
            mysqli_query($conn, $query2);
        }
    }

    function get_file_name($id)
    {
        global $db;
        $query = "SELECT product_image FROM products WHERE id = {$id}";
        $result = $db -> query($query);
        $result = $result -> fetch();
        $nameImg = $result['product_image'];
        return $nameImg;
    }

    function get_product_by_id($id)
    {
        global $db;
        $query = "SELECT * FROM products WHERE id = {$id}";
        $result = $db -> query($query);
        return $result;
    }

?>