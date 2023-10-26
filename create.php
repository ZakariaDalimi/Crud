<?php
$name = "";
$email = "";
$phone = "";
$address = "";
$birthday = "";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myshop";


        // Connection
        $connection = new mysqli($servername, $username, $password, $dbname);



$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $birthday = $_POST["birthday"];

    if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($birthday)) {
        $errorMessage = "All fields are required!";
    } else {

        // Add the client to the database 

            $sql = "INSERT INTO clients (name, email, phone, address, birthday)".
             "VALUES('$name', '$email', '$phone', '$address', '$birthday')";
            
             $result = $connection->query($sql);

             if ($result){
                $errorMessage = 'Invalid query' . $connection->error;
             }

        // Clear form fields after successful submission
        $name = "";
        $email = "";
        $phone = "";
        $address = "";
        $birthday = "";

        $successMessage = "Client added successfully";

        header("location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container my-5">
        <h2>New Client</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>  
            </div>
            ";
        }
        ?>

        <form action="" method="post">
            <!-- Name -->
            <div class="row mb-3">
                <label for="name" class="col-sm-3 col-form-label">Full Name:</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" id="name" name="name" placeholder="Enter Full Name" value="<?php echo $name; ?>">
                </div>
            </div>

            <!-- Email -->
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" id="email" name="email" placeholder="Enter Email" value="<?php echo $email; ?>">
                </div>
            </div>

            <!-- Phone -->
            <div class="row mb-3">
                <label for="phone" class="col-sm-3 col-form-label">Phone:</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" id="phone" name="phone" placeholder="Enter Phone" value="<?php echo $phone; ?>">
                </div>
            </div>

            <!-- Address -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="address">Address:</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" id="address" name="address" placeholder="Address" value="<?php echo $address; ?>">
                </div>
            </div>

            <!-- Birthday -->
            <div class="row mb-3">
                <label for="birthday" class="col-sm-3 col-form-label">Birthday:</label>
                <div class="col-sm-6">
                    <input class="form-control" type="date" id="birthday" name="birthday" placeholder="Birthday" value="<?php echo $birthday; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>  
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <!-- Submit -->
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="index.php" class="btn btn-outline-primary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
