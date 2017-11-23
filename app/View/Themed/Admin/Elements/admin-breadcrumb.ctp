<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

$pageName = (isset($pageName)) ? $pageName : 'home';
//Add Bread curmbs
switch ($pageName) {
     case 'home' :
          break;
//dashboard page
     case 'dashboard' :
          $this->Html->addCrumb('Dashboard', '');
          break;
     case 'setting' :
          $this->Html->addCrumb('MedCert List', '');
          break;
     case 'add_setting' :
          $this->Html->addCrumb('Add Setting', '');
          break;


     case 'Menu' :
          $this->Html->addCrumb('Menu', '');
          break;
     case 'Menu_add' :
          $this->Html->addCrumb('Menu', '/admin/menus');
          $this->Html->addCrumb('Add Menu', '', array('class' => 'breadcrumblast'));
          break;
     case 'Menu_edit' :
          $this->Html->addCrumb('Menu', '/admin/menus');
          $this->Html->addCrumb('Edit Menu', '', array('class' => 'breadcrumblast'));
          break;

     
     case 'Cmspage' :
          $this->Html->addCrumb('Static pages', '');
          break;
     case 'Cmspage_add' :
          $this->Html->addCrumb('Static pages', '/admin/cmspages');
          $this->Html->addCrumb('Add Page', '', array('class' => 'breadcrumblast'));
          break;
     case 'Cmspage_edit' :
          $this->Html->addCrumb('Static pages', '/admin/cmspages');
          $this->Html->addCrumb('Edit Page', '', array('class' => 'breadcrumblast'));
          break;
     case 'User' :
          $this->Html->addCrumb('User', '');
          break;
     case 'User_add' :
            $this->Html->addCrumb('Add User', '', array('class' => 'breadcrumblast'));
          break;
     case 'User_edit' :
           $this->Html->addCrumb('Account Detail', '', array('class' => 'breadcrumblast'));
          break;
      case 'changepassword' :
          $this->Html->addCrumb('Change Password', '');
          break;

     case 'Group' :
          $this->Html->addCrumb('Group', '');
          break;
     case 'Group_add' :
          $this->Html->addCrumb('User', '/admin/groups');
          $this->Html->addCrumb('Add Group', '', array('class' => 'breadcrumblast'));
          break;
     case 'Group_edit' :
          $this->Html->addCrumb('Group', '/admin/groups');
          $this->Html->addCrumb('Edit Group', '', array('class' => 'breadcrumblast'));
          break;
     case 'access' :
          $this->Html->addCrumb('User Group permissiopn', '');
          break;
     case 'Patient' :
          $this->Html->addCrumb('Patients list', '');
          break;
     case 'Patient_edit' :
          $this->Html->addCrumb('Patient', '/admin/patients');
          $this->Html->addCrumb('Edit Patient', '');
          break;
     case 'Patient_add' :
          $this->Html->addCrumb('Patient', '/admin/patients');
          $this->Html->addCrumb('Add Patient', '');
          break;
     case 'Doctor' :
          $this->Html->addCrumb('Doctors list', '');
          break;
     case 'Doctor_edit' :
          $this->Html->addCrumb('Doctor', '/admin/doctors');
          $this->Html->addCrumb('Edit Doctor', '');
          break;
     case 'Doctor_add' :
          $this->Html->addCrumb('Doctor', '/admin/doctors');
          $this->Html->addCrumb('Add Doctor', '');
          break;
     case 'Appointment' :
          $this->Html->addCrumb('Appointment', '');
          break;
     case 'patient_report' :
          $this->Html->addCrumb('Patient Report', '');
          break;
     case 'doctor_report' :
          $this->Html->addCrumb('Doctors Report', ''); 
          break;
     case 'appointment_booking_report' :
          $this->Html->addCrumb('Appointment Booking Report', '');     
          break; 
     case 'patient_import' :
          $this->Html->addCrumb('Import Patient Data', '');     
          break; 
     case 'doctor_import' :
          $this->Html->addCrumb('Import Doctor Data', '');     
          break; 
     case 'Appointment_import' :
          $this->Html->addCrumb('Import Appointment Data', '');     
          break; 
     case 'Payment' :
          $this->Html->addCrumb('Payment', '');     
          break;
     case 'Payment_add' :
          $this->Html->addCrumb('Add Payment', '');     
          break;
     case 'Payment_edit' :
          $this->Html->addCrumb('Edit Payment', '');     
          break;
      case 'Subscriber' :
          $this->Html->addCrumb('Subscribers', '');     
          break;
}
?>
<?php

if ($this->Html->getCrumbs('<i class="icon-home"></i>', 'Home ')) {
     echo '<ul class="page-breadcrumb breadcrumb">';
     echo '<li>';
     echo $this->html->link('<i class="icon-home"></i>', array("controller" => "dashboard", "action" => "index"), array("escape" => false));
     echo " <i class=\"icon-angle-right\"></i></li>";
     echo '<li>' . $this->Html->getCrumbs(' <i class="icon-angle-right"></i> ', '') . '</li>';
     echo '</ul>';
}
?>

