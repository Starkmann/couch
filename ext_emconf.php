<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "couch"
 *
 * Auto generated by Extension Builder 2016-06-06
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Couch',
	'description' => 'Manages sleeping places for events',
	'category' => 'plugin',
	'author' => 'Eike Starkmann',
	'author_email' => 'eike.starkmann@posteo.de',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '8.7.0-8.7.99',
			'addressmgmt' => '3.1.2-3.1.99',
			'femanager' => '4.2.0-4.2.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);
