<?php
namespace Fnn\FnnAddress\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 599media-Team <info@599media.de>
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
 * OrganisationController
 * @author Jorinde Milde
 */
class OrganisationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * organisationRepository
	 *
	 * @var \Fnn\FnnAddress\Domain\Repository\OrganisationRepository
	 * @inject
	 */
	protected $organisationRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {

        //set storage pid if resource is given in flexform
        if($this->settings["resourcePid"] !== "" && $this->settings["resourcePid"] !== NULL){
            $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
            $querySettings->setStoragePageIds([$this->settings["resourcePid"]]);
            $this->organisationRepository->setDefaultQuerySettings($querySettings);
        }

        //set ordering constraints
        $ordering = [];
        $ordering[$this->settings["orderingField"]] = $this->settings["orderingOption"];
        $this->organisationRepository->setDefaultOrderings(\Fnn\FnnAddress\Utility\Helper::convertOrderingArray($ordering));

        //find out which organisations to display
        switch ($this->settings["choose"]) {
            case "all":
                $organisations = $this->organisationRepository->findAll();
                break;
            case "by_group":
                $uids = explode(",", $this->settings["chosenByGroup"]);
                $organisations = $this->organisationRepository->findByGroupUidArray($uids);
                break;
            case "by_category":
                $uids = explode(",", $this->settings["chosenByCategory"]);
                $organisations = $this->organisationRepository->findByCategoryUidArray($uids);
                break;
            case "organisation":
                $uids = explode(",", $this->settings["chosenOrganisations"]);
                $organisations = $this->organisationRepository->findByUidArray($uids);
                break;
            default:
                $organisations = $this->organisationRepository->findAll();
        }

        $this->view->assign('organisations', $organisations);
	}

	/**
	 * action show
	 *
	 * @param \Fnn\FnnAddress\Domain\Model\Organisation $organisation
	 * @return void
	 */
	public function showAction(\Fnn\FnnAddress\Domain\Model\Organisation $organisation) {
		$this->view->assign('organisation', $organisation);
	}

}