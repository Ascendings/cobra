<?php

/* This is where you would place crap that you would want executed/set
 *	whenever this app is loaded, like the global variables, autoload
 *	function, starting a session, etc.
 */

session_start();

// Global variables
$GLOBALS['config'] = array(
	// You place all of your global variables here
	// Each config element would be accessed by Config::get('index1/index2')
	// Getting the host from the example config below would be Config::get('ldap/host')
	// example config:
	'ldap' => array(
		'host' => 'ldap.example.com',
		'bind_dn' => 'cn=admin,ou=Users,dc=example,dc=com',
		'bind_pass' => 'secret',
		'base_dn' => 'dc=example,dc=com'
	)
);

// What do you want to do when a new class is called?
spl_autoload_register(function($class) {
	require_once '../app/models/' . $class . '.php';
});

// This includes all of the files inside of ./functions/
foreach (glob("../app/core/functions/*.php") as $filename) {
    include $filename;
}
