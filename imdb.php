<?php

$random = rand(1, 1000);
$file = fopen("imdb_top_1000.csv", "r");
$line = "";
$index = 0;

while($line = fgets($file)){
    if($index == $random){
        break;
    }
    $index++;
}

$movie = explode(",", $line);

//Each poster url contains 3 commas and since they are separated in the line above I have to concatenate the first 4 array entries to get the full poster url.

$poster = $movie[0] . "," . $movie[1] . "," . $movie[2] . "," . $movie[3];
$title = $movie[4];
$year = $movie[5];

//The genre column comes before the rating column and it can contain several genres separated by commas.
//Because of this, instead of displaying the rating the program would display the second genre of the movie.
//I start at the index where the rating is supposed to be if there were just one genre and I increase the index by one each time I dont get a boolean or int.

$index = 9;
while(floatval($movie[$index]) == 0 || intval($movie[$index]) == 0){
    $index++;
}
$rating = $movie[$index];

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
