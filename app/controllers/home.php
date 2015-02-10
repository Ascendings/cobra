<?php

class Home extends Controller {

	public function index($data = '') {
		// Display the home/index view
		$this->view('home/index');
	}

}
