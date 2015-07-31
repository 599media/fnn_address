<?php

namespace Fnn\FnnAddress\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 599media-Team <info@599media.de>
 *
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

/**
 * Test case for class \Fnn\FnnAddress\Domain\Model\Organisation.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Jorinde Milde <jorinde.milde@599media.de>
 */
class OrganisationTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Fnn\FnnAddress\Domain\Model\Organisation
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Fnn\FnnAddress\Domain\Model\Organisation();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName() {
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAlternativeNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getAlternativeName()
		);
	}

	/**
	 * @test
	 */
	public function setAlternativeNameForStringSetsAlternativeName() {
		$this->subject->setAlternativeName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'alternativeName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getNoteReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getNote()
		);
	}

	/**
	 * @test
	 */
	public function setNoteForStringSetsNote() {
		$this->subject->setNote('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'note',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImagesReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getImages()
		);
	}

	/**
	 * @test
	 */
	public function setImagesForFileReferenceSetsImages() {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $newObjectStorage->attach($fileReferenceFixture);

		$this->subject->setImages($newObjectStorage);

		$this->assertAttributeEquals(
            $newObjectStorage,
			'images',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAddressReturnsInitialValueForAddress() {
		$this->assertEquals(
			NULL,
			$this->subject->getAddress()
		);
	}

	/**
	 * @test
	 */
	public function setAddressForAddressSetsAddress() {
		$addressFixture = new \Fnn\FnnAddress\Domain\Model\Address();
		$this->subject->setAddress($addressFixture);

		$this->assertAttributeEquals(
			$addressFixture,
			'address',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPersonsReturnsInitialValueForPerson() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getPersons()
		);
	}

	/**
	 * @test
	 */
	public function setPersonsForObjectStorageContainingPersonSetsPersons() {
		$person = new \Fnn\FnnAddress\Domain\Model\Person();
		$objectStorageHoldingExactlyOnePersons = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOnePersons->attach($person);
		$this->subject->setPersons($objectStorageHoldingExactlyOnePersons);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOnePersons,
			'persons',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addPersonToObjectStorageHoldingPersons() {
		$person = new \Fnn\FnnAddress\Domain\Model\Person();
		$personsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$personsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($person));
		$this->inject($this->subject, 'persons', $personsObjectStorageMock);

		$this->subject->addPerson($person);
	}

	/**
	 * @test
	 */
	public function removePersonFromObjectStorageHoldingPersons() {
		$person = new \Fnn\FnnAddress\Domain\Model\Person();
		$personsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$personsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($person));
		$this->inject($this->subject, 'persons', $personsObjectStorageMock);

		$this->subject->removePerson($person);

	}

	/**
	 * @test
	 */
	public function getGroupsReturnsInitialValueForGroup() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getGroups()
		);
	}

	/**
	 * @test
	 */
	public function setGroupsForObjectStorageContainingGroupSetsGroups() {
		$group = new \Fnn\FnnAddress\Domain\Model\Group();
		$objectStorageHoldingExactlyOneGroups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneGroups->attach($group);
		$this->subject->setGroups($objectStorageHoldingExactlyOneGroups);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneGroups,
			'groups',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addGroupToObjectStorageHoldingGroups() {
		$group = new \Fnn\FnnAddress\Domain\Model\Group();
		$groupsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$groupsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($group));
		$this->inject($this->subject, 'groups', $groupsObjectStorageMock);

		$this->subject->addGroup($group);
	}

	/**
	 * @test
	 */
	public function removeGroupFromObjectStorageHoldingGroups() {
		$group = new \Fnn\FnnAddress\Domain\Model\Group();
		$groupsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$groupsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($group));
		$this->inject($this->subject, 'groups', $groupsObjectStorageMock);

		$this->subject->removeGroup($group);

	}
}
