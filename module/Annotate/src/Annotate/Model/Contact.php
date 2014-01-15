<?php
namespace Annotate\Model;

class Contact 
{
	public $id = null;
	public $userLastName = null;
	
	public function exchangeArray($data)
	{
		$this->id =  $data['id'];
		$this->userLastName = $data['userLastName'];
	}
}