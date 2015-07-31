<?php
namespace Fnn\FnnAddress\Hooks;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 599media-Team <info@599media.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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

class ItemsProcFunc {

    public function getLayouts(array &$config){
        $pagesTsConfig = \TYPO3\CMS\Backend\Utility\BackendUtility::getPagesTSconfig($config["row"]["pid"]);
        $listType = "";

        switch ($config["row"]["list_type"]){
            case "fnnaddress_displayorganisations":
                $listType = "organisationLayouts.";
                break;
            case "fnnaddress_displaypersons":
                $listType = "personLayouts.";
                break;
            case "fnnaddress_displaygroups":
                $listType = "groupLayouts.";
                break;
        }

        if(isset($pagesTsConfig["tx_fnn_address."][$listType])){
            foreach($pagesTsConfig["tx_fnn_address."][$listType] as $key => $value){
                $config["items"][] = [\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($value, "fnn_address"), $key];
            }
        }
    }
}