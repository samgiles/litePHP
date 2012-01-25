<?php
class HttpCodes {
	
	/**
	 * Get the header information for a particular http code.
	 * @param $code
	 */
	public static function get($code) {
		
		
		if (in_array($code, HttpCodes::$_codes)){
			if (stristr(PHP_SAPI, 'cgi') == FALSE) {
				return 'HTTP/1.1 ' . $code .  ' ' . HttpCodes::$_codes[$code];
			} else {
				return "Status: " . $code . ' '. HttpCodes::$_codes[$code];
			}
		}
		
		return "HttpCodeNotValid";
	}
	
	private static $_codes = array(
		100 => "Continue", 
		101 => "Switching Protocols",
		200 => "Ok",
		201 => "Created",
		202 => "Accepted",
		203 => "Non-Authoritative Information",
		204 => "No Content",
		205 => "Reset Content",
		206 => "Partial Content",
		300 => "Multiple Choices",
		301 => "Moved Permanently",
		302 => "Found",
		303 => "See Other",
		304 => "Not Modified",
		305 => "Use Proxy",
		307 => "Temporary Redirect",
		400 => "Bad Request",
		401 => "Unauthorized",
		402 => "Payment Required",
		403 => "Forbidden",
		404 => "Not Found",
		405 => "Method Not Allowed",
		406 => "Not Acceptable",
		407 => "Proxy Authentication Required",
		408 => "Request Time Out",
		409 => "Conflict",
		410 => "Gone",
		411 => "Length Required",
		412 => "Precondition Failed",
		413 => "Request Entity Too Large",
		414 => "Request Uri Too Long",
		415 => "Unsupported Media Type",
		416 => "Requested Range Not Satisfiable",
		417 => "Expectation Failed",
		500 => "Internal Server Error",
		501 => "Not Implemented",
		502 => "Bad Gateway",
		503 => "Service Unavailable",
		504 => "Gateway Timeout",
		505 => "HTTP Version not Supported"
	);
	
}