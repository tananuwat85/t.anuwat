<div class="container">
    <h2>Product list</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name </th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('../database/db_connection.php');
            // Fetch all products from the table.

            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql);

            // Display the products in the table rows.
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td><img src="' . $row['imgage'] . '" class="img-fluid" style="max-width:100px;" alt="Product Image"></td>';
                    echo    "<td>
                                <form 
                                    method='POST' 
                                    action='DeleteProductProvider.php'
                                    onsubmit='return confirm(\"Are you sure you want to delete this product?\")'>
                                <input 
                                    type='hidden' 
                                    name='product_id' 
                                    value='" . $row['id'] . "'>
                                <button 
                                    type='submit' 
                                    class='btn btn-danger btn-sm'>
                                Delete
                                </button>
                                </form>
                            </td>";
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="4">No Products found</td></tr>';
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

<div class="container">
    <h2>Add Product</h2>
    <form action="AddProductProvider.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <lable class="form-label" for="name">Name</lable>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <lable class="form-label" for="price">Price</lable>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <lable class="form-label" for="image">Image</lable>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>