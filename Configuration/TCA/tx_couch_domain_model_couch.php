<?php

return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:couch/Resources/Private/Language/locallang_db.xlf:tx_couch_domain_model_couch',
		'label' => 'description',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'versioningWS' => true,

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
		'iconfile' => 'EXT:couch/Resources/Public/Icons/tx_couch_domain_model_couch.gif'
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid,--palette--,l10n_parent,l10n_diffsource,hidden,--palette--;;1,description,--palette--,begin,end,space,provider,address,categories,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,starttime,endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
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
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
				'renderType' => 'inputDateTime',
				['behaviour' => ['allowLanguageSynchronization' => true]],
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
				'renderType' => 'inputDateTime',
				['behaviour' => ['allowLanguageSynchronization' => true]],
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
				'fieldControl' => ['fullScreenRichtext' => ['disabled' => false, 'options' => ['title' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext.W.RTE']]]
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
				'default' => time(),
				'renderType' => 'inputDateTime'
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
						'default' => time(),
						'renderType' => 'inputDateTime'
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
				'renderType' => 'selectSingle',
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