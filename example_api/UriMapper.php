<?php
/**
 * Maps a URI path to a Class.
 * @author Samuel Giles
 */
class UriMapper {
	public static function getRestResource($dispatchedValues) {
		$result = pathinfo($dispatchedValues['URI']);
		
		if ($result['basename'] == 'posts') {
			return new Posts($dispatchedValues);
		}
	}
}