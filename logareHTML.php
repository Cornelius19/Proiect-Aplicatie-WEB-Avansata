
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logare</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php include 'Components/navbar.php';?>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    </script>
    <?php include 'Features/logare.php';?>
    </script>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="col-md-4">
            <form method="post" action="logareHTML.php">
                <div class="mb-3">
                    <div class="text-center">
                        <h1>Logare</h1>
                    </div>
                    <label for="exampleInputEmail1" class="form-label">
                        Email address
                    </label>

                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required="true">
                    <div id="emailHelp" class="form-text">
                        We'll never share your email with anyone else.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="InputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required="true">
                </div>
                <div class="col text-center">
                    <button type="submit" class="btn btn-success" name="logare">LogIn</button>
                    <button type="button" class="btn btn-warning"
                        onClick="document.location.href='registerHTML.php'">Register</button>
                </div>
            </form>

        </div>

    </div>
</body>

</html>