<?php

return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:couch/Resources/Private/Language/locallang_db.xlf:tx_couch_domain_model_couch',
		'label' => 'description',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'description,date,space,route,returning,provider,destination,start,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('couch') . 'Resources/Public/Icons/tx_couch_domain_model_couch.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, description, begin, end, space, provider, address, categories',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, description;;;richtext:rte_transform[mode=ts_links], begin, end, space, provider, address, categories, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_couch_domain_model_couch',
				'foreign_table_where' => 'AND tx_couch_domain_model_couch.pid=###CURRENT_PID### AND tx_couch_domain_model_couch.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:couch/Resources/Private/Language/locallang_db.xlf:tx_couch_domain_model_couch.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'module' => array(
							'name' => 'wizard_rich_text_editor',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'wizard_rte.php'
							)
						),
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'begin' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:couch/Resources/Private/Language/locallang_db.xlf:tx_couch_domain_model_couch.begin',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'end' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:couch/Resources/Private/Language/locallang_db.xlf:tx_couch_domain_model_couch.end',
				'config' => array(
						'type' => 'input',
						'size' => 10,
						'eval' => 'datetime',
						'checkbox' => 1,
						'default' => time()
				),
		),
		'space' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:couch/Resources/Private/Language/locallang_db.xlf:tx_couch_domain_model_couch.space',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'provider' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:couch/Resources/Private/Language/locallang_db.xlf:tx_couch_domain_model_couch.provider',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'fe_users',
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		'address' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:couch/Resources/Private/Language/locallang_db.xlf:tx_couch_domain_model_couch.address',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_addressmgmt_domain_model_address',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
	),
);