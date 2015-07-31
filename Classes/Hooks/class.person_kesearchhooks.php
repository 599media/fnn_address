<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012-2014 Christian Bülter (kennziffer.com) <buelter@kennziffer.com>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/***************************************************************
 * This class is an example for a custom indexer for ke_seach,
 * a faceted search extension for TYPO3.
 * Please use it as a kickstarter for your own extensions.
 * It implements a simple indexer for fnn_address_person.
 ***************************************************************/

class person_kesearchhooks {


	/**
	 * Adds the custom indexer to the TCA of indexer configurations, so that
	 * it's selectable in the backend as an indexer type when you create a
	 * new indexer configuration.
	 *
	 * @param array $params
	 * @param type $pObj
	 */
	function registerIndexerConfiguration(&$params, $pObj) {

			// add item to "type" field
		$newArray = array(
				'Fnn Address Organisation Indexer',
				'fnnaddresspersons',
				TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('fnn_address') . 'Resources/Public/Icons/fnnaddresspersons.gif'
				);
		$params['items'][] = $newArray;

			// enable "sysfolder" field
		$GLOBALS['TCA']['tx_kesearch_indexerconfig']['columns']['sysfolder']['displayCond'] .= ',fnnaddresspersons';
	}

	/**
	 * Custom indexer for ke_search
	 *
	 * @param   array $indexerConfig Configuration from TYPO3 Backend
	 * @param   array $indexerObject Reference to indexer class.
	 * @return  string Output.
	 * @author  Christian Buelter <buelter@kennziffer.com>
	 * @since   Fri Jan 07 2011 16:01:51 GMT+0100
	 */
	public function customIndexer(&$indexerConfig, &$indexerObject) {
		if($indexerConfig['type'] == 'fnnaddresspersons') {
			$content = '';

			// get all the entries to index
			// don't index hidden or deleted elements, BUT
			// get the elements with frontend user group access restrictions
			// or time (start / stop) restrictions.
			// Copy those restrictions to the index.
			$fields = '*';
			$table = 'tx_fnnaddress_domain_model_person';
			$where = 'pid IN (' . $indexerConfig['sysfolder'] . ') AND hidden = 0 AND deleted = 0';
			$groupBy = '';
			$orderBy = '';
			$limit = '';
			$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($fields,$table,$where,$groupBy,$orderBy,$limit);
			$resCount = $GLOBALS['TYPO3_DB']->sql_num_rows($res);

				// Loop through the records and write them to the index.
			if($resCount) {
				while ( ($record = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) ) {
                    $content = '';
                    if((int)$record['address'] > 0){
                        $fields = 'street_address, city, zip, email, web, location_title';
                        $table = 'tx_fnnaddress_domain_model_address';
                        $where = 'pid IN (' . $indexerConfig['sysfolder'] . ') AND uid = ' . $record['address'] . ' AND hidden = 0 AND deleted = 0';
                        $resAddress = $GLOBALS['TYPO3_DB']->exec_SELECTquery($fields, $table, $where, $groupBy, $orderBy, $limit);
                        while ( ($addressRecord = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resAddress)) ) {
                            $content .= $addressRecord['location_title'] . "\n"
                                . $addressRecord['street_address'] . "\n" . $addressRecord['zip'] . " " . $addressRecord['city'] . "\n"
                                . $addressRecord['email'] . "\n" . $addressRecord['web'];
                        }
                    }
                    $address = $content;
                    if((int)$record['contents'] > 0){
                        $fields = 'header, bodytext';
                        $table = 'tt_content';
                        $where = 'pid IN (' . $indexerConfig['sysfolder'] . ') AND fnn_address_organisation = ' . $record['uid'] . ' AND hidden = 0 AND deleted = 0';
                        $resContent =  $GLOBALS['TYPO3_DB']->exec_SELECTquery($fields,$table,$where,$groupBy,$orderBy,$limit);
                        while ( ($contentRecord = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resContent)) ) {
                            $content .= strip_tags($contentRecord['header']) . "\n" . strip_tags($contentRecord['bodytext']);
                        }
                    }

					// compile the information which should go into the index
					// the field names depend on the table you want to index!
					$name = preg_replace('!\s+!', ' ', $record['first_name'] . " " . $record['middle_name'] . " " . $record['last_name']);
                    if($name === " "){
                        $name = $record['name'];
                    }
					$abstract = $address;
					$fullContent = $name . "\n" . "\n" . $content;
					$params = '&tx_fnnaddress_displaypersons[person]=' . $record['uid'] . '&tx_fnnaddress_displaypersons[action]=show';
//					$tags = '#example_tag_1#,#example_tag_2#';
					$tags = '';
					$additionalFields = array(
						'sortdate' => $record['crdate'],
						'orig_uid' => $record['uid'],
						'orig_pid' => $record['pid'],
					);

						// add something to the title, just to identify the entries
						// in the frontend
//					$title = '[ELEMENT INDEXER] ' . $title;

						// ... and store the information in the index
					$indexerObject->storeInIndex(
							$indexerConfig['storagepid'],   // storage PID
                            $name,                          // record title
                            'fnnaddresspersons',      // content type
							$indexerConfig['targetpid'],    // target PID: where is the single view?
							$fullContent,                   // indexed content, includes the title (linebreak after title)
							$tags,                          // tags for faceted search
							$params,                        // typolink params for singleview
							$abstract,                      // abstract; shown in result list if not empty
							$record['sys_language_uid'],    // language uid
							$record['starttime'],           // starttime
							$record['endtime'],             // endtime
							$record['fe_group'],            // fe_group
							false,                          // debug only?
							$additionalFields               // additionalFields
							);
				}
				$content = '<p><b>Element Indexer "' . $indexerConfig['title'] . '":<br/></b>' . $resCount . ' Elements have been indexed.</p>';
			}
			return $content;
		}
	}
}
?>
