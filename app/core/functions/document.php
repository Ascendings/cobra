<?php

// Echoes out the HTML needed for the header and opens the body tag
function renderHeader($data = ['title' => '', 'meta' => [], 'css' => [], 'js' => []]) {
	echo '<!DOCTYPE html><html><head>'; // Document type and html opener
	echo '<meta charset="UTF-8">'; // HTML charset
	echo '<title>' . $data['title'] . '</title>'; // Page title
	// Load external CSS resources
	loadResources($data, 'css');
	// Load external Javascript resources
	loadResources($data, 'js');
	echo '</head><body>';
}

// Echoes out the closing tags
function renderCloser() {
	echo '</body></html>';
}

// Loads an array of external resources for the web page, if they exist
function loadResources($data, $res) {
	if (array_key_exists($res, $data)) {
		// Check if there are values in the css array
		if (array_values($data[$res])) {
			if ($res == 'css') {
				$css = $data[$res];
				// Loop through the css links
				for ($i = 0; $i < count($css); $i++) {
					echo '<link rel="stylesheet" type="text/css" href="' . $css[$i] . '" />'; // Print out the css stylesheet link
				}
			} else if ($res == 'js') {
				$js = $data[$res];
				// Loop through the js links
				for ($i = 0; $i < count($js); $i++) {
					echo '<script type="text/javascript" src="' . $js[$i] . '"></script>'; // Print out the javascript link
				}
			}
		}
	}
}

// Loads a shared view resource
function loadSharedView($file, $data = '') {
	$path = '../app/views/shared/' . $file;
	if (file_exists($path)) {
		require_once "{$path}";
	} else {
		die('The shared view "' . $file . '" does not exist.');
	}
}

// Loads an error page
// This will load an html file before a php file!
function loadError($header) {
	$file = '../app/views/error/' . $header . '.html';
	if (file_exists($file)) {
		include $file;
		return true;
	}
	
	$file = '../app/views/error/' . $header . '.php';
	if (file_exists($file)) {
		include $file;
		return true;
	}

	return false;
}

