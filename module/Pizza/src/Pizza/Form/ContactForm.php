<?php

namespace Pizza\Form;
use Zend\Form\Form;
class ContactForm extends Form
{
  public function __construct()
  		{
  			parent::__construct('contactform');

  			$this->add(array(
	  			'name'    => 'name',
	  			'type'    => 'text',
	  			'options' => array('label' => 'Your name')));
	  		

	  		$this->add(array(
	            'type' => 'email',
	            'name' => 'email_adress',
	            'options' => array(
		                'label' => 'Your email adress',
		               
	            )));

            
            $this->add(array(
	            'type' => 'textarea',
	            'name' => 'message',
	            'options' => array(
		                'label' => 'Your message ',
		                
	            )));


	  		
	  		
	  		$this->add(array(
		  		'name' => 'send',
		  		'type' => 'submit',
		  		'attributes' => array(
			  		'value' => 'Send',
			  		'id'    => 'submitbutton')));
  		}	


}