<?php
class session_auth extends session_store {
	
	protected $_identity;
	
	protected $_additionalInformation; // Array of additional info.
	
	public function __construct ($key, $identity, $additionalInformation){
		$this->_key = $key;
		$this->_identity = $identity;
		$this->_additionalInformation = $additionalInformation;
		$_SESSION[$key] = $this;
	}
	
	public function getAdditionalInformation () {
		return $this->_additionalInformation;
	}
	
	public function getIdentity() {
		return $this->_identity;
	}
	
}