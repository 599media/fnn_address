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
 * Test case for class \Fnn\FnnAddress\Domain\Model\Address.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Jorinde Milde <jorinde.milde@599media.de>
 */
class AddressTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Fnn\FnnAddress\Domain\Model\Address
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Fnn\FnnAddress\Domain\Model\Address();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getLocationTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLocationTitle()
		);
	}

	/**
	 * @test
	 */
	public function setLocationTitleForStringSetsLocationTitle() {
		$this->subject->setLocationTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'locationTitle',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStreetAddressReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getStreetAddress()
		);
	}

	/**
	 * @test
	 */
	public function setStreetAddressForStringSetsStreetAddress() {
		$this->subject->setStreetAddress('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'streetAddress',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCityReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getCity()
		);
	}

	/**
	 * @test
	 */
	public function setCityForStringSetsCity() {
		$this->subject->setCity('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'city',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getZipReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getZip()
		);
	}

	/**
	 * @test
	 */
	public function setZipForStringSetsZip() {
		$this->subject->setZip('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'zip',
			$this->subject
		);
	}

    /*
     * @TODO diffrent tests for country respecting if static_info_tables is loaded
     */
	/**
	 * @test
	 */
	public function getCountryReturnsInitialValueForString() {
		$this->assertSame(
			NULL,
			$this->subject->getCountry()
		);
	}

	/**
	 * @test
	 */
	public function setCountryForStringSetsCountry() {
        $country = new \SJBR\StaticInfoTables\Domain\Model\Country();
		$this->subject->setCountry($country);

		$this->assertAttributeEquals(
            $country,
			'country',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRegionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getRegion()
		);
	}

	/**
	 * @test
	 */
	public function setRegionForStringSetsRegion() {
		$this->subject->setRegion('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'region',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBuildingReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getBuilding()
		);
	}

	/**
	 * @test
	 */
	public function setBuildingForStringSetsBuilding() {
		$this->subject->setBuilding('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'building',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRoomReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getRoom()
		);
	}

	/**
	 * @test
	 */
	public function setRoomForStringSetsRoom() {
		$this->subject->setRoom('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'room',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLatitudeReturnsInitialValueForString() {
		$this->assertSame(
            0.000000,
			$this->subject->getLatitude()
		);
	}

	/**
	 * @test
	 */
	public function setLatitudeForStringSetsLatitude() {
		$this->subject->setLatitude('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'latitude',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLongitudeReturnsInitialValueForString() {
		$this->assertSame(
            0.000000,
			$this->subject->getLongitude()
		);
	}

	/**
	 * @test
	 */
	public function setLongitudeForStringSetsLongitude() {
		$this->subject->setLongitude('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'longitude',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail() {
		$this->subject->setEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'email',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTelephoneReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTelephone()
		);
	}

	/**
	 * @test
	 */
	public function setTelephoneForStringSetsTelephone() {
		$this->subject->setTelephone('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'telephone',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMobileReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getMobile()
		);
	}

	/**
	 * @test
	 */
	public function setMobileForStringSetsMobile() {
		$this->subject->setMobile('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'mobile',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFaxReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getFax()
		);
	}

	/**
	 * @test
	 */
	public function setFaxForStringSetsFax() {
		$this->subject->setFax('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'fax',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getWebReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getWeb()
		);
	}

	/**
	 * @test
	 */
	public function setWebForStringSetsWeb() {
		$this->subject->setWeb('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'web',
			$this->subject
		);
	}
}
