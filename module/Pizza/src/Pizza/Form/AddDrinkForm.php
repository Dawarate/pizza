<?php

namespace Pizza\Form;
use Zend\Form\Form;
class AddDrinkForm extends Form
{
  public function __construct()
  		{
  			parent::__construct('adddrinkform');

  			$this->add(array(
	  			'name'    => 'name',
	  			'type'    => 'text',
	  			'options' => array('label' => 'Drink name')));
	  		

	  		$this->add(array(
	            'type' => 'Zend\Form\Element\Select',
	            'name' => 'drink_type',
	            'options' => array(
		                'label' => 'Type',
		                'options' => array(
		                    'water' => 'Water',
		                    'juice' => 'Juice',
		                    'soda'  => 'Soda'
		                ),
	            )));

            
            $this->add(array(
	            'type' => 'Zend\Form\Element\Select',
	            'name' => 'size',
	            'options' => array(
		                'label' => 'Size',
		                'options' => array(
		                   'small'  => 'Small',
		                   'medium' => 'Medium',
		                   'big'    => 'Big',
		                ),
	            )));

	  		$this->add(array(
	  			'name'  => 'price',
	  			'type'  => 'text',
	  			'options' => array('label' => 'price')));

	  		
	  		
	  		$this->add(array(
		  		'name' => 'adddrink',
		  		'type' => 'submit',
		  		'attributes' => array(
			  		'value' => 'Add New Drink',
			  		'id'    => 'submitbutton')));
  		}	


}