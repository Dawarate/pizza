<?php
return array(
	'controllers'  => array(
		'invokables'=>array('Pizza\Controller\Pizza'    => 'Pizza\Controller\PizzaController',
							'Pizza\Controller\Sandwich' => 'Pizza\Controller\SandwichController',
							'Pizza\Controller\Drink'    => 'Pizza\Controller\DrinkController',
							'Pizza\Controller\Contact'  => 'Pizza\Controller\ContactController'),
		),
	'router'       => array(
		'routes' => array(
			'pizza' => array(
				'type'=> 'segment',
				'options' => array(
					'route' => '/pizza[/][:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+'),
					'defaults' => array(
						'controller'=> 'Pizza\Controller\Pizza',
						'action' => 'index'
							),
						   )
						  ),
			'sandwich' => array(
				'type'=> 'segment',
				'options' => array(
					'route' => '/sandwich[/][:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+'),
					'defaults' => array(
						'controller'=> 'Pizza\Controller\Sandwich',
						'action' => 'index'
							),
						   )
						  ),
		    'drink' => array(
				'type'=> 'segment',
				'options' => array(
					'route' => '/drink[/][:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+'),
					'defaults' => array(
						'controller'=> 'Pizza\Controller\Drink',
						'action' => 'index'
							),
						   )
						  ),
		    'contact' => array(
				'type'=> 'segment',
				'options' => array(
					'route' => '/contact[/]',
					
					'defaults' => array(
						'controller'=> 'Pizza\Controller\Contact',
						'action' => 'index'
							),
						   )
						  ),
						 )
						),
	'view_manager' => array('template_path_stack' => array('pizza' => __DIR__.'/../view'),
							 'strategies'         => array('ViewJsonStrategy')),
);