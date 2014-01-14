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
		),
	),
	
	'controllers' => array(
		'invokables' => array(
			'IndexController' => 'Annotate\Controller\IndexController',
		),				
	),
		
		
	'view_manager' => array(
		'template_path_stack' => array(
			'annotate' => __DIR__ . '/../view',
		),		
	),
);