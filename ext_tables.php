<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'address');

/************************
 * Register Plugins     *
 ************************/

$extensionName = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY));

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Displaypersons',
	'Display Persons'
);
$pluginName = strtolower('Displaypersons');
$pluginSignature = $extensionName.'_'.$pluginName;
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY . '/Configuration/FlexForms/displayPersons.xml');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Displayorganisations',
	'Display Organisations'
);
$pluginName = strtolower('Displayorganisations');
$pluginSignature = $extensionName.'_'.$pluginName;
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY . '/Configuration/FlexForms/displayOrganisations.xml');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Displaygroups',
	'Display Groups'
);
$pluginName = strtolower('Displaygroups');
$pluginSignature = $extensionName.'_'.$pluginName;
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY . '/Configuration/FlexForms/displayGroups.xml');

/************************
 * TCA Configuration    *
 ************************/

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_fnnaddress_domain_model_person', 'EXT:fnn_address/Resources/Private/Language/locallang_csh_tx_fnnaddress_domain_model_person.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_fnnaddress_domain_model_person');
$GLOBALS['TCA']['tx_fnnaddress_domain_model_person'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_person',
		'label' => 'last_name',
		'label_alt' => 'first_name',
        'label_alt_force' => 1,
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
		'searchFields' => 'first_name,middle_name,last_name,name,gender,birthday,position,title',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Person.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/person_icon_16x16px.png'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_fnnaddress_domain_model_address', 'EXT:fnn_address/Resources/Private/Language/locallang_csh_tx_fnnaddress_domain_model_address.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_fnnaddress_domain_model_address');
$GLOBALS['TCA']['tx_fnnaddress_domain_model_address'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_address',
		'label' => 'location_title',
        'label_alt' => 'street_address',
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
		'searchFields' => 'location_title,street_address,city,zip,country,region,building,room,email,telephone,mobile,fax,web,latitude,longitude',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Address.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/address_icon_16x16px.png'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_fnnaddress_domain_model_organisation', 'EXT:fnn_address/Resources/Private/Language/locallang_csh_tx_fnnaddress_domain_model_organisation.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_fnnaddress_domain_model_organisation');
$GLOBALS['TCA']['tx_fnnaddress_domain_model_organisation'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_organisation',
		'label' => 'name',
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
		'searchFields' => 'name,alternative_name,note,categories',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Organisation.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/organisation_icon_16x16px.png'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_fnnaddress_domain_model_group', 'EXT:fnn_address/Resources/Private/Language/locallang_csh_tx_fnnaddress_domain_model_group.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_fnnaddress_domain_model_group');
$GLOBALS['TCA']['tx_fnnaddress_domain_model_group'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:tx_fnnaddress_domain_model_group',
		'label' => 'name',
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
		'searchFields' => 'name,persons,organisations',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Group.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/group_icon_16x16px.png'
	),
);

//TCA for tt_content
$TCA['tt_content']['columns']['fnn_address_organisation']['config']['type'] = 'passthrough';
$TCA['tt_content']['columns']['fnn_address_person']['config']['type'] = 'passthrough';

/************************************************
 * register custom indexer hook for ke_search   *
 ************************************************/

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['registerIndexerConfiguration'][]
    = 'EXT:fnn_address/Classes/Hooks/class.organisation_kesearchhooks.php:organisation_kesearchhooks';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['customIndexer'][]
    = 'EXT:fnn_address/Classes/Hooks/class.organisation_kesearchhooks.php:organisation_kesearchhooks';

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['registerIndexerConfiguration'][]
    = 'EXT:fnn_address/Classes/Hooks/class.person_kesearchhooks.php:person_kesearchhooks';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['customIndexer'][]
    = 'EXT:fnn_address/Classes/Hooks/class.person_kesearchhooks.php:person_kesearchhooks';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup('plugin.tx_kesearch_pi2.additionalPathForTypeIcons=EXT:fnn_address/Resources/Public/Icons');
