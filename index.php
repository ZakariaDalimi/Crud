<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a href="create.php" class="btn btn-primary" role="button"> New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Birthday</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "myshop";


                // Connection
                $connection = new mysqli($servername, $username, $password, $dbname);

                // check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                if (!$result){
                    die("Invalid query: " . $connection->error);
                }

                // red data of each row

                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[birthday]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a href='edit.php?id=$row[id]' class='btn btn-outline-primary btn-sm'>Edite</a>
                        <a href='delete.php?id=$row[id]' class='btn btn-outline-danger btn-sm'>Delete</a>
                    </td>
                </tr>";
                }

                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>