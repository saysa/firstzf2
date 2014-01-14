<?php
namespace Annotate\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Validator;

class ContactFilter 
{	
	public function getInputFilter()
	{
		$userName = new Input('userName');
		$userName->getValidatorChain()
		->addValidator(new Validator\StringLength(array(
			'min' => 0,
			'max' => 8,
			'encoding' => 'UTF-8',
		)))
		->addValidator(new Validator\NotEmpty(Validator\NotEmpty::STRING));
		
		$userLastName = new Input('userLastName');
		$userLastName->getValidatorChain()
		->addValidator(new Validator\StringLength(array(
			'min' => 0,
			'max' => 8,
			'encoding' => 'UTF-8',
		)))
		->addValidator(new Validator\NotEmpty(Validator\NotEmpty::STRING));
		
		$inputFilter = new InputFilter();
		$inputFilter->add($userName);
		$inputFilter->add($userLastName);
		
		return $inputFilter;
	}
}