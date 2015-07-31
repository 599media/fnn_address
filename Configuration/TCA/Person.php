<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_fnnaddress_domain_model_person'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_fnnaddress_domain_model_person']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, first_name, middle_name, last_name, name, gender, birthday, position, title, images, related_persons, address, groups, organisation, contents, categories',
	),
	'types' => array(
		'1' => array('showitem' => '
		        sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource,
		        --palette--;LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tca_palettes.names;names,
		        --palette--;LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tca_palettes.details;details,
		        address,
            --div--;LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tca_tabs.relations,
                images, groups, organisation, related_persons, related_from, categories,
            --div--;LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tca_tabs.contents,
                contents,
            --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tca_palettes.access;access'),
	),
	'palettes' => array(
        'names' => array(
            'showitem' => '
                name, gender,
                --linebreak--,
                first_name, middle_name, last_name',
            'canNotCollapse' => 1
        ),
        'details' => array(
            'showitem' => '
                position, title,
                --linebreak--,
                birthday',
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
				'foreign_table' => 'tx_fnnaddress_domain_model_person',
				'foreign_table_where' => 'AND tx_fnnaddress_domain_model_person.pid=###CURRENT_PID### AND tx_fnnaddress_domain_model_person.sys_language_uid IN (-1,0)',
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

		'first_name' => array(
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.first_name',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim'
			),
		),
		'middle_name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.middle_name',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim'
			),
		),
		'last_name' => array(
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.last_name',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim'
			),
		),
		'name' => array(
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.name',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim'
			),
		),
		'gender' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.gender',
			'config' => array(
				'type' => 'select',
                'items' => array(
                    array("LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:select_field.choose", 0),
                    array("LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:gender.male", 1),
                    array("LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:gender.female", 2)
                )
			),
		),
		'birthday' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.birthday',
			'config' => array(
                'dbType' => 'date',
                'type' => 'input',
                'size' => 7,
                'eval' => 'date',
                'checkbox' => 0,
                'default' => '0000-00-00'
			),
		),
		'position' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.position',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim'
			),
		),
		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.title',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim'
			),
		),
		'images' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.images',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'images',
				array('maxitems' => 999),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'related_persons' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.related_persons',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_fnnaddress_domain_model_person',
                'foreign_table' => 'tx_fnnaddress_domain_model_person',
                'MM_opposite_field' => 'related_from',
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 100,
                'MM' => 'tx_fnnaddress_person_person_mm',
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                    )
                )
            )
		),
        'related_from' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.related_persons_from',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'foreign_table' => 'tx_fnnaddress_domain_model_person',
                'allowed' => 'tx_fnnaddress_domain_model_person',
                'size' => 5,
                'maxitems' => 100,
                'MM' => 'tx_fnnaddress_person_person_mm',
                'readOnly' => 1,
            )
        ),
		'address' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.address',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_fnnaddress_domain_model_address',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 1,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'groups' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.groups',
			'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_fnnaddress_domain_model_group',
                'foreign_table' => 'tx_fnnaddress_domain_model_group',
                'MM_opposite_field' => 'group',
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 100,
                'MM' => 'tx_fnnaddress_group_person_mm',
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                    )
                )
			),
		),
		'organisation' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.organisation',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_fnnaddress_domain_model_organisation',
                'items' => array(
                    array('LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:select_field.choose',0)
                )
            ),
		),
//        'contents' => array(
//            'exclude' => 0,
//            'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.contents',
//            'config' => array(
//                'type' => 'inline',
//                'foreign_table' => 'tt_content',
//                'foreign_field' => 'fnn_address_person',
//                'maxitems'      => 9999,
//                'appearance' => array(
//                    'collapse' => 0,
//                    'levelLinksPosition' => 'top',
//                    'showSynchronizationLink' => 1,
//                    'showPossibleLocalizationRecords' => 1,
//                    'showAllLocalizationLink' => 1,
//                    'useSortable' => 1
//                ),
//            ),
//        ),
		'content_elements' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.contents',
			'config' => array(
				'type' => 'inline',
				'allowed' => 'tt_content',
				'foreign_table' => 'tt_content',
				'foreign_sortby' => 'sorting',
				'foreign_field' => 'fnn_address_person',
				'minitems' => 0,
				'maxitems' => 99,
				'appearance' => array(
					'collapseAll' => 1,
					'expandSingle' => 1,
					'levelLinksPosition' => 'bottom',
					'useSortable' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showRemovedLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1,
					'showSynchronizationLink' => 1,
					'enabledControls' => array(
						'info' => FALSE,
					)
				)
			)
		),
        'categories' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person.categories',
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
                    'tablenames' => 'tx_fnnaddress_domain_model_person',
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
