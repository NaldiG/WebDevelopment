<?php
require_once "repository.php";
require_once "header.php";
if(isset($_SESSION["filter"])){
    $jobs = $_SESSION["filter"];
    $city = $_SESSION["city"];
    $category = $_SESSION["category"];
}else{
    header("Location: filter.php?start=1");
    die();
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <form class="form-inline" method="post" action="filter.php">
        <input class="form-control mr-sm-2" type="search" placeholder="Category" aria-label="Search" name="category" value="<?=$category;?>">
        <input class="form-control mr-sm-2" type="search" placeholder="City" aria-label="Search" name="city" value="<?=$city;?>">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Filter</button>
    </form>

    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto"></ul>
        <span class="navbar-text">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="navbar-brand" href="signup.php">Sign up</a>
            </li>
            <li class="nav-item">
                <a class="navbar-brand" href="signin.php">Sign in</a>
            </li>
        </ul>
        </span>
    </div>
</nav>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Company Logo</th>
            <th scope="col">Company Name</th>
            <th scope="col">Job Title</th>
            <th scope="col">Category</th>
            <th scope="col">City</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($jobs as $job){ ?>
        <tr>
            <td><img src="Logo/<?=$job->logo;?>" width="50"></td>
            <td><?=$job->name;?></td>
            <td><a href="detail.php?id=<?=$job->job_id;?>"><?=$job->title;?></a></td>
            <td><?=$job->category;?></td>
            <td><?=$job->city;?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php
require_once "footer.php";
?>