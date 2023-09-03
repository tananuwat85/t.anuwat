<div class="container">
    <h2 class="my-4">Product list</h2>
    <div class="row">
        <?php
        require_once('../database/db_connection.php');
        // Fetch all products from the table.

        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);

        // Display the products as cards
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-md-4">';
                echo '<div class="card product-card">';
                echo '<img src="' . $row['image'] . '" class="card-img-top" alt="Product Image">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                echo '<p class="card-text">Price: ' . $row['price'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>No products found</p>";
        }
        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
</div>