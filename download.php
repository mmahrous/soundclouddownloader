<?php

 $html=file_get_contents('https://api.soundcloud.com/tracks/'.$_GET['s'].'.json?client_id=b45b1aa10f1ac2941910a7f0d10f8e28');
  $data = json_decode($html);
  $id = $data->id;
  $file_size = $data->original_content_size;
  $title = $data->title;
  $url = file_get_contents('https://api.sndcdn.com/i1/tracks/'.$id.'/streams?client_id=b45b1aa10f1ac2941910a7f0d10f8e28');
  $data_url = json_decode($url);
  $down_url =  $data_url->http_mp3_128_url;
$track = $down_url;
        header("Content-type: application/x-file-to-save"); 
        header('Content-Length: ' . $file_size);
        header('Content-Disposition: inline; filename="'.$title.'.mp3"');
        header('X-Pad: avoid browser bug');
        header('Cache-Control: no-cache');
        readfile($track);
        exit;

	
?>