<?php
namespace Annotate\Model;

use Zend\Db\TableGateway\TableGateway;

class NoteTable
{
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	
	// Methode pour obtenir toutes les donnees
	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet; // Les donnees seront formatees selon le prototype "Note"
	}
}