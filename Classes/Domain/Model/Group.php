<?php
namespace Fnn\FnnAddress\Domain\Model;


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
 * Group
 * @author Jorinde Milde
 */
class Group extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * persons
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Person>
	 */
	protected $persons = NULL;

	/**
	 * organisations
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Organisation>
	 */
	protected $organisations = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->persons = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->organisations = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Adds a Person
	 *
	 * @param \Fnn\FnnAddress\Domain\Model\Person $person
	 * @return void
	 */
	public function addPerson(\Fnn\FnnAddress\Domain\Model\Person $person) {
		$this->persons->attach($person);
	}

	/**
	 * Removes a Person
	 *
	 * @param \Fnn\FnnAddress\Domain\Model\Person $personToRemove The Person to be removed
	 * @return void
	 */
	public function removePerson(\Fnn\FnnAddress\Domain\Model\Person $personToRemove) {
		$this->persons->detach($personToRemove);
	}

	/**
	 * Returns the persons
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Person> $persons
	 */
	public function getPersons() {
		return $this->persons;
	}

	/**
	 * Returns the first person
	 *
	 * @return \Fnn\FnnAddress\Domain\Model\Person
	 */
	public function getFirstPerson() {
        $this->persons->rewind();
        return $this->persons->current();
	}

	/**
	 * Sets the persons
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Person> $persons
	 * @return void
	 */
	public function setPersons(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $persons) {
		$this->persons = $persons;
	}

	/**
	 * Adds a Organisation
	 *
	 * @param \Fnn\FnnAddress\Domain\Model\Organisation $organisation
	 * @return void
	 */
	public function addOrganisation(\Fnn\FnnAddress\Domain\Model\Organisation $organisation) {
		$this->organisations->attach($organisation);
	}

	/**
	 * Removes a Organisation
	 *
	 * @param \Fnn\FnnAddress\Domain\Model\Organisation $organisationToRemove The Organisation to be removed
	 * @return void
	 */
	public function removeOrganisation(\Fnn\FnnAddress\Domain\Model\Organisation $organisationToRemove) {
		$this->organisations->detach($organisationToRemove);
	}

	/**
	 * Returns the organisations
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Organisation> $organisations
	 */
	public function getOrganisations() {
		return $this->organisations;
	}

	/**
	 * Returns the first organisation
	 *
	 * @return \Fnn\FnnAddress\Domain\Model\Organisation $organisation
	 */
	public function getFirstOrganisation() {
        $this->organisations->rewind();
        return $this->organisations->current();
	}

	/**
	 * Sets the organisations
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Organisation> $organisations
	 * @return void
	 */
	public function setOrganisations(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $organisations) {
		$this->organisations = $organisations;
	}

}