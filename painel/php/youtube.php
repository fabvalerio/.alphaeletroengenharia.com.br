<?

//
//echo youtube('http://www.youtube.com/watch?v=02qbCIoZM2Y', 800, 600);
function url_youtube($video)
{

   
   $urlVideo = @str_replace('v=', '', @strstr($video, 'v='));
   $urlVideo = reset(@explode('&', $urlVideo));
   $urlVideoBarra = substr($urlVideo, -1); 
   if( $urlVideoBarra == '/' ){ $urlVideo = substr($urlVideo, 0, -1); }
   return $urlVideo;
}


function youtube($video, $x, $y)
{
    
   $urlVideo = @str_replace('v=', '', @strstr($video, 'v='));
   $urlVideo = reset(@explode('&', $urlVideo));
   $urlVideoBarra = substr($urlVideo, -1); 
   if( $urlVideoBarra == '/' ){ $urlVideo = substr($urlVideo, 0, -1); }
	
	$montar = '<div id="player"></div>

    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement(\'script\');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName(\'script\')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player(\'player\', {
          height: \''.$y.'\',
          width: \''.$x.'\',
          videoId: \''.$urlVideo.'\',
          events: {
            
            \'onStateChange\': onPlayerStateChange,
			\'showInfo\': false,
          }
        });
      }

      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player\'s state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script>';
	
	
	return $montar ;

}


function youtube_image($video)
{
    $url =  @str_replace('v=', '', @strstr($video, 'v='));
	  $url = reset(@explode('&', $url));
    
   $urlVideoBarra = substr($url, -1); 
   if( $urlVideoBarra == '/' ){ $url = substr($urlVideo, 0, -1); }
	
	return 'http://i4.ytimg.com/vi/'.$url.'/mqdefault.jpg';
}
?>