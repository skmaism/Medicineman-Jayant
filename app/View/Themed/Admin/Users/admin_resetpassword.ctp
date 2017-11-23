<div class="container">
	<div class="row">
    	<div class="col-lg-offset-4 col-lg-4 login-box">
       	<div class="forgot-title">Re-Set your password</div>
        <div class="form-div">
        
			<?php echo $this->Form->create ( 'User', array ('enctype' => 'multipart/form-data','class' => '' ) ); ?>
			
				<div class="form-group custom-from-pad">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-lock"></i>
						</div>
						
						<?php
						echo $this->Form->input ( 'password', 
						array ("class" => "form-control",
								'type' => 'password',
								'placeholder' => 'Enter new password',
								'autocomplete' => 'off',
								'label' => '',
								
						) );
						?>
						
					</div>
					
				</div>
				
				<div class="form-group custom-from-pad">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-lock"></i>
						</div>
						
						<?php
						echo $this->Form->input ( 'cpassword', 
						array ("class" => "form-control",
								'type' => 'password',
								'placeholder' => 'Confirm password',
								'autocomplete' => 'off',
								'label' => '',
								
						) );
						?>
						
						
					</div>
				
				</div>
				
				<div class="form-group custom-from-pad">
					<button type="submit" class="btn btn-primary btn-block btn-login action-btn">
						<i class="entypo-login"></i>
						Submit
					</button>
				</div>
				
				
			
				
						
			</form>	
        </div>
        </div>
       
    </div>
   
</div>

