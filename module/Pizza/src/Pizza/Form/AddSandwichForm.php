<?php

namespace Pizza\Form;
use Zend\Form\Form;
class AddSandwichForm extends Form
{
  public function __construct()
  		{
  			parent::__construct('addsandwichform');

  			$this->add(array(
	  			'name'    => 'name',
	  			'type'    => 'text',
	  			'options' => array('label' => 'Sandwich name')));

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
		  		'name' => 'addsandwich',
		  		'type' => 'submit',
		  		'attributes' => array(
			  		'value' => 'Add New Sandwich',
			  		'id'    => 'submitbutton')));
  		}	


}