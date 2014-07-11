<?php 

namespace Pizza\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Pizza\Form\AddDrinkForm;
use Pizza\Form\EditDrinkForm;
use Zend\View\Model\ViewModel;
use Pizza\Model\Drink;
use Zend\View\Model\JSonModel;

class DrinkController extends AbstractActionController {
	protected $drinkTable;
	public function indexAction()
		{
			return new ViewModel(array('drinks' => $this->getDrinkTable()->find_all()));
		}
	public function addAction()
		{
        $add_form = new AddDrinkForm();
        $request  = $this->getRequest();
        if($request->isPost())
        	{
        		$drink = new Drink();
        		$add_form->setInputFilter($drink->getInputFilter());
        		$add_form->setData($request->getPost());

        		if($add_form->isValid())
        			{
        				$drink->exchangeArray($add_form->getData());
        				$this->getDrinkTable()->save($drink);		
        			}
        		return $this->redirect()->toRoute('drink');
        	}		
		return array('form' => $add_form);
        }
	public function editAction()
		{
			$id = (int) $this->params()->fromRoute('id',0);
			if($id == 0)
				{
					// redirect to index action route
					return $this->redirect()->toRoute('drink');
				}
			else 
				{
					$drink     = $this->getDrinkTable()->find_by_id($id);
					$edit_form = new EditDrinkForm();
					$edit_form->bind($drink);

					$request = $this->getRequest();
					if($request->isPost())
						{
							$edit_form->setInputFilter($drink->getInputFilter());
        		            $edit_form->setData($request->getPost());

        		            if($edit_form->isValid())
        		            	{
        		            		$this->getDrinkTable()->save($drink);
        		            		return $this->redirect()->toRoute('drink');
        		            	}
						}

					return array('id'   => $id,
								 'form' => $edit_form );

				}
		}
	public function deleteAction()
		{
			$id  = (int) $_POST['id'];
			$this->getDrinkTable()->delete($id);
			$msg = "the selected drink was successfuly deleted";
			
			$response = new JSonModel(array('response' => $msg));
			return $response; 
			
		}

	public function getDrinkTable()
		{
			if(!$this->drinkTable)
				{
					$sm = $this->getServiceLocator();
					$this->drinkTable = $sm->get('Pizza\Model\DrinkTable');
				}
			return $this->drinkTable;
		}
	
}