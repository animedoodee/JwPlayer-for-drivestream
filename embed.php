<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.
header( 'X-Frame-Options: SAMEORIGIN' );
$driver = $_GET['id'];
$driver = preg_match('/([\w-_]{28})/',$driver,$driver)?$driver[1]:null;
$e = time() + 14000;
$md5 = md5($driver);
$md52 = md5($e);
	$cachefile = 'cache/'.$driver.'-embedv';
	// define how long we want to keep the file in seconds. I set mine to 4 hours.
	$cachetime = 13999;
	// Check if the cached file is still fresh. If it is, serve it up and exit.
	if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    include($cachefile);
    	exit;
	}
	// if there is either no file OR the file to too old, render the page and capture the HTML.
	ob_start();
 

$ch = curl_init("https://drive.google.com/get_video_info?docid=$driver");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// get headers too with this line
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($ch);
// get cookie
// multi-cookie variant contributed by @Combuster in comments
preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
$cookies = array();
foreach($matches[1] as $item) {
    parse_str($item, $cookie);
    $cookies = array_merge($cookies, $cookie);
}
$cookiz = str_replace("DRIVE_STREAM=" ,"" , $matches[1]); 
 
$data = $result;
parse_str($data,$data);
		$sources = explode(',',$data['fmt_stream_map']);
		if(!$sources)return false;
		foreach($sources as $source){
			$source = explode('|',$source);
			//$quality = str_replace([18,59,22,37],[360,480,720,1080],$source[0]);
			$source[1] = preg_replace('/[^\/]+\.google\.com/','redirector.googlevideo.com',$source[1]);
			$source[1] = preg_replace('/app=[^\/&]+/',"app=free",$source[1]);
 
			$expire = preg_match('/expire=([\d]+)/',$source[1],$expire)?$expire[1]:false;
		}
			 $sources = str_replace("|" ,"<file>" , $sources); 
 
			$sources = preg_replace('@<file>https://(.*)@si','<file>https://$1&apps=animedoodee.com</file>',$sources);
			$sources = str_replace("c.drive.google.com" ,"googlevideo.com" , $sources); 
 	ob_start();
print_r($sources, false);
 
$output = ob_get_contents();
$output = str_replace("%2C" ,"," , $output ); 
//$output = str_replace("&" ,"%26" , $output ); 
$output = str_replace("18<file>" ,"<quality>360</quality><file>" , $output ); 
$output = str_replace("59<file>" ,"<quality>480</quality><file>" , $output ); 
$output = str_replace("22<file>" ,"<quality>720</quality><file>" , $output ); 
$output = str_replace("37<file>" ,"<quality>1080</quality><file>" , $output ); 
ob_end_clean();

 
$regex3='|</quality><file>(.+?)</file>|';
preg_match_all($regex3,$output,$parts3);
$sort3 = $parts3[1];
 
	$links3=$sort3;  
 
 

$regex2='|<quality>(.+?)</quality>|';
preg_match_all($regex2,$output,$parts2);
$sort2 = $parts2[1];
 
	$links2=$sort2;  

 


 

include("servers.php");
include("config.php");
$drv = "<div>".$driver."</div><t>".$e."</t>";
$drvid = $driver;
$enc = base64_encode(openssl_encrypt($drvid,$encrypt_method, $key, 0, $iv));
 

?>
 
<!DOCTYPE html>
<html>
<head>
<title>Google Drive Player - AnimeDooDee.CoM</title>
<meta name="robots" content="noindex">
<link rel="shortcut icon" href="//animedoodee.com/api/assets/images/favicon.png" type="image/x-icon" />
<script type="text/javascript" src="//animedoodee.com/api/assets/js/jquery.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="//animedoodee.com/api/assets/jwplayer/jwplayer.js"></script>
<style type="text/css">html,body{padding:0;margin:0;height:100%}#animedoodee-player{width:100%!important;height:100%!important;overflow:hidden;position:absolute;}.animedoodee-container{position:relative;width:100%;height:0;padding-bottom:56.25%;background-color:#000;}.animedoodee-video{position:absolute;top:0;left:0;width:100%;height:100%;z-index:1;}.animedoodee-frame{position:absolute;height:50px;right:8px;margin-top:8px;width:50px;z-index:1;background-repeat:no-repeat;background-size:50px 50px;}.jw-menu,.jw-time-tip{padding:.5em!important}</style>
</head>
<body>

<div itemscope itemtype="http://schema.org/VideoObject">
                <meta itemprop="name" content="(DUB) " />
<div id="animedoodee-player"></div>

<script type="text/javascript">jwplayer.key="w51hNXyL+ilJTlNDYNetRp9M/zfZCk/MH1sYlg==";</script>
<script type="text/javascript">
					var player = jwplayer("animedoodee-player");
					player.setup({
					controls: "true",
					skin: {
					name: "tube",
					active: "#20b4cc",
					inactive: "#21a7ae"
						},
				
						abouttext: "AnimeDooDee.CoM",
						aboutlink: "https://animedoodee.com/",
						sources: [
 
<?php
$i = 0;
foreach($links2 as $link2){
$i++;
$var = explode('&',$links3[$i -1]);
$domain = $var[0];
$domain = base64_encode(preg_replace('@(.*)videoplayback(.*)@si',"$1",$domain));
$links3[$i -1] = preg_replace('@https://(.*).com/videoplayback@si',"",$links3[$i -1]);
$sub = preg_replace('@https://(.*).com/videoplayback@si',"$1",$links3[$i -1]);
$links3[$i -1] = preg_replace('@&ip=(.+?)&@si',"&ip=$1&ck=$cookiz[0]&dom=$domain&",$links3[$i -1]);
$links3[$i -1] = preg_replace('@&driveid=(.+?)&@si',"&driveid=$enc&api=$cookiz[0]&",$links3[$i -1]);
?>
{file: "<?php echo $proxy; ?><?php echo $links3[$i -1]; ?><?php $denc = base64_encode($links3[$i -1]); $denc = str_replace("-", "/", $denc); $denc = str_replace("+", "_", $denc); ?>",label: "<?php echo $links2[$i -1]; ?>p",type: "mp4"<?php if($links2[$i -1] == "360") { ?>,"default": "true"<?php } ?>},
<?php
} 
?> 
],

 

						aspectratio: "16:9",
						startparam: "start",
						primary: "html5",
						preload: "auto",
						image: "",
					    
					    
					});
					player.on("error" , function(){
					});
					player.addButton(
  //This portion is what designates the graphic used for the button
  "//i.imgur.com/EjPniCq.png",
  //This portion determines the text that appears as a tooltip
  "Download ", 
  //This portion designates the functionality of the button itself
  function() {
    //With the below code, we're grabbing the file that's currently playing
    window.location.href = player.getPlaylistItem()['file'];
  },
  //And finally, here we set the unique ID of the button itself.
  "download"
);
				</script>;
</div>
</body>
</html>
<?php
	// We're done! Save the cached content to a file
	$fp = fopen($cachefile, 'w');
	fwrite($fp, ob_get_contents());
	fclose($fp);
	// finally send browser output
	ob_end_flush();
?>