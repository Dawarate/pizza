<?php 

namespace Pizza\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Pizza\Form\AddSandwichForm;
use Pizza\Form\EditSandwichForm;
use Zend\View\Model\ViewModel;
use Pizza\Model\Sandwich;
use Zend\View\Model\JSonModel;

class SandwichController extends AbstractActionController {
	protected $sandwichTable;
	public function indexAction()
		{
			return new ViewModel(array('sandwiches' => $this->getSandwichTable()->find_all()));
		}
	public function addAction()
		{
        $add_form = new AddSandwichForm();
        $request  = $this->getRequest();
        if($request->isPost())
        	{
        		$sandwich = new Sandwich();
        		$add_form->setInputFilter($sandwich->getInputFilter());
        		$add_form->setData($request->getPost());

        		if($add_form->isValid())
        			{
        				$sandwich->exchangeArray($add_form->getData());
        				$this->getSandwichTable()->save($sandwich);		
        			}
        		return $this->redirect()->toRoute('sandwich');
        	}		
		return array('form' => $add_form);
        }
	public function editAction()
		{
			$id = (int) $this->params()->fromRoute('id',0);
			if($id == 0)
				{
					// redirect to index action route
					return $this->redirect()->toRoute('sandwich');
				}
			else 
				{
					$sandwich     = $this->getSandwichTable()->find_by_id($id);
					$edit_form = new EditSandwichForm();
					$edit_form->bind($sandwich);

					$request = $this->getRequest();
					if($request->isPost())
						{
							$edit_form->setInputFilter($sandwich->getInputFilter());
        		            $edit_form->setData($request->getPost());

        		            if($edit_form->isValid())
        		            	{
        		            		$this->getSandwichTable()->save($sandwich);
        		            		return $this->redirect()->toRoute('sandwich');
        		            	}
        		            else
        		            	{
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
			$this->getSandwichTable()->delete($id);
			$msg = "the selected sandwich was successfuly deleted";
			
			$response = new JSonModel(array('response' => $msg));
			return $response; 
			
		}

	public function getSandwichTable()
		{
			if(!$this->sandwichTable)
				{
					$sm = $this->getServiceLocator();
					$this->sandwichTable = $sm->get('Pizza\Model\SandwichTable');
				}
			return $this->sandwichTable;
		}
	
}