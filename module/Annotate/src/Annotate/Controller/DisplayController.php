<?php

namespace Annotate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Annotate\Form\ContactForm;
use Annotate\Form\ContactFilter;
use Zend\Mvc;

class DisplayController extends AbstractActionController 
{
	public function displayAction()
	{
		$request = $this->getRequest();
		$userName = '';
		$userLastName = '';
		
		if ($request->isPost()) 
		{
			$contactFilter = new ContactFilter();
			$contactFilter = $contactFilter->getInputFilter();
			$contactFilter->setData($_POST);
			
			if (!$contactFilter->isValid())
			{
				$errorMessages = '';
				foreach ($contactFilter->getInvalidInput() as  $error)
				{
					foreach ($error->getMessages() as $message)
					{
						$errorMessages .= '<br />' . $message . '<br />';
					}
				}
				throw new \Exception($errorMessages);
			}
			else 
			{
				if ($request->getPost('userName') && $request->getPost('userLastName'))
				{
					$userName = $request->getPost('userName');
					$userLastName = $request->getPost('userLastName');
					// echo $request->getPost('Azeaze') == ''; // Lorsqu'une variable n'existe pas, elle vaut ''.
				}
				else
				{
					throw new \Exception("Wrong or undefined data send via post method.");
				}
				
				return new ViewModel(array(
						'userName' => $userName,
						'userLastName' => $userLastName,
				));
			}
			
			
		}
		else 
		{
			throw new \Exception("You can't access this page like this.");
		}
		
		
	}
}

?>