<?php
/**
 * 
 * @author user
 *
 */
class DBAuth implements Authenticate {

	protected $_table;
	protected $_identity;
	protected $_credential;
	protected $_additionalConditions;
	
	/**
	 * Constructs a new Database Authentication adapter.  This authenticates credentials against a database.
	 * @param string $table The table that holds credentials.
	 * @param string $identity The field name that contains the identity information eg. 'username'
	 * @param string $credential The field name that contains the credential information e.g 'paassword'
	 * @param array $additionalConditions An array of any more conditions as SQL conditions e.g. { "AND {field} != '{CONDITION}'", "OR {field} > {condition}" }
	 */
	public function __contruct ($table, $identity, $credential, $additionalConditions) {
		$this->_table = table;
		$this->_identity = $identity;
		$this->_credential = $credential;
		$this->_additionalConditions = $additionalConditions;
	}
	
	public function authenticate($identity, $credential){
		// Authenticate the user using the DB.
		
		
		if (isset($_SESSION['auth']) ){
			$session = $_SESSION['auth'];
			if ($session->getIdentity() === $identity){
				return true;
			} else {
				return false;
			}
		} 
		
		// Build an SQL statement
		$sqlStatement = "SELECT * FROM $this->_table WHERE $this->_identity == '$identity'";
		
		foreach ($this->_additionalConditions as $condition) {
			$sqlStatement .= " $condition";  // The space separates the conditions in the built sql.
		}
		
		$pdo = Database::getHandle();
		$pdostatement= $pdo->prepare($sqlStatement);
		$pdostatement->execute();
		
		$row = $pdostatement->fetch(PDO::FETCH_ASSOC);
		
		if ($row[$this->_credential] == $credential){
			// Create a session_auth storage
			$sessionStore = new session_auth("auth", $identity, array ( 'time' => time() ));
		} else {
			$sessionStore = null;
		}
		
		return $sessionStore !== null;
	}
}