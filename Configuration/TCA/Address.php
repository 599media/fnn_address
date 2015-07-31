<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_fnnaddress_domain_model_address'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_fnnaddress_domain_model_address']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, location_title, street_address, city, zip, country, region, building, room, latitude, longitude, email, telephone, mobile, fax, web',
	),
	'types' => array(
		'1' => array('showitem' => '
                sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource,
                --palette--;LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tca_palettes.general_address;general_address,
                --palette--;LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tca_palettes.location;location,
                --palette--;LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tca_palettes.details;details,
                --palette--;LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tca_palettes.contact;contact,
		    --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tca_palettes.access;access'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
        'general_address' => array(
            'showitem' => '
                location_title,
                --linebreak--,
                street_address, zip, city,
                --linebreak--,
                region, country',
            'canNotCollapse' => 1
        ),
        'location' => array(
            'showitem' => 'latitude, longitude'
        ),
        'details' => array(
            'showitem' => 'building, room'
        ),
        'contact' => array(
            'showitem' => '
                email, web,
                --linebreak--,
                telephone, mobile, fax',
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
				'foreign_table' => 'tx_fnnaddress_domain_model_address',
				'foreign_table_where' => 'AND tx_fnnaddress_domain_model_address.pid=###CURRENT_PID### AND tx_fnnaddress_domain_model_address.sys_language_uid IN (-1,0)',
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

		'location_title' => array(
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.location_title',
			'config' => array(
				'type' => 'input',
				'size' => 31,
				'eval' => 'trim'
			),
		),
		'street_address' => array(
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.street_address',
			'config' => array(
				'type' => 'input',
				'size' => 19,
				'eval' => 'trim'
			),
		),
		'city' => array(
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.city',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim'
			),
		),
		'zip' => array(
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.zip',
			'config' => array(
				'type' => 'input',
				'size' => 6,
				'eval' => 'trim'
			),
		),
		'country' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.country',
            'config' => array(
                'type' => 'input',
                'size' => 21,
                'eval' => 'trim'
            ),
		),
		'region' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.region',
			'config' => array(
				'type' => 'input',
				'size' => 19,
				'eval' => 'trim'
			),
		),
        'building' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.building',
            'config' => array(
                'type' => 'input',
                'size' => 21,
                'eval' => 'trim'
            ),
        ),
		'room' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.room',
			'config' => array(
				'type' => 'input',
				'size' => 21,
				'eval' => 'trim'
			),
		),
        'latitude' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.latitude',
            'config' => array(
                'type' => 'input',
                'size' => 21,
                'eval' => 'tx_fnnaddress_double6'
            )
        ),
        'longitude' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.longitude',
            'config' => array(
                'type' => 'input',
                'size' => 21,
                'eval' => 'tx_fnnaddress_double6'
            )
        ),
		'email' => array(
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.email',
			'config' => array(
				'type' => 'input',
				'size' => 21,
				'eval' => 'trim'
			),
		),
		'telephone' => array(
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.telephone',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'eval' => 'trim'
			),
		),
		'mobile' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.mobile',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'eval' => 'trim'
			),
		),
		'fax' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.fax',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'eval' => 'trim'
			),
		),
		'web' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.web',
			'config' => array(
				'type' => 'input',
				'size' => 21,
				'eval' => 'trim'
			),
		),
		
	),
);

if(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('static_info_tables')) {

    $TCA['tx_fnnaddress_domain_model_address']['columns']['country'] = array(
        'exclude' => 1,
        'label' => 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address.country',
        'config' => array(
            'type' => 'select',
            'items' => array(
                array("LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:select_field.choose", 0),
            ),
            'foreign_table' => 'static_countries',
            'foreign_table_where' => 'ORDER BY static_countries.cn_short_en',
            'itemsProcFunc' => 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\ElementRenderingHelper->translateCountriesSelector',
            'size' => 1,
            'minitems' => 0,
            'maxitems' => 1
        ),
    );
}
