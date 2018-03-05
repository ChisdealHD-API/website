<?php

//Minecraft API!
$hub = "https://api.mcsrvstat.us/1/ServerIP:PORT";
$content = file_get_contents($hub);
$json = json_decode($content, true);

$survival = "https://api.mcsrvstat.us/1/ServerIP:PORT";
$content2 = file_get_contents($survival);
$json2 = json_decode($content2, true);

$factions = "https://api.mcsrvstat.us/1/ServerIP:PORT";
$content1 = file_get_contents($factions);
$json1 = json_decode($content1, true);

$hardcore = "https://api.mcsrvstat.us/1/ServerIP:PORT";
$content3 = file_get_contents($hardcore);
$json3 = json_decode($content3, true);

$prison = "https://api.mcsrvstat.us/1/ServerIP:PORT";
$content11 = file_get_contents($prison);
$json11 = json_decode($content11, true);

//ARK API!
$ark = "";
$content4 = file_get_contents($ark);
$json4 = json_decode($content4, true);

$ar = [];
$ar['Addons'] = [];
$ar["Servers"] = [];

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');

$id = NULL;
$channel_id = 'UCl_74sFMm1Sm3ePaRGrSnqg';

$xml = simplexml_load_file(sprintf('https://www.youtube.com/feeds/videos.xml?channel_id=%s', $channel_id));

//Youtube API
//$ar['Addons']["YoutubeAPI"]["Subscribers"]['Count'] = (string) $json12['items']['statistics']['subscriberCount'];
//$ar['Addons']["YoutubeAPI"]["Viewers"]['Count'] = (string) $json12['items']['statistics']['viewCount'];
//$ar['Addons']["YoutubeAPI"]["Videos"]['Count'] = (string) $json12['items']['statistics']['videoCount'];

if (!empty($xml->entry[0]->children('yt', true)->videoId[0])) {
    $ar['Addons']["YoutubeAPI"]["newest"]["id"] = (string) $xml->entry[0]->children('yt', true)->videoId[0];
}

if (!empty($xml->entry[0]->title[0])) {
    $ar['Addons']["YoutubeAPI"]["newest"]["title"] = (string) $xml->entry[0]->title[0];
}

if (!empty($xml->entry[1]->children('yt', true)->videoId[0])) {
    $ar['Addons']["YoutubeAPI"]["previous"]["id"] = (string) $xml->entry[1]->children('yt', true)->videoId[0];
}

if (!empty($xml->entry[1]->title[0])) {
    $ar['Addons']["YoutubeAPI"]["previous"]["title"]  = (string) $xml->entry[1]->title[0];
}


//Minecraft API!
$ar["Servers"]["Minecraft"]["Hub"]['ping'] = (string) $json['debug']['ping'];
if ($json['debug']['ping'] == true) {
    $ar["Servers"]["Minecraft"]["Hub"]['Online'] = (string) "ONLINE";
}else{
    $ar["Servers"]["Minecraft"]["Hub"]['Online'] = (string) "OFFLINE";
}
$ar["Servers"]["Minecraft"]["Hub"]['onlineCount'] = (string) $json['players']['online'];
$ar["Servers"]["Minecraft"]["Hub"]['maxCount'] = (string) $json['players']['max'];
$ar["Servers"]["Minecraft"]["Hub"]['Version'] = (string) $json['version'];
$ar["Servers"]["Minecraft"]["Hub"]['serverType'] = (string) $json['software'];

$ar["Servers"]["Minecraft"]["Factions"]['ping'] = (string) $json1['debug']['ping'];
if ($json1['debug']['ping'] == true) {
    $ar["Servers"]["Minecraft"]["Factions"]['Online'] = (string) "ONLINE";
}else{
    $ar["Servers"]["Minecraft"]["Factions"]['Online'] = (string) "OFFLINE";
}
$ar["Servers"]["Minecraft"]["Factions"]['onlineCount'] = (string) $json1['players']['online'];
$ar["Servers"]["Minecraft"]["Factions"]['maxCount'] = (string) $json1['players']['max'];
$ar["Servers"]["Minecraft"]["Factions"]['Version'] = (string) $json1['version'];
$ar["Servers"]["Minecraft"]["Factions"]['serverType'] = (string) $json1['software'];

$ar["Servers"]["Minecraft"]["Survival"]['ping'] = (string) $json2['debug']['ping'];
if ($json2['debug']['ping'] == true) {
    $ar["Servers"]["Minecraft"]["Survival"]['Online'] = (string) "ONLINE";
}else{
    $ar["Servers"]["Minecraft"]["Survival"]['Online'] = (string) "OFFLINE";
}
$ar["Servers"]["Minecraft"]["Survival"]['onlineCount'] = (string) $json2['players']['online'];
$ar["Servers"]["Minecraft"]["Survival"]['maxCount'] = (string) $json2['players']['max'];
$ar["Servers"]["Minecraft"]["Survival"]['Version'] = (string) $json2['version'];
$ar["Servers"]["Minecraft"]["Survival"]['serverType'] = (string) $json2['software'];

$ar["Servers"]["Minecraft"]["HardcoreSkyblock"]['ping'] = (string) $json3['debug']['ping'];
if ($json3['debug']['ping'] == true) {
    $ar["Servers"]["Minecraft"]["HardcoreSkyblock"]['Online'] = (string) "ONLINE";
}else{
    $ar["Servers"]["Minecraft"]["HardcoreSkyblock"]['Online'] = (string) "OFFLINE";
}
$ar["Servers"]["Minecraft"]["HardcoreSkyblock"]['onlineCount'] = (string) $json3['players']['online'];
$ar["Servers"]["Minecraft"]["HardcoreSkyblock"]['maxCount'] = (string) $json3['players']['max'];
$ar["Servers"]["Minecraft"]["HardcoreSkyblock"]['Version'] = (string) $json3['version'];
$ar["Servers"]["Minecraft"]["HardcoreSkyblock"]['serverType'] = (string) $json3['software'];

$ar["Servers"]["Minecraft"]["Prison"]['ping'] = (string) $json11['debug']['ping'];
if ($json11['debug']['ping'] == true) {
    $ar["Servers"]["Minecraft"]["Prison"]['Online'] = (string) "ONLINE";
}else{
    $ar["Servers"]["Minecraft"]["Prison"]['Online'] = (string) "OFFLINE";
}
$ar["Servers"]["Minecraft"]["Prison"]['onlineCount'] = (string) $json11['players']['online'];
$ar["Servers"]["Minecraft"]["Prison"]['maxCount'] = (string) $json11['players']['max'];
$ar["Servers"]["Minecraft"]["Prison"]['Version'] = (string) $json11['version'];
$ar["Servers"]["Minecraft"]["Prison"]['serverType'] = (string) $json11['software'];

//ARK API!
$ar["Servers"]["ARK Survival Evolved"]["Name"] = (string) $json4['players']['online'];

//$ar = array('title' => $song, 'listeners' => $listerners, 'streamtitle' => $title);
echo json_encode($ar); // ["apple","orange","banana","strawberry"]
?>
