<?php
namespace Annotate\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class ContactForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('contact');
		
		$this->setAttributes(array(
			'method' => 'post',
			'action' => 'display',
		));
		
		$username = new Element\Text('userName');
		$username->setLabel('userName');
		$username->setAttributes(array(
			'required' => 'required',
		));
		
		$userLastName = new Element\Text('userLastName');
		$userLastName->setLabel('userLastName');
		$userLastName->setAttributes(array(
			'required' => 'required',
		));
		
		$submit = new Element\Submit('submit');
		$submit->setValue('Envoyer');
		
		$this->add($username);
		$this->add($userLastName);
		$this->add($submit);
	}
}