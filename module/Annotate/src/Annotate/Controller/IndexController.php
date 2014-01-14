<?php
namespace Annotate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		$hw = 'Hello World !';
		return new ViewModel(
			array(
				'HelloWorld' => $hw,
			)	
		);
	}
}