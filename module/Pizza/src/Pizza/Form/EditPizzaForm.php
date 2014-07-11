<?php

namespace Pizza\Form;
use Zend\Form\Form;
class EditPizzaForm extends Form
{
  public function __construct()
  		{
  			parent::__construct('editpizzaform');

  			$this->add(array(
	  			'name'    => 'id',
	  			'type'    => 'Hidden'));

  			$this->add(array(
	  			'name'    => 'name',
	  			'type'    => 'text',
	  			'options' => array('label' => 'Pizza name')));

	  		$this->add(array(
	  			'name'  => 'ingredients',
	  			'type'  => 'textarea',
	  			'options' => array('label' => 'Ingredients')));

	  		$this->add(array(
	  			'name'  => 'smallprice',
	  			'type'  => 'text',
	  			'options' => array('label' => 'Small price')));

	  		$this->add(array(
	  			'name'  => 'bigprice',
	  			'type'  => 'text',
	  			'options' => array('label' => 'Big price')));

	  		$this->add(array(
	  			'name'  => 'familyprice',
	  			'type'  => 'text',
	  			'options' => array('label' => 'Family price')));

	  		$this->add(array(
	  			'name'  => 'partyprice',
	  			'type'  => 'text',
	  			'options' => array('label' => 'Party price')));
	  		
	  		$this->add(array(
		  		'name' => 'editpizza',
		  		'type' => 'submit',
		  		'attributes' => array(
			  		'value' => 'Edit Pizza',
			  		'id'    => 'submitbutton')));
  		}	


}