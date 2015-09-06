<!-- Left links for user info navbar -->
				<ul class="user-info-menu left-links list-inline list-unstyled">
			
					<li class="hidden-sm hidden-xs">
						<a href="#" data-toggle="sidebar">
							<i class="fa-bars"></i>
						</a>
					</li>
			
					
				</ul>
			
			
				<!-- Right links for user info navbar -->
				<ul class="user-info-menu right-links list-inline list-unstyled">
							<li class="search-form always-visible"><!-- You can add "always-visible" to show make the search input visible -->
			
						<form name="userinfo_search_form" method="get" action="<?php echo Yii::app()->createAbsoluteUrl("Article/searchArticle"); ?>">
							<input type="text" name="s" class="form-control search-field" placeholder="Buscar..." />
			
							<button type="submit" class="btn btn-link">
								<i class="linecons-search"></i>
							</button>
						</form>
			
					</li>
			
					<li class="dropdown user-profile">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="assets/images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
							<span>
								<?php echo Yii::app()->session['name']." ".Yii::app()->session['lastname'];?>
								<i class="fa-angle-down"></i>
							</span>
						</a>
			
						<ul class="dropdown-menu user-profile-menu list-unstyled">
							<li class="last">
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Site/close"); ?>">
									<i class="fa-sign-out"></i>
									Cerrar mi sesión
								</a>
							</li>
						</ul>
					</li>
			
					
			
				</ul>