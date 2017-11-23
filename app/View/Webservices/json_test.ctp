yutguytu<div class="users form">
<?php echo $this->Form->create('RegisterDevice'); ?>
    <fieldset>
        <legend><?php echo __('Register Device'); ?></legend>
        
        <?php echo $this->Form->input('json',array('type' => 'textarea', 'default' => '{"user_id":"101", "device_id":"shajsgdfhih", "device_token":"sdvfysyfgysfg"}'));
        echo $this->Form->input('action',array('type' => 'text', 'default' => 'saveDeviceId'));   ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php

   echo $res;
?>