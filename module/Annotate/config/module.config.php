<?php

/**
 * Array contenant l'ensemble des services que le module doit lancer dès le départ
 */

return array(
	// Service
	'router' => array(
		// Array contient l'ensemble des chemins
		'routes' => array(
			// Nom d'un chemin
			'myIndex' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/',
					'defaults' => array(
						'controller' => 'IndexController',
						'action'	 => 'index',
					),
				), 
			),
			'otherLayout' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
						'route' => '/otherlayout',
						'defaults' => array(
								'controller' => 'IndexController',
								'action'	 => 'otherlayout',
						),
				),
			),
			'display' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/display',
					'defaults' => array(
						'controller' => 'DisplayAnnotate',
						'action' 	 => 'display',
					),
				),				
			),
		),
	),
	
	'controllers' => array(
		'invokables' => array(
			'IndexController' => 'Annotate\Controller\IndexController',
			'DisplayAnnotate' => 'Annotate\Controller\DisplayController',
		),				
	),
		
		
	'view_manager' => array(
		'template_path_stack' => array(
			'annotate' => __DIR__ . '/../view',
		),		
		'display_not_found_reason' => true,
		'display_exceptions' => true,
		'doctype' => 'HTML5',
		'base_path' => 'http://zf2.local',
		'layout' => 'layoutAnnotate',
		'not_found_template' => '404Annotate',
		'exception_template' => 'myError',
		
		'template_map' => array(
			'layoutAnnotate' => __DIR__ . '/../view/layout/myLayout.phtml',
			'404Annotate' => __DIR__ . '/../view/error/my404.phtml',
			'myError' => __DIR__ . '/../view/error/myError.phtml',
			'myNewLayout' => __DIR__ . '/../view/layout/myNewLayout.phtml',
		),
	),
);