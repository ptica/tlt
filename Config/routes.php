<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'bookings', 'action' => 'add'));
	Router::connect('/thank-you', array('controller' => 'pages', 'action' => 'display', 'thank-you'));
	Router::connect('/edit/:token', array('controller' => 'bookings', 'action' => 'edit', 'token' => '[a-z0-9]+'), array('pass' => array('token')));
	Router::connect('/admin', array('controller' => 'bookings', 'action' => 'index', 'admin'=>true));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));

	Router::connect('/pay/nok/:token', array('plugin'=> 'payment', 'controller' => 'payment', 'action' => 'nok', 'token' => '.+'), array('pass' => array('token')));
	Router::connect('/pay/ok/:token', array('plugin'=> 'payment', 'controller' => 'payment', 'action' => 'ok', 'token' => '.+'), array('pass' => array('token')));
	Router::connect('/pay/:id/:token', array('plugin'=> 'payment', 'controller' => 'payment', 'action' => 'pay', 'id' => '[0-9]+', 'token' => '.+'), array('pass' => array('id', 'token')));
	Router::connect('/pay/result', array('plugin'=> 'payment', 'controller' => 'payment', 'action' => 'result'));
	
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

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
