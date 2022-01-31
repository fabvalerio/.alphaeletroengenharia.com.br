<?

   function capa( $img )
   {
	   if( is_file($img) )
	   {
		   $visImgCapa = '<i class="fa fa-check" style="color:green; font-size:30px"></i>';
	   }
	   else
	   {
		   $visImgCapa = '<i class="fa fa-times" style="color:red; font-size:30px"></i>';
	   }
	   
	   return $visImgCapa;
   }

?>