<?php

namespace Annotate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DisplayController extends AbstractActionController 
{
	public function displayAction()
	{
		$request = $this->getRequest();
		$userName = '';
		$userLastName = '';
		
		if ($request->isPost()) 
		{
			if ($request->getPost('userName') && $request->getPost('userLastName')) 
			{
				$userName = $request->getPost('userName');
				$userLastName = $request->getPost('userLastName');
				// echo $request->getPost('Azeaze') == ''; // Lorsqu'une variable n'existe pas, elle vaut ''.
			}
			else 
			{
				throw new \Exception("userName et userLastName non définis...");	
			}
		}
		else 
		{
			throw new \Exception("Pas de variables post définies...");
		}
		
		return new ViewModel(array(
			'userName' => $userName,
			'userLastName' => $userLastName,
		));
	}
}

?>