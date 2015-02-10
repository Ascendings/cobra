<?php

// Echoes out the HTML needed for the header and opens the body tag
function renderHeader($data = ['title' => '', 'css' => [], 'js' => []]) {
	echo '<!DOCTYPE html><html><head>'; // Document type and html opener
	echo '<meta charset="UTF-8">'; // HTML charset
	echo '<title>' . $data['title'] . '</title>'; // Page title
	echo '<meta name="author" content="Gregory Ballantine">'; // Author
	// Load external CSS resources
	echo '<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">';
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
