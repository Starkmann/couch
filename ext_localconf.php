<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Eike.' . $_EXTKEY,
	'List',
	array(
		'Couch' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Couch' => 'new, create, delete, update',
		
	)
);
