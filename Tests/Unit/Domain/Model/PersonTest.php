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
 * Test case for class \Fnn\FnnAddress\Domain\Model\Person.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Jorinde Milde <jorinde.milde@599media.de>
 */
class PersonTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Fnn\FnnAddress\Domain\Model\Person
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Fnn\FnnAddress\Domain\Model\Person();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getFirstNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getFirstName()
		);
	}

	/**
	 * @test
	 */
	public function setFirstNameForStringSetsFirstName() {
		$this->subject->setFirstName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'firstName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMiddleNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getMiddleName()
		);
	}

	/**
	 * @test
	 */
	public function setMiddleNameForStringSetsMiddleName() {
		$this->subject->setMiddleName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'middleName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLastNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLastName()
		);
	}

	/**
	 * @test
	 */
	public function setLastNameForStringSetsLastName() {
		$this->subject->setLastName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'lastName',
			$this->subject
		);
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
	public function getGenderReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getGender()
		);
	}

	/**
	 * @test
	 */
	public function setGenderForStringSetsGender() {
		$this->subject->setGender('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'gender',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPositionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getPosition()
		);
	}

	/**
	 * @test
	 */
	public function setPositionForStringSetsPosition() {
		$this->subject->setPosition('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'position',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() {
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
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
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setImages($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'images',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRelatedPersonsReturnsInitialValueForPerson() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getRelatedPersons()
		);
	}

	/**
	 * @test
	 */
	public function setRelatedPersonsForObjectStorageContainingPersonSetsRelatedPersons() {
		$relatedPerson = new \Fnn\FnnAddress\Domain\Model\Person();
		$objectStorageHoldingExactlyOneRelatedPersons = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneRelatedPersons->attach($relatedPerson);
		$this->subject->setRelatedPersons($objectStorageHoldingExactlyOneRelatedPersons);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneRelatedPersons,
			'relatedPersons',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addRelatedPersonToObjectStorageHoldingRelatedPersons() {
		$relatedPerson = new \Fnn\FnnAddress\Domain\Model\Person();
		$relatedPersonsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$relatedPersonsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($relatedPerson));
		$this->inject($this->subject, 'relatedPersons', $relatedPersonsObjectStorageMock);

		$this->subject->addRelatedPerson($relatedPerson);
	}

	/**
	 * @test
	 */
	public function removeRelatedPersonFromObjectStorageHoldingRelatedPersons() {
		$relatedPerson = new \Fnn\FnnAddress\Domain\Model\Person();
		$relatedPersonsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$relatedPersonsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($relatedPerson));
		$this->inject($this->subject, 'relatedPersons', $relatedPersonsObjectStorageMock);

		$this->subject->removeRelatedPerson($relatedPerson);

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
}
