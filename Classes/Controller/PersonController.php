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
 * PersonController
 * @author Jorinde Milde
 */
class PersonController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * personRepository
	 *
	 * @var \Fnn\FnnAddress\Domain\Repository\PersonRepository
	 * @inject
	 */
	protected $personRepository = NULL;

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
            $this->personRepository->setDefaultQuerySettings($querySettings);
        }

        //set ordering constraints
        $ordering = [];
        $ordering[$this->settings["orderingField"]] = $this->settings["orderingOption"];
        $this->personRepository->setDefaultOrderings(\Fnn\FnnAddress\Utility\Helper::convertOrderingArray($ordering));

        //find out which persons to display
        switch ($this->settings["choose"]) {
            case "all":
                $persons = $this->personRepository->findAll();
                break;
            case "by_group":
                $uids = explode(",", $this->settings["chosenByGroup"]);
                $persons = $this->personRepository->findByGroupUidArray($uids);
                break;
            case "by_organisation":
                $uids = explode(",", $this->settings["chosenByOrganisation"]);
                $persons = $this->personRepository->findByOrganisationUidArray($uids);
                break;
            case "by_category":
                $uids = explode(",", $this->settings["chosenByCategory"]);
                $persons = $this->personRepository->findByCategoryUidArray($uids);
                break;
            case "persons":
                $uids = explode(",", $this->settings["chosenPersons"]);
                $persons = $this->personRepository->findByUidArray($uids);
                break;
            default:
                $persons = $this->personRepository->findAll($ordering);
        }

        //Tweak to make related Persons bidirectional for view
        foreach ($persons as $person){
            $oStorage = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance("\\TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage");
            $relatedPersons = $this->personRepository->findAllRelatedPersons($person);
            foreach($relatedPersons as $rPerson){
                $oStorage->attach($rPerson);
            }
            $person->setRelatedPersons($oStorage);
        }

        //add to view
		$this->view->assign('persons', $persons);
	}

	/**
	 * action show
	 *
	 * @param \Fnn\FnnAddress\Domain\Model\Person $person
	 * @return void
	 */
	public function showAction(\Fnn\FnnAddress\Domain\Model\Person $person) {
		$this->view->assign('person', $person);
	}

}