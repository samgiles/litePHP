<?php
/**
 * Maps a URI path to a Class.
 * @author Samuel Giles
 */
class UriMapper extends RestUriMapper {
	
	public function getRestResource($dispatchedValues) {
		
		
		$result = split('/', trim($dispatchedValues['URI'], '/\\'));
		
		if ($result[3] == 'posts') {
			return new Posts($dispatchedValues);
		}
		parent::getRestResource($dispatchedValues);
	}
}