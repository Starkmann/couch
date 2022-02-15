<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Couch',
	'List',
	array(
		\Eike\Couch\Controller\CouchController::class => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		\Eike\Couch\Controller\CouchController::class => 'new, create, delete, update',
		
	)
);
