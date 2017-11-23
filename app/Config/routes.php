<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
        define('_BASE_', FULL_BASE_URL.router::url('/',false));
	Router::connect('/', array('controller' => 'dashboard', 'action' => 'index','admin'=>true));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/admin', array('controller' => 'dashboard', 'action' => 'index','admin'=>true));
		
	Router::connect('/admin/login', array('controller' => 'users', 'action' => 'login','admin'=>true));
	Router::connect('/admin/forgot_password', array('controller' => 'users', 'action' => 'forgot_password','admin'=>true));
	Router::connect('/admin/resetpassword/*', array('controller' => 'users', 'action' => 'resetpassword','admin'=>true));
	Router::redirect('/admin/users/login',_BASE_ . "admin/login");
        
    Router::connect('/users', array('controller' => 'users', 'action' => 'login'));
    Router::connect('/users/login', array('controller' => 'users', 'action' => 'login'));
    Router::connect('/users/add', array('controller' => 'users', 'action' => 'add'));
	
	
	
	Router::redirect('/patient/patients/login',_BASE_ . "patient/login");
    Router::connect('/patient/registration', array('controller' => 'patients', 'action' => 'registration','patient'=>true));
	Router::redirect('/patient/patients/registration',_BASE_ . "patient/registration");
        
	Router::redirect('/patient/patients/register',_BASE_ . "patient/registration");
	Router::redirect('/patient/patients/signup',_BASE_ . "patient/registration");
	Router::redirect('/patient/signup',_BASE_ . "patient/registration");
	Router::redirect('/patient/register',_BASE_ . "patient/registration");
	
	Router::connect('/patient/dashboard', array('controller' => 'patients', 'action' => 'index','patient'=>true));
	//Router::redirect('/patient/dashboard',_BASE_ . "patient/registration");
	
	
	
	
	
	Router::connect('/company', array('controller' => 'companies', 'action' => 'login','admin'=>true));
	Router::connect('/company/login', array('controller' => 'companies', 'action' => 'login','company'=>true));
	Router::redirect('/company/companies/login',_BASE_ . "company/login");
	Router::connect('/company/registration', array('controller' => 'companies', 'action' => 'registration','company'=>true));
	Router::redirect('/company/companies/registration',_BASE_ . "company/registration");
        
	Router::redirect('/company/companies/register',_BASE_ . "company/registration");
	Router::redirect('/company/companies/signup',_BASE_ . "company/registration");
	Router::redirect('/company/signup',_BASE_ . "company/registration");
	Router::redirect('/company/register',_BASE_ . "company/registration");

	Router::connect('/company/dashboard', array('controller' => 'companies', 'action' => 'index','company'=>true));
	//Router::redirect('/company/dashboard',_BASE_ . "company/registration");
	
	
	
	
        
        Router::connect('/doctor/dashboard', array('controller' => 'doctors', 'action' => 'index','doctor'=>true));
        Router::connect('/doctor/login', array('controller' => 'doctors', 'action' => 'login','doctor'=>true));
	Router::redirect('/doctor/doctors/login',_BASE_ . "doctor/login");
        Router::connect('/doctor', array('controller' => 'doctors', 'action' => 'login','doctor'=>true));
        Router::connect('/doctor/registration', array('controller' => 'doctors', 'action' => 'registration','doctor'=>true));
	Router::redirect('/doctor/doctors/registration',_BASE_ . "doctor/registration");
        Router::redirect('/doctor/doctors/register',_BASE_ . "doctor/registration");
        Router::redirect('/doctor/doctors/signup',_BASE_ . "doctor/registration");
        Router::redirect('/doctor/signup',_BASE_ . "doctor/registration");
        Router::redirect('/doctor/register',_BASE_ . "doctor/registration");
	
    Router::connect(
    '/view/:slug',
     array('controller' => 'cmspages', 'action' => 'view'),
     array('pass' => array('slug'))
    );

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
