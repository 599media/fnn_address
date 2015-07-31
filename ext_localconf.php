<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
	<INCLUDE_TYPOSCRIPT: source="FILE:EXT:'.$_EXTKEY.'/Configuration/TSConfig/FnnAddress.pts">
');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Fnn.' . $_EXTKEY,
	'Displaypersons',
	array(
		'Person' => 'list, show'
		
	),
	// non-cacheable actions
	array(
		'Person' => '',
		'Organisation' => '',
		'Group' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Fnn.' . $_EXTKEY,
	'Displayorganisations',
	array(
		'Organisation' => 'list, show',

	),
	// non-cacheable actions
	array(
		'Person' => '',
		'Organisation' => '',
		'Group' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Fnn.' . $_EXTKEY,
	'Displaygroups',
	array(
		'Group' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Person' => '',
		'Organisation' => '',
		'Group' => '',
		
	)
);

$TYPO3_CONF_VARS['SC_OPTIONS']['tce']['formevals']['tx_fnnaddress_double6'] = 'EXT:fnn_address/Classes/Utility/class.tx_fnnaddress_double6.php';