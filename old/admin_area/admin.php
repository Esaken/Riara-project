
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       <!-- Font-awesome link -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./admin-style.css">
    <title>Admin dashboard</title>
  </head>
  <body>
    
<!-- navbar -->
<div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../images/shoe2.jpg" alt="" class="logo">
            
                <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Welcome guest</a>
                    </li>
                </ul>
                </nav>
        </div>
    </nav>

    <!-- second child -->
    <div class="bg-light">
        <h3 class="text-center">Manage Details</h3>
    </div>


    <!-- third child -->
    <div class="row">
        <div class="col-md-5 bg-secondary p-1 d-flex ">
           
            <div class="p-3">
                    <a href="#"><img src="../images/shoe5.webp" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
            </div>
            <div class="button text-center">
    </div>



    </div>
        </div>
    </div>

    <!-- set the columns for the admin page hapa -->
    <div class="column-container">
    <div class="column">
<!--using AJAX to load a different page within the current page-->


    
<!-- insert_products.php -->
<script>
    function loadPage() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("main-content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "insert_product.php", true);
        xhttp.send();
    }
</script>
<button onclick="loadPage()" class="nav-link text-light bg-info my-1">insert_product.php</button>
<div id="main-content"></div> 

    </div>

    <div class="column">

<!-- insert_category -->
<button><a href="" class="nav-link text-light bg-info my-1">View Products</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>

    </div>



    <div class="column">
<!-- insert_brand -->
                <button><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button>
                <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>


    </div>



   
    <div class="column">

<!-- view_brands -->
<button><a href="" class="nav-link text-light bg-info my-1">View Brands</a></button>

    </div>



    <div class="column">
<!-- View all brands -->
<button><a href="" class="nav-link text-light bg-info my-1">All Orders</a></button>


    </div>



    <div class="column">
<!-- View all payments -->
<button><a href="" class="nav-link text-light bg-info my-1">All Payments</a></button>


    </div>



    <div class="column">
<!-- View all users -->
<button><a href="" class="nav-link text-light bg-info my-1">List Users</a></button>
</div>


    <div class="column">

    <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
    </div>
   
</div>
</div> 
           

   

    <!-- fourth child -->
<?php
include '../connect.php';
?>



   

  


   <!-- last child -->
   <div class="bg-info p-3 text-center">
    <p>All rights reserved  &copy;- Designed by Kennedy Esau- 2022</p>
   </div>
   
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


   
  </body>
</html>