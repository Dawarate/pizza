<?php 
namespace Pizza;
use Pizza\Model\Pizza;
use Pizza\Model\PizzaTable;
use Pizza\Model\Sandwich;
use Pizza\Model\SandwichTable;
use Pizza\Model\Drink;
use Pizza\Model\DrinkTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
class Module {
	
	public function getAutoloaderConfig()
		{
			return array('Zend\Loader\ClassMapAutoloader'=>array(__DIR__ . '/autoload_classmap.php',),
			'Zend\Loader\StandardAutoloader'=>array('namespaces'=>array( __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__ , ),),);
		}
	public function getConfig()
		{
		return include __DIR__ . '/config/module.config.php';	
		}
	public function getServiceConfig()
		{
			return array('factories' => array(
					'Pizza\Model\PizzaTable' => function ($sm)
						{
							$tableGateway = $sm->get('PizzaTableGateway');
							$table        = new PizzaTable($tableGateway);
							return $table;
						},
					'PizzaTableGateway'  => function ($sm)
						{
							$dbAdapter          = $sm->get('Zend\Db\Adapter\Adapter');
							$resultSetPrototype = new ResultSet();
							$resultSetPrototype->setArrayObjectPrototype(new Pizza());
							return new TableGateway('pizza',$dbAdapter, null, $resultSetPrototype);
						} 
					,

					'Pizza\Model\SandwichTable' => function ($sm)
						{
							$tableGateway = $sm->get('SandwichTableGateway');
							$table        = new SandwichTable($tableGateway);
							return $table;
						},
					'SandwichTableGateway'  => function ($sm)
						{
							$dbAdapter          = $sm->get('Zend\Db\Adapter\Adapter');
							$resultSetPrototype = new ResultSet();
							$resultSetPrototype->setArrayObjectPrototype(new Sandwich());
							return new TableGateway('sandwich',$dbAdapter, null, $resultSetPrototype);
						} 
					,

					'Pizza\Model\DrinkTable' => function ($sm)
						{
							$tableGateway = $sm->get('DrinkTableGateway');
							$table        = new DrinkTable($tableGateway);
							return $table;
						},
					'DrinkTableGateway'  => function ($sm)
						{
							$dbAdapter          = $sm->get('Zend\Db\Adapter\Adapter');
							$resultSetPrototype = new ResultSet();
							$resultSetPrototype->setArrayObjectPrototype(new Drink());
							return new TableGateway('drink',$dbAdapter, null, $resultSetPrototype);
						} 
				));
		}
}
