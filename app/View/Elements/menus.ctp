<?php /*
<div id="divMenu" class="<?php echo $class; ?>">
                <ul class="bottonMenu">
                   <li class="<?php echo isset($class2)?$class2:""; ?>"><?php echo $this->html->link("Home",array("controller"=>"pages","action"=>"display",isset($this->request->prefix)?$this->request->prefix:"patient"=>false)); ?></li>
                   <li class="<?php echo isset($class2)?$class2:""; ?>"><?php echo $this->html->link("About Us",array("controller"=>"cmspages","action"=>"view","about_us",isset($this->request->prefix)?$this->request->prefix:"patient"=>false)); ?></li>
                   <?php if ($this->Session->check('Auth.Patient') !== true && $this->Session->check('Auth.Patient') !== true) : ?>
                    <li class="<?php echo isset($class2)?$class2:""; ?>"><?php echo $this->html->link("Patient Register",array('controller' => 'patients', 'action' => 'registration','patient'=>true)); ?></li>
                   <li class="<?php echo isset($class2)?$class2:""; ?>"><?php echo $this->html->link("Doctor Register",array('controller' => 'doctors', 'action' => 'registration','doctor'=>true)); ?></li>
                   <?php endif; ?>
                    <?php if ($this->Session->check('Auth.Patient') === true) : ?>
                   <li class="<?php echo isset($class2)?$class2:""; ?>"><?php echo $this->html->link("Patient Dashboard",array('controller' => 'dashboard', 'action' => 'index','patient'=>true)); ?></li>
                     <li class="<?php echo isset($class2)?$class2:""; ?>"><?php echo $this->html->link("Patient Appointment",array('controller' => 'patients', 'action' => 'booking','patient'=>true)); ?></li>
                      <li class="<?php echo isset($class2)?$class2:""; ?>"><?php echo $this->html->link("Maintain Appointments",array('controller' => 'bookings', 'action' => 'maintain_appointments','patient'=>true)); ?></li>
                      <?php endif; ?>
                   <li class="<?php echo isset($class2)?$class2:""; ?>"><?php echo $this->html->link("FAQ",array('controller' => 'cmspages', 'action' => 'view',"faq",isset($this->request->prefix)?$this->request->prefix:"patient"=>false)); ?></li>
                    
                  <li class="<?php echo isset($class2)?$class2:""; ?>"><?php echo $this->html->link("Contact Us",array('controller' => 'pages', 'action' => 'contact_us',isset($this->request->prefix)?$this->request->prefix:"patient"=>false)); ?></li>
                  <li class="<?php echo isset($class2)?$class2:""; ?>"><?php echo $this->html->link("Help",array('controller' => 'cmspages', 'action' => 'view', "help",isset($this->request->prefix)?$this->request->prefix:"patient"=>false)); ?></li>
                    
                </ul>
        	</div>
 * 
  <?php */ ?>
 <div id="divMenu" class="<?php echo $class; ?>">
                <ul class="bottonMenu">
                   <li class="<?php echo isset($class2)?$class2:""; ?>"><?php echo $this->html->link("Home",array("controller"=>"pages","action"=>"display",isset($this->request->prefix)?$this->request->prefix:"patient"=>false)); ?></li>
                   <li class="<?php echo isset($class2)?$class2:""; ?>"><?php echo $this->html->link("About Us",array("controller"=>"cmspages","action"=>"view","about_us",isset($this->request->prefix)?$this->request->prefix:"patient"=>false)); ?></li>
                <li class="<?php echo isset($class2)?$class2:""; ?>"><?php echo $this->html->link("Help",array('controller' => 'cmspages', 'action' => 'view', "help",isset($this->request->prefix)?$this->request->prefix:"patient"=>false)); ?></li>
                   <li class="<?php echo isset($class2)?$class2:""; ?>"><?php echo $this->html->link("FAQ",array('controller' => 'cmspages', 'action' => 'view',"faq",isset($this->request->prefix)?$this->request->prefix:"patient"=>false)); ?></li>
                    
                  <li class="<?php echo isset($class2)?$class2:""; ?>"><?php echo $this->html->link("Contact Us",array('controller' => 'pages', 'action' => 'contact_us',isset($this->request->prefix)?$this->request->prefix:"patient"=>false)); ?></li>
                  
                    
                </ul>
        	</div>