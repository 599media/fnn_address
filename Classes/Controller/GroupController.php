<?php
namespace Fnn\FnnAddress\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 599media-Team <info@599media.de>, 599media
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
 * GroupController
 *
 * @author Jorinde Milde
 */
class GroupController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * groupRepository
	 *
	 * @var \Fnn\FnnAddress\Domain\Repository\GroupRepository
	 * @inject
	 */
	protected $groupRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
        //get uids of chosen groups as Array
        $uids = explode(",", $this->settings["chosenGroups"]);

        //set storage pid if resource is given in flexform
        if($this->settings["resourcePid"] !== "" && $this->settings["resourcePid"] !== NULL){
            $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
            $querySettings->setStoragePageIds([$this->settings["resourcePid"]]);
            $this->groupRepository->setDefaultQuerySettings($querySettings);
        }

        //set ordering constraints
        $ordering = [];
        $ordering[$this->settings["orderingField"]] = $this->settings["orderingOption"];
        $this->groupRepository->setDefaultOrderings(\Fnn\FnnAddress\Utility\Helper::convertOrderingArray($ordering));

        //get groups
        $groups = $this->groupRepository->findByUidArray($uids);

        //assign everything to view
		$this->view->assign('groups', $groups);
		$this->view->assign('showPersons', $this->settings["displayPersons"]);
		$this->view->assign('showOrganisations', $this->settings["displayOrganisations"]);
	}

	/**
	 * action show
	 *
	 * @param \Fnn\FnnAddress\Domain\Model\Group $group
	 * @return void
	 */
	public function showAction(\Fnn\FnnAddress\Domain\Model\Group $group) {
		$this->view->assign('group', $group);
	}

}