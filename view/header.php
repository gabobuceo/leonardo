</head>
<body>
	<header>		
		<div id='store-navbar'>
			<div class='row fila'>
				<div class='col-sm-2'>
					<a href='index.php'>
						<img class='img-responsive logoempresa' src='../static/img/storefullsma.<?php echo $_SESSION['EXT']; ?>'>
					</a>
				</div>
				<div class='store-navbar-search col-sm-6 col-xs-11'>
					<div class='row'>
						<form action='search.php' method='POST'>                
							<input class='store-navbar-input col-xs-11' placeholder='Buscar' name='search' <?php if (isset($_SESSION['buscar'])) { echo utf8_encode("value='".$_SESSION['buscar']."'");  }?> >
							<button class='store-navbar-button col-xs-1' type='submit'>
								<span class='glyphicon glyphicon-search' aria-hidden='true'></span>
							</button>
						</form>
					</div>
				</div>
				<div class='col-sm-4 store-menu'>
					<div class='navbar-right'>
						<?php
						if (isset($_SESSION['usu'])) {
							$datos_favoritos = require_once('../logica/procesarCargaFavoritos.php');
							$datos_favoritos_head = require_once('../logica/procesarCargaFavoritosHead.php');
							/*var_dump($datos_favoritos);
							echo "<br><br>";*/
							?>
							<ul class="nav navbar-nav pull-right">
								<li class="dropdown pull-left">
									<a href="javascript:void(0)" class="navbar-link store-main-button dropdown-toggle " data-toggle="dropdown">
										<span class='glyphicon glyphicon-user' aria-hidden='true'></span>
										<?php echo $_SESSION['usu']; ?>
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu">
										<li><a href="sumary.php"><i class="icon-cog"></i> Panel del Usuario</a></li>
										<li class="divider"></li>
										<li><a href="logout.php"><i class="icon-off"></i> Cerrar Sesión</a></li>
									</ul>
								</li>
								<li class="pull-left dropdown">
									<a class="navbar-link store-main-button dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-heart" aria-hidden="true"></i></a>
									<ul class="dropdown-menu dropdown-cart" role="menu">
										<?php
										if (isset($datos_favoritos["this"])) {
											?>
											<li>
												<span class="item">
													<span class="item-left">
														<span class="item-info-2">
															<span>No tienen favoritos.<br>Agrega tus favoritos y síguelos desde acá.</span>
														</span>
													</span>
												</span>
											</li>
											<?php
										}else{
											for ($i=0; $i < count($datos_favoritos_head); $i++) { 
												?>
												<form action="../logica/procesarBajaFavoritos.php" method="POST">
													<li>
														<a href="../view/publication.php?id=<?php echo $datos_favoritos[$i]['IDPUBLICACION']; ?>">
														<span class="item">
															<span class="item-left">
																<img src="../imagenes/<?php echo $datos_favoritos_head[$i]['IMGDEFAULT']; ?>_tn.<?php echo $_SESSION['EXT']; ?>" onerror="this.onerror=null;this.src='../static/img/noimage_tn.<?php echo $_SESSION['EXT'];  ?>  alt="" />
																<span class="item-info">
																	<span><?php echo $datos_favoritos_head[$i]['TITULO']; ?></span>
																	<span>$ <?php echo $datos_favoritos_head[$i]['PRECIO']; ?></span>
																</span>
															</span>
															<span class="item-right">
																<button name="idfavorito" type="submit" class="btn btn-xs btn-danger pull-right" value="<?php echo $datos_favoritos_head[$i]['IDPUBLICACION']; ?>">
																	<i class="fa fa-trash"></i>
																</button>
															</span>
														</span>
													</a>
													</li>
												</form>
												<?php
											}
											?>
											<li class="divider"></li>
											<li><a class="text-center" href="../view/myfavorites.php">Ver todos tus Favoritos</a></li>
											<?php
										}
										?>
										
									</ul>
								</li>
								<li class="pull-left">
									<a class="store-main-button" href="javascript:void(0)"><i class="fa fa-bell" aria-hidden="true"></i></a>
								</li>
								<li class="pull-left  borleft">
									<a class="store-main-button" href="sell.php"><i class="fa fa-usd" aria-hidden="true"></i> Vender</a>
								</li>
							</ul>
							<?php
						}else{
							?>
							<a href='login.php' class='navbar-link store-main-button'>
								<span class='glyphicon glyphicon-user' aria-hidden='true'></span> 
								Entrar
							</a>
							/
							<a href='register.php' class='navbar-link store-main-button'>
								<span class='glyphicon glyphicon-search' aria-hidden='true'></span> 
								Registrarse
							</a>
							<?php
						}
						?>						
					</div>
				</div>
			</div>
		</div>
	</header>