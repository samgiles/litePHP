<?php
abstract class RestCollection extends RestResource {
	
	protected $_collection;
	
	private function getJson() {
		// output collections
		return json_encode($this->_collection);
	}
	
	public function getRepresentation() {
		return $this->getJson();
	}
}