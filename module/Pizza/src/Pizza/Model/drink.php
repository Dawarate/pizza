<?php

namespace Pizza\Model;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class Drink implements InputFilterAwareInterface
	{
		public $id;
		public $name;
		public $drink_type;
		public $size;
		public $price;

		protected $inputFilter;

		public function __construct()
			{
				
			}

		public function exchangeArray($data)
			{
				$this->id          = (!empty($data['id']))         ? $data['id']          : null;
				$this->name        = (!empty($data['name']))       ? $data['name']        : null;
				$this->drink_type  = (!empty($data['drink_type'])) ? $data['drink_type']  : null;
				$this->size        = (!empty($data['size']))       ? $data['size']        : null;
				$this->price       = (!empty($data['price']))      ? $data['price']       : null;
				


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
																	'min'      => 3,
																	'max'      => 30,)
																	 ))
												)
												);
						
						$inputfilter->add(array('name'     => 'drink_type',
												'required' => true,
												'filters'  => array(
													array('name' => 'StringTrim'),
													array('name' => 'StripTags')),
												'validators' => array(
														array('name' => 'StringLength',
															'options' => array(
																	'encoding' => 'UTF-8',
																	'min'      => 1,
																	'max'      => 8,)
																	 ))
												)
												);
					    $inputfilter->add(array('name'     => 'size',
												'required' => true,
												'filters'  => array(
													array('name' => 'StringTrim'),
													array('name' => 'StripTags')),
												'validators' => array(
														array('name' => 'StringLength',
															'options' => array(
																	'encoding' => 'UTF-8',
																	'min'      => 2,
																	'max'      => 8,)
																	 ))
												)
												);
						
						$inputfilter->add(array('name' => 'price',
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