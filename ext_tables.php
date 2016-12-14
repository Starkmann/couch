<?php
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Eike.' . $_EXTKEY,
	'List',
	'Couch'
);
$settings = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['couch']);
$pluginSignature = str_replace('_','',$_EXTKEY) . '_list';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Couch');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_couch_domain_model_couch', 'EXT:couch/Resources/Private/Language/locallang_csh_tx_couch_domain_model_couch.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_couch_domain_model_couch');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    $_EXTKEY,
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
