<div class="container">
	<div class="row">
    	<div class="col-lg-offset-4 col-lg-4 login-box">
       	<div class="welcome-note">Welcome To Login</div>
        <div class="form-div">
        
			<?php echo $this->Form->create ( 'User', array ('enctype' => 'multipart/form-data','class' => '' ) ); ?>
			
				<div class="form-group custom-from-pad">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<?php
						echo $this->Form->input ( 'login_username', 
						array ("class" => "form-control",
								'type' => 'text',
								'placeholder' => 'Username',
								'autocomplete' => 'off',
								'label' => '',
								
						) );
						?>
						
					</div>
					
				</div>
				
				<div class="form-group custom-from-pad">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<?php
						echo $this->Form->input ( 'login_password', 
						array ("class" => "form-control",
								'type' => 'password',
								'placeholder' => 'Password',
								'autocomplete' => 'off',
								'label' => '',
								
						) );
						?>
						
						
					</div>
				
				</div>
				<div class="text-right"><a href="<?php echo Router::url('/', true); ?>admin/forgot_password" class="for-pass">Forgot Password?</a></div>
				<div class="form-group custom-from-pad">
					<button type="submit" class="btn btn-primary btn-block btn-login action-btn">
						<i class="entypo-login"></i>
						Login
					</button>
				</div>
				
				
			
				
						
			</form>	
        </div>
        </div>
       
    </div>
   
</div>

