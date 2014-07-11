<?php

namespace Pizza\Model;
use Zend\Db\TableGateway\TableGateway;
class PizzaTable 
{
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway)
		{
			$this->tableGateway = $tableGateway;
		}

	public function find_all()
		{
			//select * FRom Pizza
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
    public function save(Pizza $pizza)
    	{
    		$data = array('name'        => $pizza->name,
    					  'ingredients' => $pizza->ingredients,
    					  'smallprice' => $pizza->smallprice,
						  'bigprice'   => $pizza->bigprice,
						  'familyprice'=> $pizza->familyprice,
						  'partyprice' => $pizza->partyprice,
						  );
    		$id = (int)$pizza->id;
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
    						throw new \Exception("the pizza with the id = {$id} could not be found in the database");
    					}
    			}

    }

   public function delete($id=0)
   	{
   		$this->tableGateway->delete(array('id' => (int)$id));
   		
   	}

}