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
	'version' => '3.0.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '10.4.0-10.99.99',
			'addressmgmt' => '5.0.0-5.99.99',

		),
		'conflicts' => array(
		),
		'suggests' => array(
            'femanager' => '6.0.0-6.99.99',
		),
	),
);
