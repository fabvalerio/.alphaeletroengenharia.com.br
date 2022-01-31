<?

function tags($var, $url){

	if( isset($var) ){
		$tasList = @explode(',', $var);

		if( !empty($tasList) ){
			foreach ($tasList as $val) {
				$montar[] = "<a href=\"{$url}tag/".urlencode(trim($val))."\">".trim($val)."</a>";
			}
	    }
	}
   
    $montar = @implode(', ', $montar);


	return $montar;

}

?>