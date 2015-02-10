<?php
// This will render the document's head and crap.
renderHeader([
	'title' => 'Hello, Cobra!', // Title of the page
	'css' => [ // CSS documents
		'/css/main.css'
	],
	'js' => [ // Javascripts
		//'//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', // jQuery 1.11.1
		'/js/bacon.js'
	]
]);

// Load the view in shared/hello.html
loadSharedView('hello.html');
?>

<!-- You can put HTML here -->

<?php

renderCloser(); // Close the page

?>
