<?php

$random = rand(1, 1000);
$file = fopen("imdb_top_1000.csv", "r");
$line = "";
$counter = 0;

while($line = fgets($file)){
    if($counter == $random){
        break;
    }
    $counter++;
}

$movie = explode(",", $line);
$poster = $movie[0] . "," . $movie[1] . "," . $movie[2] . "," . $movie[3];
$title = $movie[4];
$year = $movie[5];
$rating = $movie[9];

echo("<table border='1'>
      <tr>
        <th>Poster</th>
        <th>Title</th>
        <th>Release Year</th>
        <th>IMDB Rating</th>
      </tr>
      <tr>
        <td><img src = $poster></td>
        <td>$title</td>
        <td>$year</td>
        <td>$rating</td>
      </tr>
      </table>");
