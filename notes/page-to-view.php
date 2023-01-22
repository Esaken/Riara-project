<table>
    <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
    </tr>
    <?php
    $connection = mysqli_connect("hostname","username","password","database_name");
    $total = 0;
    foreach($_SESSION['cart'] as $product_id){
        $query = "SELECT * FROM products WHERE id='$product_id'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" .
        "<input type='number' name='quantity[$product_id]' value='1'>" .
        "<input type='submit' name='update[$product_id]' value='Update'>" .
        "<input type='submit' name='remove[$product_id]' value='Remove'>" .
        "</td>";
        echo "<td>" . $row['price'] . "</td>";
        $subtotal = $row['price'] * $quantity;
        $total += $subtotal;
        echo "<td>" . $subtotal . "</td>";
        echo "</tr>";
        }
        echo "<tr>";
        echo "<td colspan='3'>Total:</td>";
        echo "<td>" . $total . "</td>";
        echo "</tr>";
        ?>
        
        </table>
