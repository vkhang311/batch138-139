
  <!-- Header -->
  <?php include("partial_view/_header.php") ?>
  <!-- Navbar -->
  <?php include("partial_view/_nav.php") ?>

  <?php
    
    if($_SERVER['REQUEST_URI'] == "/demoPHP/BTVN/Product_Database/view/" || $_SERVER['REQUEST_URI'] == "/demoPHP/BTVN/Product_Database/view/index.php") {
      include("product_list.php");
    }
    // var_dump($_SERVER);
    if(isset($_GET['add_product'])) {
      
      include("add_product.php"); 
    }

    if(isset($_GET['product_list'])) {
      
      include("product_list.php");
    }

    if(isset($_GET['edit_product'])) {
      
      include("edit_product.php");
    }
  
    ?>

  <!-- Footer -->
  <?php include("partial_view/_footer.php") ?>