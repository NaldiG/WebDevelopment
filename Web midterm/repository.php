<?php

Class JobEntry{
    var $logo;
    var $name;
    var $title;
    var $category;
    var $city;
    var $job_id;

    public function __construct($logo, $name, $title, $category, $city, $id){
        $this->logo = $logo;
        $this->name = $name;
        $this->title = $title;
        $this->category = $category;
        $this->city = $city;
        $this->job_id = $id;
    }
}

Class JobDetail{
    var $logo;
    var $title;
    var $name;
    var $city;
    var $category;
    var $description;
    var $info;

    public function __construct($logo, $title, $name, $city, $category, $description, $info){
        $this->logo = $logo;
        $this->name = $name;
        $this->title = $title;
        $this->category = $category;
        $this->city = $city;
        $this->description = $description;
        $this->info = $info;
    }
}

Class Job{
    var $id;
    var $title;
    var $category;
    var $description;

    public function __construct($id, $title, $category, $description){
        $this->id = $id;
        $this->title = $title;
        $this->category = $category;
        $this->description = $description;
    }
}

Class Company{
    var $id;
    var $name;
    var $city;
    var $info;
    var $logo;

    public function __construct($id, $name, $city, $info, $logo){
        $this->id = $id;
        $this->name = $name;
        $this->city = $city;
        $this->info = $info;
        $this->logo = $logo;
    }
}

Class Repository{
    var $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllJobs(){
        $result = $this->pdo->query("Select logo, c.name, title, category, city, j.id from companies c, jobs j where c.id = company_id ORDER BY RAND()");
        $jobs = array();
        while($row = $result->fetch()){
            $jobs[] = new JobEntry($row["logo"], $row["name"], $row["title"], $row["category"], $row["city"], $row["id"]);
        }
        return $jobs;
    }

    public function findByCity($city){
        $result = $this->pdo->query("Select logo, c.name, title, category, city, j.id from companies c, jobs j where c.id = company_id and city like '%$city%'");
        $jobs = array();
        while($row = $result->fetch()){
            $jobs[] = new JobEntry($row["logo"], $row["name"], $row["title"], $row["category"], $row["city"], $row["id"]);
        }
        return $jobs;
    }

    public function findByCategory($category){
        $result = $this->pdo->query("Select logo, c.name, title, category, city, j.id from companies c, jobs j where c.id = company_id and category like '%$category%'");
        $jobs = array();
        while($row = $result->fetch()){
            $jobs[] = new JobEntry($row["logo"], $row["name"], $row["title"], $row["category"], $row["city"], $row["id"]);
        }
        return $jobs;
    }

    public function findByCityAndCategory($city, $category){
        $result = $this->pdo->query("Select logo, c.name, title, category, city, j.id from companies c, jobs j where c.id = company_id and city like '%$city%' and category like '%$category%'");
        $jobs = array();
        while($row = $result->fetch()){
            $jobs[] = new JobEntry($row["logo"], $row["name"], $row["title"], $row["category"], $row["city"], $row["id"]);
        }
        return $jobs;
    }

    public function getJob($id){
        $result = $this->pdo->query("Select logo, title, c.name, city, category, description, info from companies c, jobs j where c.id = company_id and j.id = $id");
        if($row = $result->fetch()){
            return new JobDetail($row["logo"], $row["title"], $row["name"], $row["city"], $row["category"], $row["description"], $row["info"]);
        }else{
            return null;
        }
    }

    public function findJobsByCompany($id){
        $result = $this->pdo->query("Select id, title, description, category from jobs where company_id = $id");
        $jobs = array();
        while($row = $result->fetch()){
            $jobs[] = new Job($row["id"], $row["title"], $row["category"], $row["description"]);
        }
        return $jobs;
    }

    public function findCompany($username, $password){
        $result = $this->pdo->query("Select * from companies where username = '$username' and password='$password'");
        if($row = $result->fetch()){
            return $row["id"];
        }else{
            return null;
        }
    }

    public function getCompany($id){
        $result = $this->pdo->query("Select id, name, city, info, logo from companies where id = $id");
        if($row = $result->fetch()){
            return new Company($row["id"], $row["name"], $row["city"], $row["info"], $row["logo"]);
        }else{
            return null;
        }
    }

    public function createCompany($name, $city, $username, $password){
        $stmt = $this->pdo->prepare("INSERT INTO companies (username, password, name, city) VALUES (?, ?, ?, ?);");
        return $stmt->execute([$username, $password, $name, $city]);
    }

    public function uploadLogo($logo, $id){
        $stmt = $this->pdo->prepare("UPDATE `companies` SET `logo` = ? WHERE (`id` = ?);");
        return $stmt->execute([$logo, $id]);
    }

    public function updateCompany($id, $name, $city, $info){
        $stmt = $this->pdo->prepare("UPDATE `companies` SET `name` = ?, `city` = ?, `info` = ? WHERE (`id` = ?);");
        return $stmt->execute([$name, $city, $info, $id]);
    }

    public function createJob($id, $title, $category, $description){
        $stmt = $this->pdo->prepare("INSERT INTO jobs (title, description, category, company_id) VALUES (?, ?, ?, ?);");
        return $stmt->execute([$title, $description, $category, $id]);
    }

    public function updateJob($id, $title, $category, $description){
        $stmt = $this->pdo->prepare("UPDATE `jobs` SET `title` = ?, `category` = ?, `description` = ? WHERE (`id` = ?);");
        return $stmt->execute([$title, $category, $description, $id]);
    }

    public function deleteJob($id){
        $stmt = $this->pdo->prepare("DELETE FROM `jobs` WHERE (`id` = ?)");
        return $stmt->execute([$id]);
    }
}