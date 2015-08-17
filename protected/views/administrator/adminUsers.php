<div class="page-title">
			
				<div class="title-env">
					<h1 class="title">Usuarios registrados</h1>
					<p class="description">Se pueden visualizar todos los usuarios registrados.</p>
				</div>
				<?php require_once 'subMenuAdmin.php';?>
</div>



<div class="row">
			
				<div class="col-md-12">
			
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#all" data-toggle="tab">Todos los usuarios</a>
						</li>
					</ul>
			
					<div class="tab-content">
						<div class="tab-pane active" id="all">
			
							<table class="table table-hover members-table middle-align">
								<thead>
									
								</thead>
								<tbody>
								<?php foreach($allCodesAsigned as $row) {?>
									<tr>
										<td class="user-image hidden-xs hidden-sm">
											<a href="#">
												<img src="assets/images/user-1.png" class="img-circle" alt="user-pic">
											</a>
										</td>
										<td class="user-name">
											<a href="#" class="name"><?= $row['name']?> <?= $row['lastname']?></a>
											<span><?= $row['account_active'] == 1 ? "<span class='badge badge-roundless badge-success'>".$row['code']."</span>" :"<span class='badge badge-roundless badge-danger'>".$row['code']."</span>" ?> / <?= $row['duration'] == 0  ? $row['isadmin']== 1 ? 'ADMIN' : 'VENDIDO' : $row['duration'] ?></span>
										</td>
										<td class="hidden-xs hidden-sm">
										<div>Activación: <?= $row['activation_date']?></div>
										</td>
										<td>
											<?= $row['lastlogin']?>
										</td>
										<td class="action-links">
											<a href="<?php echo Yii::app()->createAbsoluteUrl("Administrator/editUser&iduser=".$row['idusers']); ?>" class="edit">
												<i class="linecons-pencil"></i>
												Edit Profile
											</a>
			
											<!-- <a href="#" class="delete">
												<i class="linecons-trash"></i>
												Delete
											</a> -->
										</td>
									</tr>
									<?php }?>
								</tbody>
							</table>
			
							<!-- <div class="row">
								<div class="col-sm-6">
			
									<div class="members-table-actions">
										<div class="selected-items">
											<span>2</span>
											members selected
										</div>
			
										<div class="selected-actions">
											<a href="<?php echo Yii::app()->createUrl('Administrator/editUser');?>" class="edit">Edit Profile</a>
											or
											<a href="#" class="delete">Delete</a>
										</div>
									</div>
			
								</div>
								<div class="col-sm-6 text-right text-center-sm">
									<ul class="pagination pagination-sm no-margin">
										<li>
											<a href="#">
												<i class="fa-angle-left"></i>
											</a>
										</li>
										<li class="active">
											<a href="#">1</a>
										</li>
										<li>
											<a href="#">2</a>
										</li>
										<li>
											<a href="#">3</a>
										</li>
										<li class="disabled">
											<a href="#">4</a>
										</li>
										<li>
											<a href="#">5</a>
										</li>
										<li>
											<a href="#">6</a>
										</li>
										<li>
											<a href="#">
												<i class="fa-angle-right"></i>
											</a>
										</li>
									</ul>
								</div>
							</div> -->
			
						</div>
			

					</div>
			
				</div>
			
			</div>