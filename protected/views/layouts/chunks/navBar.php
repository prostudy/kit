<!-- Left links for user info navbar -->
				<ul class="user-info-menu left-links list-inline list-unstyled">
			
					<li class="hidden-sm hidden-xs">
						<a href="#" data-toggle="sidebar">
							<i class="fa-bars"></i>
						</a>
					</li>
			
					<?php $notifications = UsersDao::getInstance()->getNotifications();?>
					<li class="dropdown hover-line">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa-bell-o"></i>
							<span class="badge badge-purple"><?= count($notifications) ?></span>
						</a>
						<ul class="dropdown-menu notifications">
							<li class="top">
								<p class="small">
									Se han enviado <strong><?= count($notifications) ?></strong> anunicios.
								</p>
							</li>
							
							<li>
								<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
								
								<?php 
									
									foreach($notifications as $notification){?>
									<li class="	 <?= $notification['color']?>">
										<a href="#">
											<i class="<?= $notification['icon']?>"></i>
											
											<span class="line">
												<strong><?= $notification['title']?></strong>
											</span>
											
											<span class="line small time">
												<?= $notification['description']?>
											</span>
										</a>
									</li>
									<?php }?>
								</ul>
							</li>
							
							<li class="external">
								<a href="">
									<span>Notificaciones enviadas por NYCE</span>
									<i class="fa-link-ext"></i>
								</a>
							</li>
						</ul>
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
							<li>
								<a href="#edit-profile">
									<i class="fa-edit"></i>
									New Post
								</a>
							</li>
							<li>
								<a href="#settings">
									<i class="fa-wrench"></i>
									Settings
								</a>
							</li>
							<li>
								<a href="#profile">
									<i class="fa-user"></i>
									Profile
								</a>
							</li>
							<li>
								<a href="#help">
									<i class="fa-info"></i>
									Help
								</a>
							</li>
							<li class="last">
								<a href="<?php echo Yii::app()->createAbsoluteUrl("Site/close"); ?>">
									<i class="fa-sign-out"></i>
									Cerrar mi sesión
								</a>
							</li>
						</ul>
					</li>
			
					<li>
						<a href="#" data-toggle="chat">
							<i class="fa-comments-o"></i>						<span>3</span>
							
						</a>
					</li>
			
				</ul>