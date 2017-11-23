<div class="container">
	<div class="row">
    	<div class="col-lg-offset-4 col-lg-4 login-box">
		<div class="forgot-title">Forgot your password</div>
		<div class="forgot-note">Enter your email below to receive your password reset instructions</div>
        <div class="form-div">
        	<?php echo $this->Form->create ( 'User', array ('enctype' => 'multipart/form-data','class' => '' ) ); ?>
				
				<div class="form-group custom-from-pad">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-mail"></i>
						</div>
						
						<?php
						echo $this->Form->input ( 'email', 
						array ("class" => "form-control",
								'type' => 'email',
								'placeholder' => 'Email',
								'autocomplete' => 'off',
								'label' => '',
								
						) );
						?>
						
					</div>
					
				</div>
				
				
				
				<div class="form-group custom-from-pad">
					<button type="submit" class="btn btn-primary btn-block btn-login action-btn">
						<i class="entypo-login"></i>
						Login
					</button>
				</div>
				
				
			<div class="text-center"><a href="<?php echo Router::url('/', true); ?>admin/login" class="for-pass">Have a account sign in</a></div>
				
						
			</form>	
        </div>
		
        </div>
       
    </div>
   
</div>

