<?php

namespace Pizza\Model;
use Zend\Db\TableGateway\TableGateway;
class DrinkTable 
{
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway)
		{
			$this->tableGateway = $tableGateway;
		}

	public function find_all()
		{
			return $this->tableGateway->select();
        }
    public function find_by_id($id=0)
    	{
    		$id     = (int)$id;
    		$result = $this->tableGateway->select(array('id'=>$id));
    		$row    = $result->current();
    		
    		if($row)
    			{
    				return $row;
    			} 
    		else {return null;;}
    	}
    public function save(Drink $drink)
    	{
    		$data = array('name'        => $drink->name,
    					  'drink_type'  => $drink->drink_type,
    					  'size'        => $drink->size,
						  'price'       => $drink->price,
						  
						  );
    		$id = (int)$drink->id;
    		if($id == 0)
    			{
    				// insert a new record
    				$this->tableGateway->insert($data);
    			}
    		else
    			{
    				// update an existing record

    				if($this->find_by_id($id))
    					{
    						$this->tableGateway->update($data , array('id'=>$id));
    						
    					}
    				else
    					{
    						throw new \Exception("the Drink with the id = {$id} could not be found in the database");
    					}
    			}

    }

   public function delete($id=0)
   	{
   		$this->tableGateway->delete(array('id' => (int)$id));
   		
   	}

}