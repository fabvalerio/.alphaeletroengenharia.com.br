

<link rel="stylesheet" href="<?=$url?>assets/css/colorbox.css" />
<script src="<?=$url?>assets/js/jquery.colorbox.js" type="application/javascript" language="javascript"></script>
<script>
	var $colorbox = jQuery.noConflict(); 
	$colorbox(document).ready(function(){
		//Examples of how to assign the Colorbox event to elements
		$colorbox(".group1").colorbox({rel:'group1'});
		$colorbox(".group2").colorbox({rel:'group2', transition:"fade"});
		$colorbox(".group3").colorbox({rel:'group3', transition:"none", width:"100%", height:"100%"});
		$colorbox(".group4").colorbox({rel:'group4', slideshow:false});
		$colorbox(".ajax").colorbox();
		$colorbox(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
		$colorbox(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
		$colorbox(".iframe").colorbox({iframe:true, width:"90%", height:"90%"});
		$colorbox(".yframe").colorbox({iframe:true, width:700, height:490});
		$colorbox(".inline").colorbox({inline:true, width:"50%"});
		/*$colorbox(".callbacks").colorbox({
			onOpen:function(){ alert('onOpen: colorbox is about to open'); },
			onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
			onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
			onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
			onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
		});

		$colorbox('.non-retina').colorbox({rel:'group5', transition:'none'})
		$colorbox('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
		
		//Example of preserving a JavaScript event for inline calls.
		$colorbox("#click").click(function(){ 
			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});*/
	});
</script>