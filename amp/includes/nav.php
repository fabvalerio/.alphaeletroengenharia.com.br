<amp-sidebar id="header-sidebar" class="ampstart-sidebar px3  " layout="nodisplay">
	<div class="flex justify-start items-center ampstart-sidebar-header">
		<div role="button" aria-label="close sidebar" on="tap:header-sidebar.toggle" tabindex="0" class="ampstart-navbar-trigger items-start">✕</div>
	</div>
	<nav class="ampstart-sidebar-nav ampstart-nav">
		<ul class="list-reset m0 p0 ampstart-label">
			<li class="ampstart-ampstart-faq-item py-3"><a class="ampstart-nav-link" href="<? echo $url; ?>">Home</a></li>

			<!-- <li class="ampstart-ampstart-faq-item ampstart-nav-dropdown relative ">

				Start Dropdown-inline 
				<amp-accordion layout="container" disable-session-states="" class="ampstart-dropdown">
					<section>
						<header>Fashion</header>
						<ul class="ampstart-dropdown-items list-reset m0 p0">
							<li class="ampstart-dropdown-item"><a href="#" class="text-decoration-none">Styling Tips</a></li>
							<li class="ampstart-dropdown-item"><a href="#" class="text-decoration-none">Designers</a></li>
						</ul>
					</section>
				</amp-accordion>
				End Dropdown-inline
            </li> -->


				<?
				/*MENU*/
				$__navMenu = new db();
				$__navMenu->query( " SELECT DISTINCT menu.menu_id, 
					menu.menu_titulo, 
					menu.menu_link, 
					paginas.menu_menu_id, 
					menu.menu_sem_categoria
					FROM        menu
					INNER JOIN  paginas
					ON          paginas.menu_menu_id = menu.menu_id
					WHERE       menu.menu_status = '1' 
					AND         paginas.menu_menu_id IS NOT NULL
					ORDER BY    menu.menu_order ASC " );
				$__navMenu->execute();

				/*LISTA MENU*/
				if( !empty($__navMenu->rowCount()) ){
					foreach( $__navMenu->row() AS $__navMenuRow ){

						/*Conf*/
						$__NavMenuHref   = !empty( $__navMenuRow['menu_redirecionar'] ) ? $__navMenuRow['menu_redirecionar'] : $url.$__navMenuRow['menu_link'] ;

						if( $__navMenuRow['menu_sem_categoria'] != '1' ){
							$__NavDropClass = 'ampstart-dropdown-items list-reset m0 p0';
							$__NavDropData  = 'data-toggle="dropdown" data-submenu=""';
						}

						/*Categoria*/
						$__navCat = new db();
						$__navCat->query( "SELECT DISTINCT paginas_categoria.cat_id, 
							paginas_categoria.cat_titulo, 
							paginas_categoria.cat_link, 
							paginas_categoria.cat_menu,  
							paginas.categoria_cat_id
							FROM        paginas_categoria 
							INNER JOIN  paginas
							ON          paginas.categoria_cat_id = paginas_categoria.cat_id
							WHERE       paginas_categoria.cat_status = '1' 
							AND         paginas_categoria.cat_menu = '{$__navMenuRow['menu_id']}'
							ORDER BY    paginas_categoria.cat_titulo ASC" );
						$__navCat->execute();

						/*Se categoria for vazia, tirar o dropdown*/
						if( empty($__navCat->rowCount()) ){
							$__NavDropData = '';
							$__NavDropClass = '';
						}
						?>

						<!--  MENU  -->
						<li class="ampstart-ampstart-faq-item <? if( $link[0] == $__navMenuRow['menu_link'] ) echo 'active';?> dropdown py-3">
							<a href="<? echo $__NavMenuHref; ?>" class="ampstart-nav-link <? echo $__NavDropClass; ?>" <? echo $__NavDropData;?>>
								<? echo $__navMenuRow['menu_titulo'] ?>
							</a>

							<?
							/*MENU ANULA A CATEGORIA*/
							if( $__navMenuRow['menu_sem_categoria'] != '1' ){
								if( $__navCat->rowCount() > 0 ){
									?>

									<!--  CATEGORIA  -->
									<ul class="dropdown-menu">

										<?
										/*LISTA CATEGORIA*/
										foreach( $__navCat->row() AS $__navCatRow ){

											/*SUBCATEGORIA*/
											$__navSubCat = new db();
											$__navSubCat->query( "SELECT DISTINCT sub.sub_id, 
												sub.categoria_cat_id, 
												sub.sub_link,
												sub.sub_titulo,  
												paginas.subcategoria_sub_id
												FROM        paginas_subcategoria as sub
												INNER JOIN  paginas
												ON          paginas.subcategoria_sub_id = sub.sub_id
												WHERE       sub.categoria_cat_id = '{$__navCatRow['cat_id']}'
												AND         paginas.subcategoria_sub_id <> '0'
												ORDER BY    sub.sub_titulo ASC" );
											$__navSubCat->execute();


											/*conf*/
											$__LinkCatHref = $url.$__navMenuRow['menu_link'].'/categoria/'.$__navCatRow['cat_link'];
											if( !empty($__navSubCat->rowCount()) ) $__NavDropClassSub = 'dropdown-submenu';
											if( !empty($__navSubCat->rowCount()) ) $__NavDropClassSubMenu = 'dropdown-menu';

											?>
											<li class="<? echo $__NavDropClassSub; ?>">
												<? if($__NavDropClassSub != 'dropdown-submenu'){ ?>
													<a class="text-decoration-none" href="<? echo $__LinkCatHref; ?>">
													<? }else{ ?>
														<div class="text-decoration-none d-flex justify-content-center">
														<? } ?>
														<? echo $__navCatRow['cat_titulo']?>
														<? if($__NavDropClassSub != 'dropdown-submenu'){ ?>
														</a>
													<? }else{ ?>
														<i class="fas fa-caret-right ml-auto"></i>
													</div>
												<? } ?>

												<? 
												/* Se a subcategoria tiver vazia, ocultar*/
												if( !empty($__navSubCat->rowCount()) ){
													?>

													<!--  SUBCATEGORIA  -->
													<ul class="<? echo $__NavDropClassSubMenu; ?>">

														<?
														foreach( $__navSubCat->row() AS $row ){
															/*conf*/
															$__LinkSubHref = $url.$__navMenuRow['menu_link'].'/subcategoria/'.$row['sub_link'].'/'.$__navCatRow['cat_link'];
															?>
															<li><a href="<? echo $__LinkSubHref; ?>" class="text-decoration-none"><? echo $row['sub_titulo'] ?></a></li>
															<?
															/*LIMPAR*/
															$__LinkSubHref  = '';
														}
														?>
													</ul>
													<?
												}
												?>
											</li>
											<?

											/*LIMPAR*/
											$__LinkCatHref     = '';
											$__NavDropClassSub = '';
										}
										?>
									</ul>
									<?
								}
							}
							?>
						</li>
						<?
						/*LIMPAR*/
						$__NavDorpClass = '';
						$__NavDropData  = '';

					}
				}
				?>



			</ul>

		</nav>
	</amp-sidebar>