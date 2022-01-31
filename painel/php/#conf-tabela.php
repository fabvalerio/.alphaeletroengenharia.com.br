
    <link rel="stylesheet" type="text/css" href="<?=url?>js/table/css/jquery.dataTables.css">

	</style>
	<script type="text/javascript" language="javascript" src="<?=url?>js/table/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="<?=url?>js/table/js/jquery.dataTables.js"></script>
	
	
	<script type="text/javascript" language="javascript" class="init">
		var $tb = jQuery.noConflict(); 
		$tb(document).ready(function() {
			$tb('#table').DataTable();
		} );
	</script>
