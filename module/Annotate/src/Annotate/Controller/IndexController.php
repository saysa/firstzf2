<?php
namespace Annotate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Annotate\Form\ContactForm;

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		$hw = 'Hello World !';
		
		$contactForm = new ContactForm();
		
		return new ViewModel(
			array(
				'HelloWorld' => $hw,
				'contactForm' => $contactForm,
			)	
		);
	}
}