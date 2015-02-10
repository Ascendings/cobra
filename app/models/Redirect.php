<?php

class Redirect {

	public static function to($location = null) {
		if ($location) {
			if (is_numeric($location)) {
				switch ($location) {
					case 404:
						header('HTTP/1.0 404 Not Found');
						loadError(404);
						exit();
					case 500:
						header('HTTP/1.0 500 Internal Server Error');
						loadError(500);
						exit();
					break;
				}
			}
			header('Location: ' . $location);
			exit();
		}
	}

}
