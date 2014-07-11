<?php

namespace Pizza\Form;
use Zend\Form\Form;
class EditDrinkForm extends Form
{
  public function __construct()
  		{
  			parent::__construct('editdrinkform');

  			$this->add(array(
	  			'name'    => 'id',
	  			'type'    => 'Hidden'));
	  			
  			$this->add(array(
	  			'name'    => 'name',
	  			'type'    => 'text',
	  			'options' => array('label' => 'Drink name')));

	  		$this->add(array(
	            'type' => 'select',
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
	            'type' => 'select',
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
		  		'name' => 'editdrink',
		  		'type' => 'submit',
		  		'attributes' => array(
			  		'value' => 'Edit Drink',
			  		'id'    => 'submitbutton')));
  		}	


}