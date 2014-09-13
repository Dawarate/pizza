<?php

namespace Pizza\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Pizza\Form\ContactForm;
class ContactController extends AbstractActionController
{

    public function indexAction()
    {
        //return new ViewModel();

        $contact_form = new ContactForm();
        $request  = $this->getRequest();
        if($request->isPost())
        	{  
        		$message = new \Zend\Mail\Message();
        		$message->setBody($_POST['message']);
        		$message->setFrom($_POST['email_adress']);
        		$message->setSubject(" contact message ");
        		$message->addTo('thegentletrainer@gmail.com');

        		$smtpOptions = new \Zend\Mail\Transport\SmtpOptions();

        		$smtpOptions->setHost('smtp.gmail.com')
        		            ->setConnectionClass('login')
        		            ->setName('smtp.gmail.com')
        		            ->setConnectionConfig(array(
        		            	'username' => 'anass.rakibi@gmail.com', // your gmail adress here ( if you want to use another host : hotmail ,... please look for its informations on google )
        		            	'password' => '#############', // your own password of your email adress chosen.
        		            	'ssl'      => 'tls'
	        		            ));

	           $transport = new \Zend\Mail\Transport\Smtp($smtpOptions);
	           $transport->send($message);



        	}		
		return array('form' => $contact_form);
    }


}

