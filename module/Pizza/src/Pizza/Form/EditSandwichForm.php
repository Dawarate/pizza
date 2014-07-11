<?php

namespace Pizza\Form;
use Zend\Form\Form;
class EditSandwichForm extends Form
{
  public function __construct()
  		{
  			parent::__construct('editsandwichform');

  			$this->add(array(
	  			'name'    => 'id',
	  			'type'    => 'Hidden'));
	  			
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
		  		'name' => 'editsandwich',
		  		'type' => 'submit',
		  		'attributes' => array(
			  		'value' => 'Edit Sandwich',
			  		'id'    => 'submitbutton')));
  		}	


}