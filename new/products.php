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
            margin-bottom:
