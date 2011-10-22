<?php
include('PageModel.php');
/**
 * The base class for a controller.  Controllers, control the processing that will occur in a web request.
 * @author Samuel Giles
 *
 */
abstract class Controller {
	
	/**
	 * The model for the page or output that this Conroller will interface with.
	 * @var PageModel
	 */
	private $_pageModel;
	
	protected $_skin;
	protected $_layout;
	protected $_content;
	
	/**
	 * Adds a new variable to the page model.
	 * @param string $key  The key of the variable that is to be added to the page model.
	 * @param mixed $value The value of the variable that is to be added to the page model.
	 */
	protected function addViewVariable($key, $value){
		if (!isset($this->_pageModel) || is_null($this->_pageModel)){
			$this->_pageModel = new PageModel();
		}
		
		$this->_pageModel->addPageVariable($key, $value);
		return $this;
	}
	
	public function getSkin(){
		return $this->_skin;
	}
	
	public function getLayout() {
		return $this->_layout;
	}
	
	public function getContent(){
		return $this->_content;
	}
	
	/**
	 * Gets the page model for this controller.
	 */
	public function getPageModel(){
		return $this->_pageModel;
	}
}