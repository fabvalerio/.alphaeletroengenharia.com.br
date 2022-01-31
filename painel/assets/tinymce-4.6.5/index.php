
<script src="<? echo $url?>assets/tinymce-4.6.5/js/tinymce/tinymce.min.js"></script>
<script>

	tinymce.init({
		selector: 'textarea',
		language: 'pt_BR',
		height: 300,
		theme: 'modern',


	/* HTML --------------------------------------------------------------------------------------------------------*/
	plugins: 'image visualblocks',


	content_css: [
	'<? echo $url;?>assets/tinymce-4.6.5/css/bootstrap.min.css',
	'<? echo $url;?>assets/tinymce-4.6.5/css/codepen.min.css',
	'http://fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
	'https://use.fontawesome.com/releases/v5.7.1/css/all.css'
	],


	style_formats: [
	{ title: 'Headers', items: [
	{ title: 'h1', block: 'h1' },
	{ title: 'h2', block: 'h2' },
	{ title: 'h3', block: 'h3' },
	{ title: 'h4', block: 'h4' },
	{ title: 'h5', block: 'h5' },
	{ title: 'h6', block: 'h6' }
	] },

	{ title: 'Blocks', items: [
	{ title: 'p', block: 'p' },
	{ title: 'div', block: 'div' },
	{ title: 'pre', block: 'pre' }
	] },

			    /*{ title: 'Divisor', items: [
			      { title: 'hr', block: 'hr' }
			      ] },*/

			      { title: 'Containers', items: [
			      { title: 'section', block: 'section', wrapper: true, merge_siblings: false },
			      { title: 'article', block: 'article', wrapper: true, merge_siblings: false },
			      { title: 'blockquote', block: 'blockquote', wrapper: true },
			      { title: 'hgroup', block: 'hgroup', wrapper: true },
			      { title: 'aside', block: 'aside', wrapper: true },
			      { title: 'figure', block: 'figure', wrapper: true }
			      ] }
			      ],
			      visualblocks_default_state: true,
			      end_container_on_empty_block: true,

			      /* FIM HTML*/

			      /* IMAGEM -----------------------------------------------------------------------------------------------------------------*/

			      image_title: true,
			      automatic_uploads: true,
			      images_upload_url: 'assets/tinymce-4.6.5/postAcceptor.php',
			      file_picker_types: 'image', 
			      images_upload_base_path: 'images-json/',
			      images_upload_credentials: true,

			      paste_as_text: true,
			      paste_data_images: true,

			      image_class_list: [
			      {title: 'None', value: ''},

			      {title: 'Responsivo', value: 'img-fluid'},
			      ],


			      image_list: function(success) {
			      	success([

			      		<?
			      		$pasta = 'images-json/';
			      		$arquivos = glob("$pasta{*.jpg,*.png,*.gif}", GLOB_BRACE);
			      		foreach($arquivos as $img){
			      			$imgName = @end( @explode('/', $img) );
			      			echo "{title: '".$imgName."', value: '".$url.$pasta.$imgName."'},";
			      		}
			      		?>


             //{title: 'Dog', value: 'http://evoluecomex.com.br/imagens/brasil.png'},
             ]);
			      },


			  // and here's our custom image picker
			  file_picker_callback: function(cb, value, meta) {
			  	var input = document.createElement('input');
			  	input.setAttribute('type', 'file');
			  	input.setAttribute('accept', 'image/*');

			    // https://www.tinymce.com/docs/configure/file-image-upload/#images_upload_url

			    input.onchange = function() {
			    	var file = this.files[0];

			    	var reader = new FileReader();
			    	reader.readAsDataURL(file);
			    	reader.onload = function () {
			        // Note: Now we need to register the blob in TinyMCEs image blob
			        // registry. In the next release this part hopefully won't be
			        // necessary, as we are looking to handle it internally.
			        var id = 'blobid' + (new Date()).getTime();
			        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
			        var base64 = reader.result.split(',')[1];
			        var blobInfo = blobCache.create(id, file, base64);
			        blobCache.add(blobInfo);

			        // call the callback and populate the Title field with the file name
			        cb(blobInfo.blobUri(), { title: file.name });
			    };
			};

			input.click();
		},

		/* Fim Imagem*/

		/*  Botões extras --------------------------------------------------------------------------------------------------*/
		/*
			Desativados: print fullscreen
			*/
			plugins: [
			'advlist autolink lists link image charmap preview anchor',
			'searchreplace visualblocks code ',
			'insertdatetime media table contextmenu paste code',
			'template paste textcolor colorpicker textpattern imagetools toc'
			],
			toolbar: 'undo redo | insert | bold italic | fontselect fontsizeselect | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | bootstrap | colunas | botoes | div_color | div_espaco | icones | formularios | display',


		  // | styleselect | preview

		  /* Fim do Botões */

		  /*Menu adiciona ---------------------------------------------------------------------------------------------------------------*/
			//toolbar: 'colunas',

			setup: function(editor) {
				editor.addButton('colunas', {
					type: 'menubutton',
					text: 'Colunas',
					menu: [{
						text: '1 Coluna [COL-12]',
						onclick: function() {
							editor.insertContent(
								'<div class="row my-2">'+
								'<div class="col-12";>COL1</div>'+
								'</div>'+
								'<br>'
								);
						}
					},

					{
						text: '2 Colunas [COL-MD-6]',
						onclick: function() {
							editor.insertContent(
								'<div class="row my-2">'+
								'<div class="col-md-6 col-xs-12";>COL1</div>'+
								'<div class="col-md-6 col-xs-12";>COL2</div>'+
								'</div>'+
								'<br>'
								);
						}
					}, 

					{
						text: '2 Colunas [COL-MD-3 / 9]',
						onclick: function() {
							editor.insertContent(
								'<div class="row my-2">'+
								'<div class="col-md-3 col-xs-12";>COL1</div>'+
								'<div class="col-md-9 col-xs-12";>COL2</div>'+
								'</div>'+
								'<br>'
								);
						}
					}, 

					{
						text: '2 Colunas [COL-MD-9 / 3]',
						onclick: function() {
							editor.insertContent(
								'<div class="row my-2">'+
								'<div class="col-md-9 col-xs-12";>COL2</div>'+
								'<div class="col-md-3 col-xs-12";>COL1</div>'+
								'</div>'+
								'<br>'
								);
						}
					}, 

					{
						text: '3 Colunas [COL-MD-4]',
						onclick: function() {
							editor.insertContent(
								'<div class="row my-2">'+
								'<div class="col-md-4 col-xs-12";>COL1</div>'+
								'<div class="col-md-4 col-xs-12";>COL2</div>'+
								'<div class="col-md-4 col-xs-12";>COL3</div>'+
								'</div>'+
								'<br>'
								);
						}
					}, 

					{
						text: '3 Colunas [COL-MD-2 / 8 / 2]',
						onclick: function() {
							editor.insertContent(
								'<div class="row my-2">'+
								'<div class="col-md-2 col-xs-12";>COL1</div>'+
								'<div class="col-md-8 col-xs-12";>COL2</div>'+
								'<div class="col-md-2 col-xs-12";>COL3</div>'+
								'</div>'+
								'<br>'
								);
						}
					}, 

					{
						text: '4 Colunas [COL-MD-3]',
						onclick: function() {
							editor.insertContent(
								'<div class="row my-2">'+
								'<div class="col-md-3 col-xs-12";>COL1</div>'+
								'<div class="col-md-3 col-xs-12";>COL2</div>'+
								'<div class="col-md-3 col-xs-12";>COL3</div>'+
								'<div class="col-md-3 col-xs-12";>COL4</div>'+
								'</div>'+
								'<br>'
								);
						}
					}, 

					{
						text: '6 Colunas [COL-MD-2]',
						onclick: function() {
							editor.insertContent(
								'<div class="row my-2">'+
								'<div class="col-md-2 col-xs-12";>COL1</div>'+
								'<div class="col-md-2 col-xs-12";>COL2</div>'+
								'<div class="col-md-2 col-xs-12";>COL3</div>'+
								'<div class="col-md-2 col-xs-12";>COL4</div>'+
								'<div class="col-md-2 col-xs-12";>COL5</div>'+
								'<div class="col-md-2 col-xs-12";>COL6</div>'+
								'</div>'+
								'<br>'
								);
						}
					}, 

					{
						text: '12 Colunas [COL-MD-1]',
						onclick: function() {
							editor.insertContent(
								'<div class="row my-2">'+
								'<div class="col-md-1 col-xs-12";>COL1</div>'+
								'<div class="col-md-1 col-xs-12";>COL2</div>'+
								'<div class="col-md-1 col-xs-12";>COL3</div>'+
								'<div class="col-md-1 col-xs-12";>COL4</div>'+
								'<div class="col-md-1 col-xs-12";>COL5</div>'+
								'<div class="col-md-1 col-xs-12";>COL6</div>'+
								'<div class="col-md-1 col-xs-12";>COL7</div>'+
								'<div class="col-md-1 col-xs-12";>COL8</div>'+
								'<div class="col-md-1 col-xs-12";>COL9</div>'+
								'<div class="col-md-1 col-xs-12";>COL10</div>'+
								'<div class="col-md-1 col-xs-12";>COL11</div>'+
								'<div class="col-md-1 col-xs-12";>COL12</div>'+
								'</div>'+
								'<br>'
								);
						}
					}
					]
				});

				editor.addButton('div_color', {
					type: 'menubutton',
					text: 'Plano de Fundo',
					menu: [
					{ text: 'Azul'   , onclick: function() { editor.insertContent( '<div class="p-3 bg-primary text-white"><br></div>'+'<br>' ); } },
					{ text: 'Cinza' , onclick: function() { editor.insertContent( '<div class="p-3 bg-secondary text-white "><br></div> ' ); } } ,
					{ text: 'Verde'   , onclick: function() { editor.insertContent( '<div class="p-3 bg-success text-white"><br></div>'+'<br>' ); } },
					{ text: 'Vermelho'    , onclick: function() { editor.insertContent( '<div class="p-3 bg-danger text-white"><br></div>'+'<br>' ); } },
					{ text: 'Amarelo'   , onclick: function() { editor.insertContent( '<div class="p-3 bg-warning text-white"><br></div>'+'<br>' ); } },
					{ text: 'Azul Claro'      , onclick: function() { editor.insertContent( '<div class="p-3 bg-info text-white"><br></div>'+'<br>' ); } },
					{ text: 'Cinza Claro'     , onclick: function() { editor.insertContent( '<div class="p-3 bg-light text-dark"><br></div>'+'<br>' ); } },
					{ text: 'Preto'      , onclick: function() { editor.insertContent( '<div class="p-3 bg-dark text-white"><br></div>'+'<br>' ); } },
					{ text: 'Branco'     , onclick: function() { editor.insertContent( '<div class="p-3 bg-white text-dark"><br></div>'+'<br>' ); } },
					]
				});

				editor.addButton('display', {
					type: 'menubutton',
					text: 'Displays',
					menu: [
					{ text: 'Display-1', onclick: function() { editor.insertContent( '<p class="display-1">#texto</p>'+'<br>' ); } },
					{ text: 'Display-2', onclick: function() { editor.insertContent( '<p class="display-2">#texto</p>'+'<br>' ); } },
					{ text: 'Display-3', onclick: function() { editor.insertContent( '<p class="display-3">#texto</p>'+'<br>' ); } },
					{ text: 'Display-4', onclick: function() { editor.insertContent( '<p class="display-4">#texto</p>'+'<br>' ); } }
					]
				});

				editor.addButton('div_espaco', {
					type: 'menubutton',
					text: 'Margens',
					menu: [
					{ text: 'p-1 | Espaços Ambos Lados', onclick: function() { editor.insertContent( '<div class="p-1">TEXTO</div>'+'<br>' ); } },
					{ text: 'p-2 | Espaços Ambos Lados', onclick: function() { editor.insertContent( '<div class="p-2">TEXTO</div>'+'<br>' ); } },
					{ text: 'p-3 | Espaços Ambos Lados', onclick: function() { editor.insertContent( '<div class="p-3">TEXTO</div>'+'<br>' ); } },
					{ text: 'p-4 | Espaços Ambos Lados', onclick: function() { editor.insertContent( '<div class="p-4">TEXTO</div>'+'<br>' ); } },
					{ text: 'p-5 | Espaços Ambos Lados', onclick: function() { editor.insertContent( '<div class="p-5">TEXTO</div>'+'<br>' ); } },

					{ text: 'p-1 | Espaços Eixo X', onclick: function() { editor.insertContent( '<div class="px-1">TEXTO</div>'+'<br>' ); } },
					{ text: 'p-2 | Espaços Eixo X', onclick: function() { editor.insertContent( '<div class="px-2">TEXTO</div>'+'<br>' ); } },
					{ text: 'p-3 | Espaços Eixo X', onclick: function() { editor.insertContent( '<div class="px-3">TEXTO</div>'+'<br>' ); } },
					{ text: 'p-4 | Espaços Eixo X', onclick: function() { editor.insertContent( '<div class="px-4">TEXTO</div>'+'<br>' ); } },
					{ text: 'p-5 | Espaços Eixo X', onclick: function() { editor.insertContent( '<div class="px-5">TEXTO</div>'+'<br>' ); } },

					{ text: 'p-1 | Espaços Eixo Y', onclick: function() { editor.insertContent( '<div class="py-1">TEXTO</div>'+'<br>' ); } },
					{ text: 'p-2 | Espaços Eixo Y', onclick: function() { editor.insertContent( '<div class="py-2">TEXTO</div>'+'<br>' ); } },
					{ text: 'p-3 | Espaços Eixo Y', onclick: function() { editor.insertContent( '<div class="py-3">TEXTO</div>'+'<br>' ); } },
					{ text: 'p-4 | Espaços Eixo Y', onclick: function() { editor.insertContent( '<div class="py-4">TEXTO</div>'+'<br>' ); } },
					{ text: 'p-5 | Espaços Eixo Y', onclick: function() { editor.insertContent( '<div class="py-5">TEXTO</div>'+'<br>' ); } },
					]
				});

				editor.addButton('botoes', {
					type: 'menubutton',
					text: 'Botões',
					menu: [
					{ text: 'Verde', onclick: function() { editor.insertContent( '<a href="#" class="btn btn-success">TEXTO</a>'+'<br>' ); } },
					{ text: 'Vermelho', onclick: function() { editor.insertContent( '<a href="#" class="btn btn-danger">TEXTO</a>'+'<br>' ); } },
					{ text: 'Amarelo', onclick: function() { editor.insertContent( '<a href="#" class="btn btn-warning">TEXTO</a>'+'<br>' ); } },
					{ text: 'Azul', onclick: function() { editor.insertContent( '<a href="#" class="btn btn-primary">TEXTO</a>'+'<br>' ); } },
					{ text: 'Azul Claro', onclick: function() { editor.insertContent( '<a href="#" class="btn btn-info">TEXTO</a>'+'<br>' ); } },
					{ text: 'Preto', onclick: function() { editor.insertContent( '<a href="#" class="btn btn-dark">TEXTO</a>'+'<br>' ); } },

					{ text: 'Verde (borda)', onclick: function() { editor.insertContent( '<a href="#" class="btn btn-outline-success">TEXTO</a>'+'<br>' ); } },
					{ text: 'Vermelho (borda)', onclick: function() { editor.insertContent( '<a href="#" class="btn btn-outline-danger">TEXTO</a>'+'<br>' ); } },
					{ text: 'Amarelo (borda)', onclick: function() { editor.insertContent( '<a href="#" class="btn btn-outline-warning">TEXTO</a>'+'<br>' ); } },
					{ text: 'Azul (borda)', onclick: function() { editor.insertContent( '<a href="#" class="btn btn-outline-primary">TEXTO</a>'+'<br>' ); } },
					{ text: 'Azul Claro (borda)', onclick: function() { editor.insertContent( '<a href="#" class="btn btn-outline-info">TEXTO</a>'+'<br>' ); } },
					{ text: 'Preto (borda)', onclick: function() { editor.insertContent( '<a href="#" class="btn btn-outline-dark">TEXTO</a>'+'<br>' ); } },

					{ text: 'Verde (badge)', onclick: function() { editor.insertContent( '<a href="#" class="btn badge-pill badge-success">TEXTO</a>'+'<br>' ); } },
					{ text: 'Vermelho (badge)', onclick: function() { editor.insertContent( '<a href="#" class="btn badge-pill badge-danger">TEXTO</a>'+'<br>' ); } },
					{ text: 'Amarelo (badge)', onclick: function() { editor.insertContent( '<a href="#" class="btn badge-pill badge-warning">TEXTO</a>'+'<br>' ); } },
					{ text: 'Azul (badge)', onclick: function() { editor.insertContent( '<a href="#" class="btn badge-pill badge-primary">TEXTO</a>'+'<br>' ); } },
					{ text: 'Azul Claro (badge)', onclick: function() { editor.insertContent( '<a href="#" class="btn badge-pill badge-info">TEXTO</a>'+'<br>' ); } },
					{ text: 'Preto (badge)', onclick: function() { editor.insertContent( '<a href="#" class="btn badge-pill badge-dark">TEXTO</a>'+'<br>' ); } },
					]
				});

				editor.addButton('bootstrap', {
					type: 'menubutton',
					text: 'Quadros e Paragrafos',
					menu: [
					{ text: 'Paragráfo', onclick: function() { editor.insertContent( '<p>#texto</p><br>' ); } },
					{ text: 'Paragráfo Lead', onclick: function() { editor.insertContent( '<p class="lead">#texto</p><br>' ); } },
					{ text: 'Título + Sub', onclick: function() { editor.insertContent( '<div class="col-12  d-flex align-items-center"><h1>#titulo</h1><p class=" ml-3 lead">#texto</p></div><br>' ); } },
					//{ text: 'Título', onclick: function() { editor.insertContent( '<h2 class="title">#titulo</h2><br>' ); } },
					{ text: 'Quado Conteúdo Padrão', onclick: function() { editor.insertContent( '<div class="container">#SELECIONA UMA COLUNA</div><br>' ); } },
					{ text: 'Quado Conteúdo 100%', onclick: function() { editor.insertContent( '<div class="container-fluid">#SELECIONA UMA COLUNA</div><br>' ); } },
					{ text: 'Section [Azul]', onclick: function() { editor.insertContent( '<section class="bg-primary text-white">#SELECIONE CONTAINER/FLUID</section><br>' ); } },
					{ text: 'Section [Cinza]', onclick: function() { editor.insertContent( '<section class="bg-secondary text-white">#SELECIONE CONTAINER/FLUID</section><br>' ); } },
					{ text: 'Section [Verde]', onclick: function() { editor.insertContent( '<section class="bg-success text-white">#SELECIONE CONTAINER/FLUID</section><br>' ); } },
					{ text: 'Section [Vermelho]', onclick: function() { editor.insertContent( '<section class="bg-danger text-white">#SELECIONE CONTAINER/FLUID</section><br>' ); } },
					{ text: 'Section [Amarelo]', onclick: function() { editor.insertContent( '<section class="bg-warning text-dark">#SELECIONE CONTAINER/FLUID</section><br>' ); } },
					{ text: 'Section [Azul Claro]', onclick: function() { editor.insertContent( '<section class="bg-info text-white">#SELECIONE CONTAINER/FLUID</section><br>' ); } },
					{ text: 'Section [Preto]', onclick: function() { editor.insertContent( '<section class="bg-dark text-white">#SELECIONE CONTAINER/FLUID</section><br>' ); } },
					{ text: 'Section [Branco]', onclick: function() { editor.insertContent( '<section class="bg-white">#SELECIONE CONTAINER/FLUID</section><br>' ); } },
					{ text: 'Section [Cinza Claro]', onclick: function() { editor.insertContent( '<section class="bg-light">#SELECIONE CONTAINER/FLUID</section><br>' ); } },
					]
				});

				editor.addButton('formularios', {
					type: 'menubutton',
					text: 'Formulários',
					menu: [
					
					<?
					//LEITURA DE PASTA
					$page_dir = '../includes_srt_replace';
					$pages_includes = glob($page_dir."/{*.php}", GLOB_BRACE);
					if( is_dir($page_dir) ){
						if( !empty(count($pages_includes)) ){
							foreach( $pages_includes as $valPages ){
								$valPages = @end( @explode('/', $valPages) );
								$newName = strtolower('{{'.@current( @explode('.', $valPages)).'}}');
								echo '{ text: \''.$newName.'\', onclick: function() { editor.insertContent( \''.$newName.'\' ); } },';
								$newName = '';
							}
						}
					}
					?>
					]
				});

				editor.addButton('icones', {
					type: 'menubutton',
					text: 'Font Awesome',
					menu: [
					<? include('assets/tinymce-4.6.5/icones.php');?>
					]
				});

			},
			/* fim do menu adiciona*/
		});	

	</script>