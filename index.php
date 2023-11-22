<?php

session_start();
if(!isset($_SESSION['email'])){
    $_SESSION['msg'] = "You must login first!";
    header('location: logare.php');
}
if(isset($_SESSION['']))
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php  if (isset($_SESSION['email'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['email'];echo $_SESSION['success']; ?></strong></p>
    	
    <?php endif ?>
    <script src="js/bootsrap.min.js"></script>
</body>
</html>