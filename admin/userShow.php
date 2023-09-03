<?php
require_once '../database/db_connection.php';
session_start();
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>UserList</title>
</head>

<body>
    <?php
    if ($_SESSION['create']) {
    ?>
    <script>
    Swal.fire({
        title: 'create new user success!',
        icon: 'success',
        showConfirmButton: false,
        timmer: 1500
    })
    </script>
    <?php
        $_SESSION['create'] = false;
    }
    ?>
    <div class="container">
        <h1>User data</h1>
        <div class="row">
            <!-- .row -->
            <div class="col d-flex justify-content-end">
                <!-- .col.d-flex.justify-content-end -->
                <a href="addUser.php" class="btn btn-success mb-3">
                    <!-- a.btn.btn-success.mb-3 -->
                    Add
                </a>
            </div>
        </div>
        <table class="table table-hover table-striped border">
            <thead>
                <tr>
                    <th>#</th>
                    <!-- <th>ID</th> -->
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th class="text-center">Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0) : ?>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $i += 1; ?></td>
                    <!-- <td><?php echo $row['id'] ?></td> -->
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['password'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td class="text-center">
                        <a href="updateUser.php" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-outline-danger">Del</a>
                    </td>

                </tr>
                <?php endwhile; ?>
                <?php else : ?>
                <tr>
                    <td colspan="3">No users found</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php
mysqli_close($conn);
?>