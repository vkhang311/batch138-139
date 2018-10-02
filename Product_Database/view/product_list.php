<?php require_once("../models/product_db.php") ?>
<div class="container">
    <h1 class="page-header">
    All Products
    </h1>
    <form class="form-group col-md-2" method="POST" action="index.php?product_list" >
          <input class="form-control" type="text" name="lowPrice" placeholder="Search low price...">
        </form>
    <table class="table table-hover" id="product">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Discount(%)</th>
            <th>Quantity</th>
            <th>Date Post</th>
        </tr>
        </thead>
        <tbody>
        <?php //get_product();?>
        <?php if (isset($_POST['search'])) {
                get_product_by_name($_POST['search']) ;
            } elseif (isset($_POST['lowPrice'])) {
                get_product_by_lowPrice($_POST['lowPrice']);
            } else {
                get_product();
            }
        // var_dump($_POST['search']);
        ?>
        </tbody>
    </table>
</div>


<nav class="container text-center" aria-label="Page navigation">
  <ul class="pagination">
  <?php if(!isset($_POST['search']) && !isset($_POST['lowPrice']) ) get_product_pagination() ?>
  </ul>
</nav>