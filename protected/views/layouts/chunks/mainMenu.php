		<header class="logo-env">
		
					<!-- logo -->
					<div class="logo">
						<a href="<?=Yii::app()->request->baseUrl;?>" class="logo-expanded">
							<img src="http://pmstudykit.com/kitsgdp/images/nyce_logo.png" width="100%" alt="" />
						</a>
		
						<a href="<?=Yii::app()->request->baseUrl;?>" class="logo-collapsed">
							<img src="http://pmstudykit.com/kitsgdp/images/nyce_logo.png" width="100%" alt="" />
						</a>
					</div>
		
					<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
					<div class="mobile-menu-toggle visible-xs">
						<a href="#" data-toggle="user-info-menu">
							<i class="fa-bell-o"></i>
							<span class="badge badge-success">7</span>
						</a>
		
						<a href="#" data-toggle="mobile-menu">
							<i class="fa-bars"></i>
						</a>
					</div>
		
					
		
					
				</header>
				
				
						
				<ul id="main-menu" class="main-menu">
					<!-- add class "multiple-expanded" to allow multiple submenus to open -->
					<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
					
					<li>
						<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/"); ?>">
							<i class="fa-list"></i>
							<span class="title">Todos los artículos</span>
						</a>
					</li>
					<li>
						<a href="layout-variants.html">
							<i class="fa-clock-o"></i>
							<span class="title">Planificar</span>
						</a>
						<ul>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=1"); ?>">
									<span class="title">Articulo 15</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=2"); ?>">
									<span class="title">Articulo 16</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=3"); ?>">
									<span class="title">Articulo 17</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=4"); ?>">
									<span class="title">Articulo 18</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=5"); ?>">
									<span class="title">Articulo 19</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=6"); ?>">
									<span class="title">Articulo 20</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=7"); ?>">
									<span class="title">Articulo 21</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=8"); ?>">
									<span class="title">Articulo 22</span>
								</a>
							</li>
						</ul>
					</li>
					
					<?php if( !(Yii::app()->session['restricted']) ){?>
					
					<li>
						<a href="layout-variants.html">
							<i class="fa-pencil"></i>
							<span class="title">Hacer</span>
						</a>
						<ul>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=9"); ?>">
									<span class="title">Articulo 23</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=11"); ?>">
									<span class="title">Articulo 24</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=12"); ?>">
									<span class="title">Articulo 25</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=13"); ?>">
									<span class="title">Articulo 26</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=14"); ?>">
									<span class="title">Articulo 27</span>
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<a href="layout-variants.html">
							<i class="fa-check"></i>
							<span class="title">Verificar</span>
						</a>
						<ul>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=15"); ?>">
									<span class="title">Articulo 28</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=16"); ?>">
									<span class="title">Articulo 29</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=17"); ?>">
									<span class="title">Articulo 30</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=18"); ?>">
									<span class="title">Articulo 31</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=19"); ?>">
									<span class="title">Articulo 32</span>
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<a href="layout-variants.html">
							<i class="fa-bar-chart"></i>
							<span class="title">Actuar</span>
						</a>
						<ul>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=20"); ?>">
									<span class="title">Articulo 33</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=21"); ?>">
									<span class="title">Articulo 34</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=22"); ?>">
									<span class="title">Articulo 35</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=23"); ?>">
									<span class="title">Articulo 36</span>
								</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/detailArticle&idArticle=24"); ?>">
									<span class="title">Articulo 37</span>
								</a>
							</li>
						</ul>
					</li>
					<?php }else{?>
					<li>
						<a>
							<i class="fa-lock"></i>
							<span class="title"><?= Constants::CONTENT_RESTRICTED?></span>
						</a>
					</li>	
					<?php }?>
					<li>
						<a href="<?php echo Yii::app()->createAbsoluteUrl("Article/survey"); ?>">
							<i class="fa-question"></i>
							<span class="title">Cuestionario</span>
						</a>
					</li>
					
					<li>
						<a href="<?php echo Yii::app()->createAbsoluteUrl("Site/close"); ?>">
							<i class="fa-sign-out"></i>
							<span class="title">Cerrar Sesión</span>
						</a>
					</li>
					
					
					<?php if(Yii::app()->session['isadmin']){?>
						<li>
							<a href="<?php echo Yii::app()->createAbsoluteUrl("Administrator/"); ?>">
								<i class="fa-wrench"></i>
								<span class="title">Administración</span>
							</a>
					   </li>
					 <?php } ?>

				</ul>