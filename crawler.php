<?php
$username = "REDDIT_USERNAME"; //Reddit login info
$password = "REDDIT_PASSWORD"; //Reddit login info
$subreddit = "gifs"; //subreddit to crawl
$posts = 5; //How many posts to get per run. Use a small number for testing since it can not be stopped once started. Once working you can do 100 if you wish.
$max_execution_time = 600; //Sets how long the script will run before timing out. Default 10 minutes.
$file_type = ".gif"; //File type to save
$path = "images/"; //Path to save files ***NOTE IF YOU ARE RUNNING THIS SCRIPT AS A CRON JOB YOU MUST INCLUDE AN ABSOLUTE PATH ex: /media/mounted/images***

require("reddit.php");
ini_set('max_execution_time', $max_execution_time);
$reddit = new reddit($username, $password);
$listing = $reddit->getListing($subreddit, $posts);
$arrlinks = array();
for ($i = 0; $i < count($listing->data->children); $i++){
	$link = $listing->data->children[$i]->data->url;
	$pname = $listing->data->children[$i]->data->name;
	//If you would like to get all of the image file types you could replace the "$file_type" variable in the line below with: ".gif" || ".jpg" || ".png"
	if (substr($link, -4) == $file_type){
		array_push($arrlinks, $link);
		sleep(3);
		$reddit->hidePost($pname);
	}else{
		 $reddit->hidePost($pname);
		 sleep(3);
	}
}
foreach ($arrlinks as $alink){
	$name=md5( rand( 0, 1000 ) . rand( 0, 1000 ) . rand( 0, 1000 ) . rand( 0, 1000 ) );
	$fpath = $path . $name . $file_type;
	copy($alink, $fpath);
}
?>
