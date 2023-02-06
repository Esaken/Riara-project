<?php
include '../connect.php';

// Set the number of items per page
$items_per_page = 20;

// Get the current page number
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Set the number of items to skip based on the current page
$offset = ($current_page - 1) * $items_per_page;

// Filter options
$filter_price = isset($_GET['price']) ? (int)$_GET['price'] : '';
$filter_category = isset($_GET['category']) ? (int)$_GET['category'] : '';
$filter_brand = isset($_GET['brand']) ? (int)$_GET['brand'] : '';

// Build the base query
$query = "SELECT products.*, categories.name as category_name, brands.name as brand_name FROM products
          JOIN categories ON products.category_id = categories.id
          JOIN brands ON products.brand_id = brands.id";

// Add the filter options to the query
if ($filter_price) {
    $query .= " WHERE price <= $filter_price";
}
if ($filter_category) {
    $query .= ($filter_price ? " AND " : " WHERE ") . "category_id = $filter_category";
}
if ($filter_brand) {
    $query .= ($filter_price || $filter_category ? " AND " : " WHERE ") . "brand_id = $filter_brand";
}

// Add the limit and offset to the query
$query .= " ORDER BY id DESC" . " LIMIT $items_per_page OFFSET $offset";

// Execute the query
$result = $conn->query($query);

// Get the total number of items
$query_count = "SELECT COUNT(*) as total FROM products";
$result_count = $conn->query($query_count);
$row_count = $result_count->fetch_assoc();
$total_items = $row_count['total'];

// Get the total number of pages
$total_pages = ceil($total_items / $items_per_page);

// Get the list of categories and brands for the filter
$query_categories = "SELECT * FROM categories";
$result_categories = $conn->query($query_categories);
$query_brands = "SELECT * FROM brands";
$result_brands = $conn->query($query_brands);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products Page</title>
    <style>
        /* Add some styling to the filter form */
        form {
            margin-bottom: 20px;
        }
        label {
            margin-right: 10px;
        }
        select {
            padding: 5px;
            margin-right: 10px;
        }
        /* Add some styling to the product list */
        .product {
            border: 1px solid gray;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 2px 2px 5px gray;
        }
        /* Add some styling to the pagination */
        .pagination {
            text-align: center;
        }
        .pagination a {
            text-decoration: none;
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <form action="products.php" method="get">
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" min="0" step="0.01">
        <label for="category">Category:</label>
        <select id="category" name="category">
            <option value="">All</option>
            <?php
            if ($result_categories->num_rows > 0)
            while($row_categories = $result_categories->fetch_assoc()) {
                echo '<option value="'.$row_categories['id'].'">'.$row_categories['name'].'</option>';
            }
            ?>
        </select>
        <label for="brand">Brand:</label>
        <select id="brand" name="brand">
            <option value="">All</option>
            <?php
            if ($result_brands->num_rows > 0) {
                while($row_brands = $result_brands->fetch_assoc()) {
                    echo '<option value="'.$row_brands['id'].'">'.$row_brands['name'].'</option>';
                }
            }
            ?>
        </select>
        <input type="submit" value="Filter">
    </form>
    <?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        if(!empty($row['image_path'])){
            echo '<img src="'.$row['image_path'].'" alt="'.$row['name'].'">';
        }
        echo '<h3>'.$row['name'].'</h3>
                <p>'.$row['description'].'</p>
                <p>Price: $'.$row['price'].'</p>
                <p>Category: '.$row['category_name'].'</p>
                <p>Brand: '.$row['brand_name'].'</p>
                <a href="product_detail.php?id='.$row['id'].'">View Detail</a>
                <a href="admin.php?action=edit&id='.$row['id'].'">Edit</a>
                <a href="admin.php?action=delete&id='.$row[id].'">Delete</a>
            </div>';
    }
} else {
    echo "No products found";
}

        ?>
        <div class="pagination">
            <?php
            // Create links for the pagination
            for ($i = 1; $i <= $total_pages; $i++) {
                $active = $i == $current_page ? 'class="active"' : '';
                echo '<a href="products.php?page='.$i.'" '.$active.'>'.$i.'</a>';
            }
            ?>
        </div>
    </body>
    </html>
    