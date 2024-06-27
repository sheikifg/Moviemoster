<?php
/*
* ----------------------------------------------------
* @author: fr0zen
* @author URI: https://fr0zen.sellix.io
* @copyright: (c) 2022 Vincenzo Piromalli. All rights reserved
* ----------------------------------------------------
* @since 3.8.8
* 1 February 2023
*/

$id = $_GET['id'];
$sv = $_GET['sv'];
$season = $_GET['s'];
$episode = $_GET['e'];
$site = "";

if ($sv == "2embed") {
$site = esc_url( get_template_directory_uri() ).'/player/tv.php?id='.$id.'&s='.$season.'&e='.$episode;
} 
else if ($sv == "superembed") {
$site = esc_url( get_template_directory_uri() ).'/player/player.php?video_id='.$id.'&tmdb=1&s='.$season.'&e='.$episode;
}
else if ($sv == "openvids") {
$site = '//vidsrc.me/embed/'.$id.'/'.$season.'-'.$episode.'/'; 
}
else if ($sv == "") {
$site = esc_url( get_template_directory_uri() ).'/player/tv.php?id='.$id.'&s='.$season.'&e='.$episode;
} 
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		body,html{
			padding:0;
			left: 0;
			background: transparent;
		}

		iframe{
			position: fixed;
			top: 0px;
			left: 0px;
			width: 100%;
			height: 100%;
		}
	</style>
</head>
<body>
	<script>
		window.location.href="<?php echo $site; ?>";
	</script>
</body>
</html>