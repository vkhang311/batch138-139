<?php require_once("../models/category_db.php") ?>
<?php require_once("../controllers/product_manager.php") ?>


<div class="container">
    <div class="col-md-12">
        <h1 class="page-header">
            Edit Product
        </h1>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
    <?php foreach (get_product_by_id($_GET['id']) as $product): ?>
        <div class="col-md-8">
            <div class="form-group">
                <label for="product-title">Product Title </label>
                <input id="product-title" type="text" name="product_name" value="<?php echo $product['product_name']?>" class="form-control">
                <span class="error"><?php echo $errName;?></span>
            </div>
            <div class="form-group">
                <label for="product-des">Product Description</label>
                <textarea name="product_des" id="product-des" cols="30" rows="7" class="form-control"> <?php echo $product['product_des']?> </textarea>
                <span class="error"><?php echo $errDes;?></span>
            </div>
            <div class="form-group row">
                <div class="col-xs-3">
                    <label for="product-price">Product Price</label>
                    <input id="product-price" type="number" step="0.01" name="price" value="<?php echo $product['product_price']?>" class="form-control" size="60">
                    <span class="error"><?php echo $errPrice;?></span>
                </div>
                <div class="col-xs-3">
                    <label for="product-price-reduce">Price Reduce</label>
                    <input id="product-price-reduce" type="number" name="price_reduce" value="<?php echo $product['product_reduce']?>" class="form-control" size="60">
                </div>
            </div>
            <!-- Product Categories-->
            <div class="form-group">
                <label for="category-title">Product Category</label>
                <select name="product_cat_id" id="category-title" class="form-control">
                    <option value="<?php echo $product['product_cat'] ?>"><?php echo get_category_name($product['product_cat'])  ?></option>
                    <?php get_categories(); ?>
                </select>
                <span class="error"><?php echo $errCat;?></span>
            </div>

            <!-- Product Quantity-->
            <div class="form-group">
                <label for="product-quantity">Product Quantity</label>
                <input id="product-quantity" type="number"  name="product_quantity" value="<?php echo $product['product_quantity'] ?>" class="form-control">
                <span class="error"><?php echo $errQuantity;?></span>
            </div>

            <!-- Date post-->
            <div class="form-group">
                <label for="date-post">Date Post</label>
                <input id="datepicker" type="text" name="date_post" value="<?php echo $product['product_dateCreate'] ?>" class="form-control" size="60">                
                <span class="error"><?php echo $errdate;?></span>
            </div>

            <!-- Product Image -->
            <div class="form-group">
                <label for="product-title">Product Image</label> <br/>
                <img width='100' src="../controllers/uploads/<?php echo $product['product_image']; ?>" alt="">
                <input type="file" name="file">
                <span class="error"><?php echo $errFile;?></span>
            </div>
            <?php //var_dump($_FILES['file']); ?>
            <div class="form-group">
                <input type="submit" name="submitEdit" class="btn btn-primary btn-lg" value="Submit">
            </div>
        </div>
<?php endforeach; ?>
    </form>
</div>

