<?php
if (!empty($this->params['action']))
     $url = $this->params['action'];
else
     $url = '';
$ctrl = $this->params['controller'];


$user = $this->Session->read("Auth.User");
$CurrentUsersSettings	=	$this->requestAction('/users/getSettings');



?>
<!-- BEGIN SIDEBAR -->
<div class="sidebar-menu">
		
			
		<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="<?php echo Router::url('/', true); ?>">
					<img src="<?php echo Router::url('/', true).'img/'.$CurrentUsersSettings['Setting']['logo'];  ?>" width="120" alt="" />
				</a>
			</div>
			
						<!-- logo collapse icon -->
						
			<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
									
			
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
		</header>
				
		
		
				
		
				
		<ul id="main-menu" class="">
			
			<li class="<?php echo (($url == "admin_index") && $ctrl == "dashboard") ? "active opened active" : ""; ?>">
				<a href="<?php  echo Router::url('/', true); ?>admin/dashboard">
					<i class="entypo-gauge"></i>
					<span>Dashboard</span>
				</a>
				
			</li>
			
			
			<?php if($user['role_id'] == 1 || $user['role_id'] == 2){?>
				<li class="<?php echo (($url == "admin_index" || $url == "admin_add" || $url == "admin_edit") && $ctrl == "categories") ? "active opened active" : ""; ?>">
					<a href="<?php  echo Router::url('/', true); ?>admin/categories">
						<i class="entypo-doc-text-inv"></i>
						<span>
							Categories							
						</span>
					</a>
				</li>
				
				<li class="<?php echo (($url == "admin_index" || $url == "admin_add" || $url == "admin_product_driver" || $url == "admin_edit") && $ctrl == "products") ? "active opened active" : ""; ?>">
					<a href="<?php  echo Router::url('/', true); ?>admin/products">
						<i class="entypo-basket"></i>
						<span>
							Products							
						</span>
					</a>
				</li>
			<?php } ?>
			
			<?php if($user['role_id'] == 1 || $user['role_id'] == 2 || $user['role_id'] == 4 || $user['role_id'] == 8){?>
				
				<li class="<?php echo (($url == "admin_index" || $url == "admin_add" || $url == "admin_edit") && $ctrl == "orders") ? "active opened active" : ""; ?>">
					<a href="<?php  echo Router::url('/', true); ?>admin/orders">
						<i class="entypo-basket"></i>
						<span>
							Orders							
						</span>
					</a>
				</li>
			<?php } ?>
			
			
			<?php if($user['role_id'] == 8){?>
				
				<li class="<?php echo (($url == "admin_index" || $url == "admin_add" || $url == "admin_edit") && $ctrl == "inventories") ? "active opened active" : ""; ?>">
					<a href="<?php  echo Router::url('/', true); ?>admin/inventories">
						<i class="entypo-basket"></i>
						<span>
							Inventory							
						</span>
					</a>
				</li>
			<?php } ?>
			
			
			<?php if($user['role_id'] == 1){ ?>
			
			<li class="<?php echo (($url == "admin_index" || $url == "admin_add" || $url == "admin_edit") && $ctrl == "users") ? "active opened active" : ""; ?>">
				<a href="<?php  echo Router::url('/', true); ?>admin/users">
					<i class="entypo-users"></i>
					<span>Users</span>
				</a>
			</li>
			
			<?php } ?>
			
			<?php if($user['role_id'] == 2){ ?>
			
			<li class="<?php echo (($url == "admin_drivers" || $url == "admin_driver_product" || $url == "admin_add" || $url == "admin_edit") && $ctrl == "users") ? "active opened active" : ""; ?>">
				<a href="<?php  echo Router::url('/', true); ?>admin/users/drivers">
					<i class="entypo-users"></i>
					<span>Drivers</span>
				</a>
			</li>
			
			<?php } ?>
			
			<?php if($user['role_id'] == 4){ ?>
			
			<li class="<?php echo (($url == "admin_clients" || $url == "admin_add" || $url == "admin_edit") && $ctrl == "users") ? "active opened active" : ""; ?>">
				<a href="<?php  echo Router::url('/', true); ?>admin/users/clients">
					<i class="entypo-users"></i>
					<span>Clients</span>
				</a>
			</li>
			
			<li class="<?php echo (($url == "admin_drivers" || $url == "admin_driver_product" || $url == "admin_add" || $url == "admin_edit") && $ctrl == "users") ? "active opened active" : ""; ?>">
				<a href="<?php  echo Router::url('/', true); ?>admin/users/drivers">
					<i class="entypo-users"></i>
					<span>Drivers</span>
				</a>
			</li>
			
			<?php } ?>
			
			<?php if($user['role_id'] == 1 || $user['role_id'] == 2){ ?>
			<li class="<?php echo (($url == "admin_index" || $url == "admin_settings" || $url == "admin_edit_settings" ||  $url == "admin_drivers" || $url == "admin_driver_payroll" || $url == "admin_receptionists" || $url == "admin_receptionist_payroll") && $ctrl == "payrolls" ) ? "active opened active" : ""; ?>">
				<a href="#">
				<i class="entypo-gauge"></i>
				<span>Payroll</span>
				</a>
				<ul>
					<li class="<?php echo (($url == "admin_drivers" || $url == "admin_driver_payroll") && $ctrl == "payrolls") ? "active opened active" : ""; ?>">
						<a href="<?php  echo Router::url('/', true); ?>admin/payrolls/drivers">
							<i class="entypo-users"></i>
							<span>Drivers Payroll</span>
						</a>
					</li>
					
					<li class="<?php echo (($url == "admin_receptionists" || $url == "admin_receptionist_payroll") && $ctrl == "payrolls") ? "active opened active" : ""; ?>">
						<a href="<?php  echo Router::url('/', true); ?>admin/payrolls/receptionists">
							<i class="entypo-users"></i>
							<span>Receptionists Payroll</span>
						</a>
					</li>
					
					<li class="<?php echo (($url == "admin_index" || $url == "admin_settings" || $url == "admin_edit_settings") && $ctrl == "payrolls") ? "active opened active" : ""; ?>">
						<a href="<?php  echo Router::url('/', true); ?>admin/payrolls/settings/1">
							<i class="entypo-users"></i>
							<span>Setting</span>
						</a>
					</li>
				</ul>
				
			</li>
			
			<?php } ?>
			
			<li class="">
				<a href="<?php  echo Router::url('/', true); ?>admin/users/logout">
					<i class="entypo-logout"></i>
					<span>Log Out</span>
				</a>
			</li>
			
			
		</ul>
				
	</div>	


<!-- END SIDEBAR -->
