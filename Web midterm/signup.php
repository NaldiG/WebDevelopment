<?php
require_once "header.php";
$error = "";
if(isset($_SESSION['error'])){
    $error = $_SESSION["error"];
    unset($_SESSION["error"]);
}
?>
<form method="post" action="register.php">
    <div class="form-group mt-5">
        <p class="text-danger"><?=$error;?></p>
        <label for="inputName">Company Name</label>
        <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="inputCity">Company Headquarters</label>
        <input type="text" class="form-control" id="inputCity" name="city" placeholder="Enter City">
    </div>
    <div class="form-group">
        <label for="inputUsername">Username</label>
        <input type="text" class="form-control" id="inputUsername" aria-describedby="emailHelp" placeholder="Enter Username" name="username"">
    </div>
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter Password">
    </div>
    <button type="submit" class="btn btn-dark mb-5">Sign up</button>
</form>
<?php
require_once "footer.php";
?>
