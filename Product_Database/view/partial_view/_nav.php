<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
          aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php?product_list">Project Demo Product List</a>
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="index.php?add_product">Add Product</a>
          </li>
        </ul>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        
        <form class="navbar-form navbar-right" method="POST" action="index.php?product_list" >
          <input type="text" class="form-control" name="search" placeholder="Search...">
        </form>
      </div>
    </div>
</nav>