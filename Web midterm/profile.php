<?php
require_once "database.php";
require_once "repository.php";
require_once "header.php";
if(!isset($_SESSION['id'])){
    header("Location: signin.php");
    die();
}else{
    $id = $_SESSION['id'];
}
$error1 = "";
$error2 = "";
$error3 = "";
$error4 = "";
$message1 = "";
$message2 = "";
$message3 = "";
$message4 = "";
if(isset($_SESSION['error1'])){
    $error1 = $_SESSION["error1"];
    unset($_SESSION["error1"]);
}
if(isset($_SESSION['error2'])){
    $error2 = $_SESSION["error2"];
    unset($_SESSION["error2"]);
}
if(isset($_SESSION['error3'])){
    $error3 = $_SESSION["error3"];
    unset($_SESSION["error3"]);
}
if(isset($_SESSION['error4'])){
    $error4 = $_SESSION["error4"];
    unset($_SESSION["error4"]);
}
if(isset($_SESSION['message1'])){
    $message1 = $_SESSION["message1"];
    unset($_SESSION["message1"]);
}
if(isset($_SESSION['message2'])){
    $message2 = $_SESSION["message2"];
    unset($_SESSION["message2"]);
}
if(isset($_SESSION['message3'])){
    $message3 = $_SESSION["message3"];
    unset($_SESSION["message3"]);
}
if(isset($_SESSION['message4'])){
    $message4 = $_SESSION["message4"];
    unset($_SESSION["message4"]);
}

$repository = new Repository($pdo);
$jobs = $repository->findJobsByCompany($id);
$company = $repository->getCompany($id);
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent ">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto"></ul>
            <span class="navbar-text">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <form class="form-inline" method="post" action="logout.php">
                    <button class="btn btn-dark my-2 my-sm-0" type="submit" onclick="">Logout</button>
                </form>
            </li>
        </ul>
        </span>
        </div>
    </nav>
    <h2 class="mt-5">Upload Your Company's Logo</h2>
    <p class="text-danger"><?=$error1;?></p>
    <p class="text-primary"><?=$message1;?></p>
    <form method="post" action="upload.php" enctype="multipart/form-data">
        <input type="file" name="image"> <br>
        <input type="text" name="logo" value="<?=$company->logo;?>" hidden>
        <input class="mb-3" type="submit" value="Upload">
    </form>
    <hr/>
    <h2>Your Company's Details</h2>
    <form method="post" action="update.php">
        <div class="form-group">
            <p class="text-danger"><?=$error2;?></p>
            <p class="text-primary"><?=$message2;?></p>
            <label for="inputName">Company Name</label>
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="<?=$company->name;?>">
        </div>
        <div class="form-group">
            <label for="inputCity">Company Headquarters</label>
            <input type="text" class="form-control" id="inputCity" name="city" placeholder="City" value="<?=$company->city;?>">
        </div>
        <div class="form-group">
            <label for="inputInfo">Contact Information</label>
            <textarea class="form-control" id="inputInfo" aria-describedby="emailHelp" placeholder="Enter Here" name="info"><?=$company->info;?></textarea>
        </div>
        <button type="submit" class="btn btn-dark">Update</button>
    </form>
    <hr/>
    <h2>Create a New Job</h2>
    <form method="post" action="create.php">
        <div class="form-group">
            <p class="text-danger"><?=$error3;?></p>
            <p class="text-primary"><?=$message3;?></p>
            <label for="inputTitle">Job Title</label>
            <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label for="inputCategory">Job Category</label>
            <input type="text" class="form-control" id="inputCategory" name="category" placeholder="Enter Category">
        </div>
        <div class="form-group">
            <label for="inputDescription">Job Description</label>
            <textarea class="form-control" id="inputDescription" aria-describedby="emailHelp" placeholder="Enter Description" name="description""></textarea>
        </div>
        <button type="submit" class="btn btn-dark">Create</button>
    </form>
    <hr/>
    <h2>The List of Jobs Your Company is Currently Offering</h2>
    <p class="text-danger"><?=$error4;?></p>
    <p class="text-primary"><?=$message4;?></p>
    <?php foreach($jobs as $job){ ?>
    <div class="card">
        <div class="card-body">
            <form method="post" action="delete.php">
                <label for="inputTitle">Title: </label>
                <input type="text" id="inputTitle" name="title" value="<?=$job->title;?>">
                <label for="inputCategory">Category: </label>
                <input type="text" id="inputCategory" name="category" value="<?=$job->category;?>">
                <p class="card-text">Description:</p>
                <textarea  class="form-control" name="description"><?=$job->description;?></textarea>
                <input type="text" name="id" value="<?=$job->id;?>" hidden>
                <button type="submit" name="update" class="btn btn-dark mt-2">Update</button>
                <button type="submit" name="delete" class="btn btn-danger mt-2">Delete</button>
            </form>
        </div>
    </div>
    <?php } ?>
<?php
require_once "footer.php";
?>