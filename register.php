<?php include 'Components/navbar.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="col-md-4">
            <form>
                <div class="mb-3">
                    <div class="text-center">
                        <h1>Inregistrare</h1>
                    </div>
                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                    <input type="email" class="form-control" name="last_name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="InputPassword" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name">
                </div>
                <div class="mb-3">
                    <label for="InputPassword" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="InputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" name="pass">
                </div>
                <div class="mb-3">
                    <label for="InputPassword" class="form-label">Repeat Password</label>
                    <input type="password" class="form-control" name="repeat_pass">
                </div>
                <div class="col text-center">
                    <button type="submit" class="btn btn-success" name="reg_user">Register</button>
                    <button type="button" class="btn btn-warning" onClick="document.location.href='logare.php'">Back to LogIn</button>
                </div>

            </form>
        </div>

    </div>

    <script src="js/bootsrap.min.js"></script>
</body>

</html>