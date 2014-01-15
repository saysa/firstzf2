<?php
namespace Annotate\Model;

class Note
{
	public $id = null;
	public $note = null;
	
	public function exchangeArray($data)
	{
		$this->id =  $data['id'];
		$this->note = $data['note'];
	}
}