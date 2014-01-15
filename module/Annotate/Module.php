<?php
namespace Annotate;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Annotate\Model\Contact;
use Annotate\Model\ContactTable;
use Annotate\Model\Note;
use Annotate\Model\NoteTable;

class Module
{
	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
				__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				)
			),
		);
	}
	
	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}
	
	public function getServiceConfig()
	{
		return array(
			'factories' => array(
				'ContactTable' => function($sm) {
					$adapter = $sm->get('MyAdapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new Contact());
					$tableGateway = new TableGateway('contact', $adapter, null, $resultSetPrototype);

					return new ContactTable($tableGateway);
				},
				'NoteTable' => function($sm) {
					$adapter = $sm->get('MyAdapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new Note());
					$tableGateway = new TableGateway('note', $adapter, null, $resultSetPrototype);
				
					return new NoteTable($tableGateway);
				},
			),
		);
	}
}