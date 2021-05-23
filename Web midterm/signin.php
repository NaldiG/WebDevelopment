<?php
require_once "header.php";
$username = "";
$message = "";
$confirm = "";
if(isset($_SESSION['error'])){
    $error = $_SESSION["error"];
    $username = $error["username"];
    $message = $error["message"];
    unset($_SESSION["error"]);
}
if(isset( $_SESSION["confirm"])){
    $confirm = $_SESSION["confirm"];
    unset($_SESSION["confirm"]);
}
?>
<form method="post" action="authenticate.php">
    <div class="form-group mt-5">
        <p class="text-success"><?=$confirm;?></p>
        <p class="text-danger"><?=$message;?></p>
        <label for="inputUsername">Username</label>
        <input type="text" class="form-control" id="inputUsername" aria-describedby="emailHelp" placeholder="Enter Username" name="username" value="<?=$username;?>">
    </div>
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter Password">
    </div>
    <button type="submit" class="btn btn-dark mb-5">Sign in</button>
</form>
<?php
require_once "footer.php";
?>
