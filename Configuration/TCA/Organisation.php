<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_fnnaddress_domain_model_organisation'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_fnnaddress_domain_model_organisation']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, alternative_name, note, images, address, persons, groups, contents, categories',
	),
	'types' => array(
		'1' => array('showitem' => '
		        sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource,
		        --palette--;LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tca_palettes.names;names,
		        address,
            --div--;LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tca_tabs.relations,
                images, groups, persons, categories,
            --div--;LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tca_tabs.contents,
                contents,
            --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tca_palettes.access;access'),
	),
	'palettes' => array(
        'names' => array(
            'showitem' => '
                name, alternative_name,
                --linebreak--,
                note',
            'canNotCollapse' => 1
        ),
        'access' => array(
            'showitem' => '
                hidden;;1,
                --linebreak--,
                starttime, endtime',
            'canNotCollapse' => 1
        ),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
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
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_fnnaddress_domain_model_organisation',
				'foreign_table_where' => 'AND tx_fnnaddress_domain_model_organisation.pid=###CURRENT_PID### AND tx_fnnaddress_domain_model_organisation.sys_language_uid IN (-1,0)',
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

		'name' => array(
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_organisation.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'alternative_name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_organisation.alternative_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'note' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_organisation.note',
			'config' => array(
				'type' => 'text',
				'rows' => 6,
				'cols' => 30
			),
		),
		'images' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_organisation.images',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'images',
				array('maxitems' => 999),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'address' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_organisation.address',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_fnnaddress_domain_model_address',
				'minitems' => 0,
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
		'persons' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_organisation.persons',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_fnnaddress_domain_model_person',
				'foreign_field' => 'organisation',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 1,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1,
                    'useSortable' => 1
				),
			),
		),
		'groups' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_organisation.groups',
			'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_fnnaddress_domain_model_group',
                'foreign_table' => 'tx_fnnaddress_domain_model_group',
				'MM' => 'tx_fnnaddress_group_organisation_mm',
                'MM_opposite_field' => 'group',
				'size' => 5,
				'maxitems' => 100,
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                    )
                )
			),
		),
        'contents' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_organisation.contents',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tt_content',
                'foreign_field' => 'fnn_address_organisation',
                'maxitems'      => 9999,
                'appearance' => array(
                    'collapse' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1,
                    'useSortable' => 1
                ),
            ),
        ),
        'categories' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_organisation.categories',
            'config' => array(
                'type' => 'select',
                'renderMode' => 'tree',
                'treeConfig' => array(
                    'parentField' => 'parent',
                    'appearance' => array(
                        'showHeader' => TRUE,
                        'allowRecursiveMode' => TRUE,
                        'expandAll' => TRUE,
                        'maxLevels' => 99,
                        'width' => 400
                    ),
                ),
                'MM' => 'sys_category_record_mm',
                'MM_match_fields' => array(
                    'fieldname' => 'categories',
                    'tablenames' => 'tx_fnnaddress_domain_model_organisation',
                ),
                'MM_opposite_field' => 'items',
                'foreign_table' => 'sys_category',
                'foreign_table_where' => ' AND (sys_category.sys_language_uid = 0 OR sys_category.l10n_parent = 0) ORDER BY sys_category.sorting',
                'size' => 15,
                'autoSizeMax' => 20,
                'minitems' => 0,
                'maxitems' => 99
            )
        )
		
	),
);
