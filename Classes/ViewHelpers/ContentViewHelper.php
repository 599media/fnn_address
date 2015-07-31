<?php
namespace Fnn\FnnAddress\ViewHelpers;

    /***************************************************************
     *
     *  Copyright notice
     *
     *  (c) 2014 599media-Team <info@599media.de>
     *  copied from http://blog.teamgeist-medien.de/2014/01/extbase-fluid-viewhelper-fuer-tt_content-elemente-mit-namespaces.html
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
 
/**
 * ViewHelper to render a parsed tt_content element
 */
 
class ContentViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
 
    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     */
    protected $configurationManager;
 
    /**
     * @var Content Object
     */
    protected $cObj;
 
    /**
     * Parse content element
     *
     * @param    int           UID des Content Element
     * @return   string        Geparstes Content Element
     */
    public function render($uid) {
        $conf = array( // config
            'tables' => 'tt_content',
            'source' => $uid,
            'dontCheckPid' => 1
        );
        return $this->cObj->RECORDS($conf);
    }
 
    /**
     * Injects Configuration Manager
     *
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
     * @return void
    */
    public function injectConfigurationManager(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager) {
        $this->configurationManager = $configurationManager;
        $this->cObj = $this->configurationManager->getContentObject();
    }
 
}
 
?>