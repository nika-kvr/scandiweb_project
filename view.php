<?php
require_once("productsConfig.php");
$data = new productsConfig();
$all = $data->fetchAll();

?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
<body style="min-height: 100vh; display: flex; flex-direction: column;">

  <div class="container my-5">

  <form action="delete.php" method="POST">

    <div style="display: flex; justify-content: space-between;">
    <div>
    <h2>Product List</h2>

    </div>
    
    <div>
      
    <button style="margin-right: 10px" onclick="location.href = 'add-product';" type="button" class="btn btn-primary">ADD</button>
    <button  name="products_delete_btn" id="delete-product-btn" type="submit" class="btn btn-danger">MASS DELETE</button>
    </div>
    
    </div>
    <hr>


  <div style="display: flex; flex-wrap: wrap; justify-content: space-evenly;">

    <?php
    foreach($all as $key => $val){
    ?>

    <div class="card" style="display: flex;align-items: flex-start; width: 250px; height: 170px; margin: 20px; border-width: bold;flex-direction: row;">
    
      <input style = "margin: 20px" class="delete-checkbox" type="checkbox"
      name="prod_delete_id[]" value="<?= $val['id']; ?>" >
        
      <div class="card-body" >

      <h6 class="card-title">        
        <?php 
        echo $val ['SKU'];
        ?> 
      </h6>

      <h6 class="card-title">        
        <?php 
        echo $val ['name'];
        ?> 
      </h6>

      <h6 class="card-title">        
        <?php 
        echo $val ['price'];
        ?> 
      </h6>

      <h6 class="card-title">        
        <?php 
        echo $val ['type_value'];
        ?> 
      </h6>

      </div>
    </div>

    <?php
    }
    ?>

  </div>
  
</form>
  </div>


    <div class="container"> 
        <hr>
        <footer>
    
            <div class="text-center p-5">
                Scandiweb Test assignment
            </div>
        </footer>

    </div>
</body>
</html>