<?php

class Controller {
	
	// Loads a model
	// This isn't exactly needed, as the models are being autoloaded
	protected function model($model) {
		if (file_exists('../app/models/' . $model . '.php')) {
			require_once '../app/models/' . $model . '.php';
			return new $model();
		}
	}

	// Loads a view
	protected function view($view, $data = []) {
		if (file_exists('../app/views/' . $view . '.php')) {
			require_once '../app/views/' . $view . '.php';
		}
	}

}
