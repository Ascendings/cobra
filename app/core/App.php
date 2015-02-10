<?php

// Application class - handles application routing
class App {

	protected $controller = 'home'; // Default controller
	protected $method = 'index'; // Default method
	protected $params = []; // Parameters

	public function __construct() {
		$url = $this->parseUrl(); // Call the parseUrl function to parse the url

		// Check if controller file exists
		if (file_exists('../app/controllers/' . $url[0] . '.php')) {
			$this->controller = $url[0]; // Set controller and lowercase it
			array_shift($url); // Remove controller value from the array
		}

		// Include the file for the controller
		require_once '../app/controllers/' . $this->controller . '.php';
		// Set the controller
		$this->controller = new $this->controller;

		// Check if the method is set in the url
		if (isset($url[0])) {
			// Check if method exists in the controller
			if (method_exists($this->controller, $url[0])) {
				$this->method = $url[0]; // Set the method
				array_shift($url); // Remove the method value from the array
			}
		}

		// Set the parameters to the remaining values, set as empty array if none exist
		$this->params = $url ? array_values($url) : [];

		// Call the function from the controller, pass the parameters
		call_user_func_array([$this->controller, $this->method], [$this->params]);
	}

	// Trims, sanitizes, then parses the request to an array
	protected function parseUrl() {
		if (isset($_GET['q'])) {
			// Get the GET request
			$query = $_GET['q'];
			// Trim leading and trailing forward-slashes from the query if they exist
			$query = ltrim(rtrim($query, '/'), '/');
			// Sanitize the string to prevent nasty surprises
			$query = filter_var($query, FILTER_SANITIZE_URL);
			return $url = explode('/', $query);
		}
	}

}
