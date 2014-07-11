<?php

namespace Pizza\Model;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class Sandwich implements InputFilterAwareInterface
	{
		public $id;
		public $name;
		public $ingredients;
		public $smallprice;
		public $bigprice;
		

		protected $inputFilter;

		public function __construct()
			{
				
			}

		public function exchangeArray($data)
			{
				$this->id          = (!empty($data['id']))         ? $data['id']          : null;
				$this->name        = (!empty($data['name']))       ? $data['name']        : null;
				$this->ingredients = (!empty($data['ingredients']))? $data['ingredients'] : null;
				$this->smallprice  = (!empty($data['smallprice'])) ? $data['smallprice']  : null;
				$this->bigprice    = (!empty($data['bigprice']))   ? $data['bigprice']    : null;
				


			}

		public function getArrayCopy()
			{
				return get_object_vars($this);
			}

		public function setInputFilter(InputFilterInterface $inputfilter)
			{
				throw new \Exception("not used");
			}
		public function getInputFilter()
			{
				if(!$this->inputFilter)
					{
						
						$inputfilter = new InputFilter();

						$inputfilter->add(array('name'     => 'name',
												'required' => true,
												'filters'  => array(
													array('name' => 'StringTrim'),
													array('name' => 'StripTags')),
												'validators' => array(
															array('name' => 'StringLength',
															'options' => array(
																	'encoding' => 'UTF-8',
																	'min'      => 4,
																	'max'      => 30,)
																	 ))
												)
												);
						
						$inputfilter->add(array('name'     => 'ingredients',
												'required' => true,
												'filters'  => array(
													array('name' => 'StringTrim'),
													array('name' => 'StripTags')),
												'validators' => array(
														array('name' => 'StringLength',
															'options' => array(
																	'encoding' => 'UTF-8',
																	'min'      => 5,
																	'max'      => 255,)
																	 ))
												)
												);
						
						$inputfilter->add(array('name' => 'smallprice',
												'required' => true,
												'filters'  => array(
													array('name' => 'StringTrim'),
													array('name' => 'StripTags')),
												'validators' => array(
														array('name' => 'StringLength',
															'options' => array(
																	'encoding' => 'UTF-8',
																	'min'      => 1,
																	'max'      => 5,),
															),		 
															array('name' => 'float',
															      'options' => array('locale' => 'en_us')
																	 )
														    
												)
												));
						$inputfilter->add(array('name' => 'bigprice',
												'required' => true,
												'filters'  => array(
													array('name' => 'StringTrim'),
													array('name' => 'StripTags')),
												'validators' => array(
															array('name' => 'StringLength',
															'options' => array(
																	'encoding' => 'UTF-8',
																	'min'      => 1,
																	'max'      => 5,),
															),		 
															array('name' => 'float',
															      'options' => array('locale' => 'en_us')
																	 )
														    
												)
												));
						
			
						

					 $this->inputFilter = $inputfilter;

					}

				return $this->inputFilter;

				
			}
	}