<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Couch',
	'List',
	'Couch'
);
$settings = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class)->get('couch');
$pluginSignature = str_replace('_','','couch') . '_list';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . 'couch' . '/Configuration/FlexForms/flexform_list.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('couch', 'Configuration/TypoScript', 'Couch');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_couch_domain_model_couch', 'EXT:couch/Resources/Private/Language/locallang_csh_tx_couch_domain_model_couch.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_couch_domain_model_couch');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'couch',
    'tx_couch_domain_model_couch',
    'categories',
    array(
        'fieldConfiguration' => array(
	            'renderType' => 'selectTree',
				'renderMode' => 'tree',
				'treeConfig' => array(
						'parentField' => 'parent',
						'rootUid' => $settings['couchCategory'],
						'appearance' => array(
								'expandAll' => TRUE,
								'showHeader' => TRUE,
						),
				),
	        )
    )
);
