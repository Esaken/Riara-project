if (isset($_POST['view_products'])) {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Description: " . $row["description"]. " - Price: " . $row["price"]. " - Category ID: " . $row["category_id"]. " - Brand ID: " . $row["brand_id"]. "<br>";
        }
    } else {
        echo "No products found";
    }
}