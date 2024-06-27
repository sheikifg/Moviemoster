<?php
ini_set('error_reporting', E_STRICT);

$color = "#fff";
$id = $_GET['id'] ?? null;
$season = $_GET['s'] ?? null;
$episode = $_GET['e'] ?? null;

$url = "https://api.consumet.org/meta/tmdb/info/".$id."?type=tv";

$season_number = bcsub($season, '1');
$episode_number = bcsub($episode, '1');

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "accept: */*",
   "sec-fetch-dest: empty",
   "sec-fetch-mode: cors",
   "sec-fetch-site: cross-site",
   "sec-gpc: 1",
   "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36",
);

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);

$json = json_decode( $resp, true);
$episodeId = $json['seasons'][$season_number]['episodes'][$episode_number]['id'];
$showId = $json['id'];
$title = $json['title'];
$jw_description = $json['seasons'][$season_number]['episodes'][$episode_number]['title'];
$year = substr($json['releaseDate'], 0, 4);
$cover = $json['seasons'][$season_number]['episodes'][$episode_number]['img']['hd'];

 
 
$api = "https://api.consumet.org/meta/tmdb/watch/".$episodeId."?id=".$showId;


$fetch = curl_init($api);
curl_setopt($fetch, CURLOPT_URL, $api);
curl_setopt($fetch, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "accept: */*",
   "sec-fetch-dest: empty",
   "sec-fetch-mode: cors",
   "sec-fetch-site: cross-site",
   "sec-gpc: 1",
   "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36",
);
curl_setopt($fetch, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($fetch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($fetch, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($fetch);
curl_close($fetch);

$result = str_replace("url", "file", $result);
$result = str_replace("quality", "label", $result);

$result = str_replace("lang", "label", $result);

$risultato = json_decode( $result, true);

foreach($risultato['sources'] as $key => $item){
       $risultato['sources'][$key]["type"] = "hls";

       unset($risultato['sources'][$key]["isM3U8"]);

       if($risultato['sources'][$key]["label"] == "auto") {
       $totale = $risultato['sources'][$key]["file"];
      } 
}


foreach($risultato['subtitles'] as $key => $item){
       // unset them
       //$risultato['subtitles'][0]["default"] = false;
       //$newarray[$key]["kind"] = "captions";
       $risultato['subtitles'][0]["default"] = false;
       $risultato['subtitles'][$key]["kind"] = "captions";
       //unset($risultato['subtitles'][$key]["label"]= "Default (maybe)");
       if($risultato['subtitles'][$key]["label"] == "Default (maybe)") {
       $risultato['subtitles'][$key]["kind"] = "thumbnails";
      } 

}


$sources = $risultato['sources'];
$tracks = $risultato['subtitles'];

if (empty($year)) {
$jw_year = "";
} else  {
$jw_year = " (".$year.")";
}


$jw_title = $title." (S".$season."E".$episode.")";

$videojson->title = $jw_title;
$videojson->description = $jw_description;
$videojson->image = $cover;
$videojson->file = $totale;
$videojson->type = "hls";
$videojson->androidhls = true;
$videojson->hlshtml = true;
$videojson->playbackRateControls = true;
$videojson->stretching = "uniform";
$videojson->responsive = true;
$videojson->preload = "auto";
if ($tracks != '') {
$videojson->tracks = $tracks;
} 

$lastjson = json_encode($videojson, JSON_PRETTY_PRINT);
$lastjson = trim($lastjson, '{}');

if (empty($totale)) {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow" />
        <meta name="referrer" content="never" />
        <meta name="referrer" content="no-referrer" />
        
        <title>Video Not Found</title>
        <link rel="icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAADElEQVQI12P4//8/AAX+Av7czFnnAAAAAElFTkSuQmCC">
        <link rel="stylesheet" href="https://fmovies.best/h/assets/css/embed.css?v=<?php echo strtotime('now'); ?>">

    </head>
    <div id="media-embed">
        <div class="media-embed-container">
            <div class="alert-center alert-error">
                <div class="alert">
                    <div class="alert-icon mb-3"><i style="color: <?php echo $color; ?>;" class="far fa-4x fa-sad-tear"></i></div>
                    <div class="alert-content">
                        <h3 class="heading-large mb-2">We're Sorry!</h3>
                        <p style="font-size: 1.0em;" class="mb-0">We can't find the video it may be uploading, please try again in a few minutes or try other servers below.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php } else { ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow" />
        <meta name="referrer" content="never" />
        <meta name="referrer" content="no-referrer" />
        
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        
        <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
        <link rel="dns-prefetch" href="//content.jwplatform.com">
        <link rel="dns-prefetch" href="//image.tmdb.org">
        
        <title><?php echo $jw_title; ?></title>
        <meta name="description" content="<?php echo $jw_description; ?>" />
        <link rel="icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAADElEQVQI12P4//8/AAX+Av7czFnnAAAAAElFTkSuQmCC">
        
        <script src="https://content.jwplatform.com/libraries/DkwOvSfA.js"></script>

	    <style>#player,*,:focus,body,html{outline:0}*{margin:0;padding:0}body,html{background:#000;overflow-x:hidden;overflow-y:hidden}#player{position:absolute;width:100%!important;height:100%!important;pointer-events:none}</style>

    </head>
<body>
<div id="player">Loading the player...</div>
<script>
var color = "<?php echo $color; ?>";
var playerInstance = jwplayer("player");
playerInstance.setup({
skin: {
    controlbar: {
        background: "rgba(0,0,0,0)",
        icons: "rgba(255,255,255,0.8)",
        iconsActive: color,
        text: "#FFFFFF"
    },
    menus: {
        background: "#333333",
        text: "rgba(255,255,255,0.8)",
        textActive: color
    },
    timeslider: {
        progress: color,
        rail: "rgba(255,255,255,0.3)"
    },
    tooltips: {
        background: color,
        text: "#000"
    },
},
    "cast": {},
<?php echo $lastjson; ?>
});
</script>
</body>
</html>
<?php } ?>