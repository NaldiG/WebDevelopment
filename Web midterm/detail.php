<?php
require_once "database.php";
require_once "repository.php";
require_once "header.php";
$repository = new Repository($pdo);
$id = filter_var($_GET["id"], FILTER_SANITIZE_STRING);
$job = $repository->getJob($id);
?>
<div class="row">
    <div class="col-sm-2">
        <img src="Logo/<?=$job->logo;?>" width="189">
    </div>
    <div class="col-sm-10">
        <table class="table">
            <thead class="thead-dark ">
            <tr>
                <th scope="col">Job</th>
                <th scope="col">Company</th>
                <th scope="col">City</th>
                <th scope="col">Category</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?=$job->title;?></th>
                    <td><?=$job->name;?></td>
                    <td><?=$job->city;?></td>
                    <td><?=$job->category;?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<hr/>
<h2>Job Description</h2>
<p><?=$job->description;?></p>
<h2>Company Contact Information</h2>
<p><?=$job->info;?></p>
<?php
require_once "footer.php";
?>