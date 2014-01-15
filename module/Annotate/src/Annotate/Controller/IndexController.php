<?php
namespace Annotate\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Annotate\Form\ContactForm;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;

use Annotate\Model\Contact;

class IndexController extends AbstractActionController
{
	protected $contactTable;
	protected $noteTable;
	
	public function getContactTable()
	{
		if (!$this->contactTable) 
		{
			$sm = $this->getServiceLocator();
			$this->contactTable = $sm->get('ContactTable');
		}
		
		return $this->contactTable;
	}
	
	public function indexAction()
	{
		
		$contacts = $this->getContactTable()->fetchAll();
		$contacts->buffer();
		
		
		// Service Manager
		$sm = $this->getServiceLocator();
		$adapter = $sm->get('MyAdapter');
		
		/**
		 * Methode 1 : Adapter
		 */
		$requete = $adapter->query("SELECT * FROM contact");
		$results = $requete->execute();
		
		$resultSet = new ResultSet();
		$resultSet->initialize($results);
		$resultSet->buffer();
		
		foreach ($resultSet as $result)
		{
			echo $result->id . '<br />';
			echo $result->userName . '<br />';
			echo $result->userLastName . '<br />';
		}
		
		/**
		 * Method 2 : Sql
		 */
		$sql = new Sql($adapter, 'note'); // nom de la table
		$select = $sql->select();
		$requete = $sql->prepareStatementForSqlObject($select);
		$results = $requete->execute();
		
		$resultSet = new ResultSet();
		$resultSet->initialize($results);
		$resultSet->buffer();
		
		/*foreach ($resultSet as $result)
		{
			var_dump($result);
		}*/
		
		/**
		 * Method 2 : Sql with Jointure
		 */
		$sql = new Sql($adapter);
		$select = $sql->select();
		$select
			->join('note',
				'id_contact = t1.id',
				array('id', 'id_contact', 'note'),
				$select::JOIN_INNER
			)
			->from(array(
				't1' => 'contact',
			))
			->where(array(
				't1.id <> 2',
			));
			
		echo $sql->getSqlStringForSqlObject($select);
		$requete = $sql->prepareStatementForSqlObject($select);
		$results = $requete->execute();
		$resultSet = new ResultSet();
		$resultSet->initialize($results);
		$resultSet->buffer(); 
		
		foreach ($resultSet as $result)
		{
			echo 'id : ' . $result->id . '<br />';
			echo 'id_contact : ' . $result->id_contact . ' Nom : ' . $result->userLastName . '<br />';
			echo 'note : ' . $result->note . '<br />';
		}
		
		/**
		 * ResultSet : aller plus loin
		 */
		$requete = $adapter->query('SELECT * FROM contact');
		$results = $requete->execute();

		$resultSet = new ResultSet();
		$resultSet->setArrayObjectPrototype(new Contact());
		$resultSet->initialize($results);
		$resultSet->buffer();
		
		foreach ($resultSet as $contact)
		{
			echo '<br />-----<br />';
			echo $contact->id;
			//echo $contact->userName;
			echo $contact->userLastName;
			echo '<br />-----<br />';
		}
		
		$tableGateway_contact = $sm->get('ContactTable');
		$tableGateway_note = $sm->get('NoteTable');
		
		
		
		$hw = 'Hello World !';
		
		$contactForm = new ContactForm();
		
		return new ViewModel(
			array(
				'HelloWorld' => $hw,
				'contactForm' => $contactForm,
				'contacts' => $contacts,
			)	
		);
	}
}