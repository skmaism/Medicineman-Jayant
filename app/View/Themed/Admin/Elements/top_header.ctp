<!-- BEGIN HEADER -->
<?php
$user = $this->Session->read("Auth.User");
$CurrentUsersSettings	=	$this->requestAction('/users/getSettings');

?>
<div class="row">
	
	<!-- Profile Info and Notifications -->
	<div class="col-md-6 col-sm-8 clearfix">
		
		<ul class="user-info pull-left pull-none-xsm">
		
						<!-- Profile Info -->
			<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php if(isset($user['image_path']) && !empty($user['image_path'])){ ?>
						<img src="<?php echo Router::url('/', true); ?><?php echo $user['image_path']; ?>" alt="" class="img-circle" width="44" />
					<?php }else{ ?>
					<img src="<?php echo Helper::webroot(''); ?>assets/images/icon-user.png" alt="" class="img-circle" width="44" />
					<?php } ?>
					
					<?php echo ucwords($user['name']); ?>
				</a>
				
				
			</li>
			
			
		
		</ul>
		
		
				
	
	</div>
	
	
	<!-- Raw Links -->
	<div class="col-md-6 col-sm-4 clearfix ">
		
		<ul class="list-inline links-list pull-right hidden-xs">
			
			<li class="hidden-xs">
				<a href="#">
					<i class="entypo-chat"></i>
					Live Site
					
					<span class="badge badge-success chat-notifications-badge is-hidden">0</span>
				</a>
			</li>
			
			<li class="sep"></li>
			
			
			
			
		</ul>
		
		
		
	</div>
	
	
	
	
</div>

<hr/>
<?php 
if($user['role_id'] == 8){ 
$notifyorders	=$this->requestAction('/inventories/driverinventorynotify'); 
if(!empty($notifyorders)){
foreach($notifyorders as $key => $value) { //echo '<pre>'; print_r($value); exit; ?>

<script>
var site_url	=	"<?php echo $this->base; ?>";
if("Notification" in window){
		let ask = Notification.requestPermission();
		ask.then(permission =>{        if( permission == "granted"){
			let msg = new Notification("", {
				body: 'New product assign to you, please check.',
				icon: "img/no_image.jpg"
			});
			msg.onclick = function () {
				window.location.href =site_url+"/admin/inventories";
			 // window.open(site_url+"/admin/orders");
			};
		}
	});
}
</script>
<?php }}else{?>
<script>
if("Notification" in window){
		let ask = Notification.requestPermission();
		ask.then(permission =>{        if( permission == "granted"){
			
		}
	});
}
</script>
<?php }
$this->requestAction('/inventories/setseennotify'); 
} ?>