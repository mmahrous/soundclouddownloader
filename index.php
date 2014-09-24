<html>
	<head>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="js/js.js"></script>
		<script type="text/javascript" src="js/jquery.number.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>SoundCloud Downloader //beta</title>
		<link rel="icon" type="image/png" href="img/icon.png">
	</head>	
	<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42808372-1', 'kodingen.com');
  ga('send', 'pageview');

</script>
		<div class="content center">
			<a class="logo center" href="/"><img  src="img/logo.png"></a>
			<form class="form" action="" method="post">
				<ul class="type">
					<li><input type="radio" class="t" name="type" value="m">Music</li>
					<li><input type="radio" class="t" name="type" value="s">Set</li>
				</ul>
				<input type="text" name="url" class="url_text" placeholder="SoundCloud URL here......">
				<input type="hidden" name="n" value="1">
				<input type="button" onclick="get_list()" class="process_btn" value="Process" >
			</form>


			<div class="data">
			
				
			</div>
			<footer>
				<ul class="footer_nav">
					<li><a href="#">About</a><span>.</span></li>
					<li><a href="#">Developer</a><span>.</span></li>
					<li><a href="#">Contact</a></li>
					
				</ul>
				<a class="egypt" href="#"><img src="img/egypt.png"></a>

			</footer>
		<script type="text/javascript">
			function get_list(){
				$('.data').html('<img src="img/loading.gif" class="loading" />')
				var type = $('.t:checked').val();
				var url = $('.url_text').val();
				if( type == 'm'){
					$.getJSON('https://api.soundcloud.com/resolve.json?client_id=b45b1aa10f1ac2941910a7f0d10f8e28&url='+url, function(data_sound) {
						var sound_id = data_sound.id;
						var title = data_sound.title;

						var lenght = (data_sound.duration)/60000;

						var file_size = (data_sound.original_content_size)/1048576;		
						$('.data').html('<div class="song"><h1>'+title+'</br>'+ $.number( lenght, 2 ) +' Min</br>'+ $.number( file_size, 2 )+' MB</h1><a href="download.php?s='+sound_id+'" class="down_btn">Download</a></div>');
						
					});
				}else if(type=='s'){
					$.getJSON('https://api.soundcloud.com/resolve.json?client_id=b45b1aa10f1ac2941910a7f0d10f8e28&url='+url, function(data_set) {
						var set_id = data_set.id;
						var set_title = data_set.title;
						$('.data').html(' ');
						$('.data').append('<div class="songs_list"><h1>Music List for ('+set_title+') set</h1><ul>');
						var tracks = data_set.tracks;
						for (i in tracks)
						{

						  var id = tracks[i].id;
							var title = tracks[i].title;
							var lenght = (tracks[i].duration)/60000;
							var file_size = (tracks[i].original_content_size)/1048576;

						  $('.songs_list ul').append('<li class="list"><h1>'+title+'</br> <span>'+ $.number( lenght, 2 ) +' Min</span></h1><a href="download.php?s='+id+'" class="list_btn down_btn">Download <span>('+ $.number( file_size, 2 ) +' MB)</span></a></li>');
						}
						
						var height= $(window).height();
	 					$("footer").css('top', height-$("footer").height()+80);
					});
					$('.data').append('</ul></div>')
				}
			}
		</script>
		</div>
	</body>
</html>