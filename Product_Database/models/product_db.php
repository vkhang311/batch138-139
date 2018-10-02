<?php require_once("database.php") ?>
<?php require_once("category_db.php") ?>

<?php
    function get_product()
    {
        global $db, $conn;

        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);

        $productPerPage = 6;
        $lastPage = ceil($rows / $productPerPage);
        
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $limit = 'LIMIT ' . ($page-1) * $productPerPage . ',' . $productPerPage;
        // $result = $db -> query($query);
        $query2 = "SELECT * FROM products $limit";
        $result2 = mysqli_query($conn, $query2);
        // $resultMysqli = mysqli_query($conn, $query);
        // while ($row = $result -> fetch()) {
        while ($row = mysqli_fetch_array($result2)) {
            //echo $row['product_name'];
            $category = get_category_name($row['product_cat']);
            $d = strtotime($row['product_dateCreate']);
            $date = date("d-m-Y", $d);
            $product = <<<EOT
            <tr>
                <td>{$row['id']}</td>
                <td>
                    
                    <a href="index.php?edit_product&id={$row['id']}">
                        {$row['product_name']}<br>
                        <img width='100' src="../controllers/uploads/{$row['product_image']}" alt="">
                    </a>
                </td>
                <td>{$category}</td>
                <td>{$row['product_price']}</td>
                <td>{$row['product_reduce']}</td>
                <td>{$row['product_quantity']}</td>
                <td>{$date}</td>
                <td>
                    <button class="btn btn-danger js-delete" data-product-id="{$row['id']}" ><span class="glyphicon glyphicon-remove"></span></button></td>
            </tr>
EOT;
            echo $product;
        }
        /*

        <a class="btn btn-danger js-delete" href="../controllers/product_manager.php?delete_product={$row['product_id']}" onclick="return confirm('Are you sure?');"><span class="glyphicon glyphicon-remove"></span></a></td>



        echo "<br/>";
        $result1 = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result1)) {
            echo $row['product_name'];
        }
        */
    }

    function get_product_by_name($name)
    {
        global $db,$conn;
        $query = "SELECT * FROM products WHERE product_name LIKE '%".$name."%'";
        
        //test with limit
        // $query = "SELECT * FROM products WHERE product_name LIKE '%".$name."%'" . " LIMIT 12,6";
        // $result = mysqli_query($conn, $query);
        // $rows = mysqli_num_rows($result);

        // $productPerPage = 6;
        // $lastPage = ceil($rows / $productPerPage);
        
        // if (isset($_GET['page'])) {
        //     $page = $_GET['page'];
        // } else {
        //     $page = 1;
        // }
        // $limit = 'LIMIT ' . ($page-1) * $productPerPage . ',' . $productPerPage;
        // $query2 = "SELECT * FROM products WHERE product_name LIKE '%" .$name. "%'" . "$limit";   //test with limit
        // $result2 = mysqli_query($conn, $query2);
        $result = $db -> query($query);
        while ($row = $result -> fetch()) {
            // while ($row = mysqli_fetch_array($result2)) {    //test with limit
            //echo $row['product_name'];
            $category = get_category_name($row['id']);
            $d = strtotime($row['date_post']);
            $date = date("d-m-Y", $d);
            $product = <<<EOT
            <tr>
                <td>{$row['id']}</td>
                <td>
                    
                    <a href="index.php?edit_product&id={$row['product_id']}">
                        {$row['product_name']}<br>
                        <img width='100' src="../controllers/uploads/{$row['product_image']}" alt="">
                    </a>
                </td>
                <td>{$category}</td>
                <td>{$row['price']}</td>
                <td>{$row['price_reduce']}</td>
                <td>{$row['product_quantity']}</td>
                <td>{$date}</td>
                <td>
                    <button class="btn btn-danger js-delete" data-product-id="{$row['product_id']}" ><span class="glyphicon glyphicon-remove"></span></button></td>
            </tr>
EOT;
            echo $product;
        }
    }

    function get_product_by_lowPrice($price)
    {
        global $db;
        $query = "SELECT * FROM products WHERE price <= $price";
        $result = $db -> query($query);
        while ($row = $result -> fetch()) {
            //echo $row['product_name'];
            $category = get_category_name($row['product_cat_id']);
            $d = strtotime($row['date_post']);
            $date = date("d-m-Y", $d);
            $product = <<<EOT
            <tr>
                <td>{$row['product_id']}</td>
                <td>
                    
                    <a href="index.php?edit_product&id={$row['product_id']}">
                        {$row['product_name']}<br>
                        <img width='100' src="../controllers/uploads/{$row['product_image']}" alt="">
                    </a>
                </td>
                <td>{$category}</td>
                <td>{$row['price']}</td>
                <td>{$row['price_reduce']}</td>
                <td>{$row['product_quantity']}</td>
                <td>{$date}</td>
                <td>
                    <button class="btn btn-danger js-delete" data-product-id="{$row['product_id']}" >
                        <span class="glyphicon glyphicon-remove"></span>
                    </button>
                </td>
            </tr>
EOT;
            echo $product;
        }
    }

    function get_product_pagination()
    {
        global $conn;
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);

        if (isset($_GET['page'])) {
            
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $productPerPage = 6;
        $lastPage = ceil($rows / $productPerPage);

        if ($page < 1) {
            $page = 1;
        } elseif ($page > $lastPage) {
            $page = $lastPage;
        }
        
        $middleNumbers = '';
        $sub1 = $page - 1;
        $sub2 = $page - 2;
        $add1 = $page + 1;
        $add2 = $page + 2;
        if ($page == 1) {
            // $middleNumbers .= '<li class="page-item" href="'.$_SERVER['PHP_SELF'].'?page='.$page.'"><a>' .'<span aria-hidden="true">&laquo;</span>'. '</a></li>';
            $middleNumbers .= '<li class="page-item active" href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$page.'"><a>' .$page. '</a></li>';
            $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$add1.'">' .$add1. '</a></li>';
            $middleNumbers .= '<li class="page-item"><a href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$add1.'">' .'<span aria-hidden="true">&raquo;</span>'. '</a></li>';
        } elseif ($page == $lastPage) {
            $middleNumbers .= '<li class="page-item"><a href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$sub1.'">' .'<span aria-hidden="true">&laquo;</span>'. '</a></li>';
            $middleNumbers .= '<li class="page-item"><a href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$sub1.'">' .$sub1. '</a></li>';
            $middleNumbers .= '<li class="page-item active"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$page.'">' .$page. '</a></li>';
        } elseif ($page > 2 && $page < ($lastPage-1)) {
            $middleNumbers .= '<li class="page-item"><a href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$sub1.'">' .'<span aria-hidden="true">&laquo;</span>'. '</a></li>';
            $middleNumbers .= '<li class="page-item"><a href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$sub2.'">' .$sub2. '</a></li>';
            $middleNumbers .= '<li class="page-item"><a href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$sub1.'">' .$sub1. '</a></li>';
            $middleNumbers .= '<li class="page-item active"><a href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$page.'">' .$page. '</a></li>';
            $middleNumbers .= '<li class="page-item"><a href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$add1.'">' .$add1. '</a></li>';
            $middleNumbers .= '<li class="page-item"><a href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$add2.'">' .$add2. '</a></li>';
            $middleNumbers .= '<li class="page-item"><a href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$add1.'">' .'<span aria-hidden="true">&raquo;</span>'. '</a></li>';
        } elseif ($page >1 && $page < $lastPage) {
            $middleNumbers .= '<li class="page-item"><a href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$sub1.'">' .'<span aria-hidden="true">&laquo;</span>'. '</a></li>';
            $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$sub1.'">' .$sub1. '</a></li>';
            $middleNumbers .= '<li class="page-item active"><a href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$page.'">' .$page. '</a></li>';
            $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$add1.'">' .$add1. '</a></li>';
            $middleNumbers .= '<li class="page-item"><a href="'.$_SERVER['PHP_SELF'].'?product_list&page='.$add1.'">' .'<span aria-hidden="true">&raquo;</span>'. '</a></li>';
        }
        

        // echo $page . "<br/>";
        // echo $lastPage;
        echo $middleNumbers;
    }

    

?>