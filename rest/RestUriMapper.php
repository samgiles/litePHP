<?php
abstract class RestUriMapper {
	public function getRestResource($dispatchedValues) {
		
		throw new NotFoundException("URI Not Found", 404);
	}
}