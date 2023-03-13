<?php
require_once("productsConfig.php") ;

if(isset($_POST['save'])){
    $sc = new productsConfig();


    $sc->setSKU($_POST['sku']);
    $sc->setName($_POST['name']);
    $sc->setPrice($_POST['price']);
    $sc->setProductType($_POST['product_type']);
    $sc->setTypeValue($_POST['size']);
    $sc->insertData(); 
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <title>products</title>
</head>

<body style="min-height: 100vh; display: flex; flex-direction: column;">

    <div class="container my-5">

        <form action = "productAdd.php" id="product_form" method="post">
            <div style="display: flex; justify-content: space-between;">
            <div>
                <h2>Product Add</h2>

            </div>
            <div>
                <button  id="submitbtn" type="submit" class="btn btn-primary" name="save" style="margin-right: 10px">Save</button>
                <button onclick="location.href = '../scandiweb_proj';" type="button" class="btn btn-secondary">Cancel</button>
                </div>
            </div>

            <hr>
            <div class="form-group" style = "margin-top: 20px">
                <label>SKU</label>
                <input id="sku" type="text" class="form-control" name="sku" required>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input id="name" type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label>Price ($)</label>
                <input id="price" type="number" class="form-control"  name="price" required>
            </div>
  
            <label style = "margin-top: 20px; margin-bottom: 20px">Type Switcher</label>
            <select id="productType" name="product_type" required class="form-select" aria-label="Default select example">
                <option hidden disabled selected>Type Switcher</option>
                <option value="DVD">DVD</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture </option>
            </select>
            
            <div id="dvd-div" style="display: none;">
                <label> Size (MB) </label>
                <input id="size" type="number" class="form-control"  name="size">
            </div>

            <div id="books-div" style="display: none;">
                <label> Height (CM) </label>
                <input id="height" type="number" class="form-control"  name="height">
                <label> width (CM) </label>
                <input id="width" type="number" class="form-control"  name="width">
                <label> Lenght (CM) </label>
                <input id="lenght" type="number" class="form-control"  name="lenght">
            </div>

            <div id="furniture-div" style="display: none;">
                <label> Weight (KG) </label>
                <input id="weight" type="number" class="form-control"  name="weight">
            </div>

    
        </form>

    </div>
    <div class="container"> 
        <hr>
        <footer style=" margin-top: auto">
    
            <div class="text-center p-5" >
                Scandiweb Test assignment
            </div>
        </footer>

    </div>

    <script>

        $('select').on('change', function() {
            document.getElementById("dvd-div").style.display = "block";
            document.getElementById("books-div").style.display = "block";
            document.getElementById("furniture-div").style.display = "block";


            var e = document.getElementById("productType");
            var text = e.options[e.selectedIndex].text;

            switch (text){
                case "DVD":
                    document.getElementById("dvd-div").style.display = "block";
                    document.getElementById("books-div").style.display = "none";
                    document.getElementById("furniture-div").style.display = "none";
                    break;

                case "Book":
                    document.getElementById("dvd-div").style.display = "none";
                    document.getElementById("books-div").style.display = "block";
                    document.getElementById("furniture-div").style.display = "none";
                    break;

                case "Furniture":
                    document.getElementById("dvd-div").style.display = "none";
                    document.getElementById("books-div").style.display = "none";
                    document.getElementById("furniture-div").style.display = "block";
                    break;
            }
        });
    </script>
</body>

</html>

