<div class="footer">
    	<div class="copyright">©<?php echo date('Y'); ?> <?php echo $mySetting['title']; ?> | 
              <?php echo $this->html->link("Privacy Policy",array("controller"=>"cmspages","action"=>"view", "privacy_policy",isset($this->request->prefix)?$this->request->prefix:"patient" => false)); ?>
              | 
              <?php echo $this->html->link("Terms &amp; Conditions",array("controller"=>"cmspages","action"=>"view", "terms_and_conditions",isset($this->request->prefix)?$this->request->prefix:"patient" => false),array("escape"=>false)); ?>
              </div>
        <div class="home_bottom_right_in">
                <div class="email_in"><a href="mailto:<?php echo $mySetting['email'];?>"><?php echo $mySetting['email'];?></a></div>
                <ul class="social_in">
                    <li>
                    <?php echo $this->html->link("",$mySetting['fb_link'],array("class"=>"fb_icon","escape"=>false,"target"=>"_blank")); ?>
                       </li>
                       <li>
                    <?php echo $this->html->link("",$mySetting['twitter_link'],array("class"=>"twitter_icon","escape"=>false,"target"=>"_blank")); ?>
                       </li>
                        <li>
                    <?php echo $this->html->link("",$mySetting['in_link'],array("class"=>"in","escape"=>false,"target"=>"_blank")); ?>
                       </li>
                       <li>
                    <?php echo $this->html->link("",$mySetting['gpluse_link'],array("class"=>"gtalk","escape"=>false,"target"=>"_blank")); ?>
                       </li>
                </ul>
            </div>
    </div>