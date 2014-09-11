<?php 

namespace Pizza\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Pizza\Form\AddPizzaForm;
use Pizza\Form\EditPizzaForm;
use Zend\View\Model\ViewModel;
use Pizza\Model\Pizza;
use Zend\View\Model\JSonModel;
use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
class PizzaController extends AbstractActionController {
	protected $pizzaTable;
	public function indexAction()
		{ 
			//return new ViewModel(array('pizzas' => $this->getPizzaTable()->find_all()));
		}
	public function addAction()
		{
        $add_form = new AddPizzaForm();
        $request  = $this->getRequest();
        if($request->isPost())
        	{
        		$pizza = new Pizza();
        		$add_form->setInputFilter($pizza->getInputFilter());
        		$add_form->setData($request->getPost());

        		if($add_form->isValid())
        			{
        				$pizza->exchangeArray($add_form->getData());
        				$this->getPizzaTable()->save($pizza);		
        			}
        		return $this->redirect()->toRoute('pizza');
        	}		
		return array('form' => $add_form);
        }
	public function editAction()
		{
			$id = (int) $this->params()->fromRoute('id',0);
			if($id == 0)
				{
					// redirect to index action route
					return $this->redirect()->toRoute('pizza');
				}
			else 
				{
					$pizza     = $this->getPizzaTable()->find_by_id($id);
					$edit_form = new EditPizzaForm();
					$edit_form->bind($pizza);

					$request = $this->getRequest();
					if($request->isPost())
						{
							$edit_form->setInputFilter($pizza->getInputFilter());
        		            $edit_form->setData($request->getPost());

        		            if($edit_form->isValid())
        		            	{
        		            		$this->getPizzaTable()->save($pizza);
        		            		return $this->redirect()->toRoute('pizza');
        		            	}
						}

					return array('id'   => $id,
								 'form' => $edit_form );

				}
		}
	public function deleteAction()
		{
			$id  = (int) $_POST['id'];
			$this->getPizzaTable()->delete($id);
			$msg = "the selected pizza was successfuly deleted";
			
			$response = new JSonModel(array('response' => $msg));
			return $response; 
			
		}

	public function getPizzaTable()
		{
			if(!$this->pizzaTable)
				{
					$sm = $this->getServiceLocator();
					$this->pizzaTable = $sm->get('Pizza\Model\PizzaTable');
				}
			return $this->pizzaTable;
		}
	
}