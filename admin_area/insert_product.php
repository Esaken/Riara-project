<?php
include '../connect.php';

if (isset($_POST['add_product'])) {
    // Get form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $image_path = dirname(__FILE__).'/images/'.$_FILES['image']['name'];

    // Upload image
    if (isset($_FILES['image']['tmp_name'])) {
        $image_path = "images/".$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    }
    // Insert product into database
    $sql = "INSERT INTO products (name, description, price, category_id, brand_id, image_path) VALUES ('$name', '$description', '$price', '$category_id', '$brand_id', '$image_path')";
    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<form method="post" action="insert_product.php" enctype="multipart/form-data">
<label for="name">Name:</label>
<input type="text" id="name" name="name" required><br>

<label for="description">Description:</label>

  <textarea id="description" name="description" required></textarea><br>
<label for="price">Price:</label>
<input type="number" id="price" name="price" step="0.01" required><br>

<label for="category_id">Category:</label>
<select id="category_id" name="category_id" required>
<?php
 $sql = "SELECT * FROM categories";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
         echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
     }
 }
 ?>
</select><br>

<label for="brand_id">Brand:</label>
<select id="brand_id" name="brand_id" required>
<?php
 $sql = "SELECT * FROM brands";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
         echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
     }
 }
 ?>
</select><br>

<label for="image">Image:</label>
<input type="file" id="image" name="image" required>
<input type="submit" name="add_product" value="Add Product">

</form>
