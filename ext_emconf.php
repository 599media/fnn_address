<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "fnn_address"
 *
 * Auto generated by Extension Builder 2014-09-19
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Address Organisation Tool',
	'description' => '',
	'category' => 'plugin',
	'author' => '599media',
	'author_email' => 'info@599media.de',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => '1',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2.1-6.2.99',
            'extbase' => '6.2.1',
            'fluid' => '6.2.1',
		),
		'conflicts' => array(
		),
		'suggests' => array(
            'static_info_tables' => '6.1',
		),
	),
);