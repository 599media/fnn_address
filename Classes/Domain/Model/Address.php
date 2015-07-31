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
 * Address
 * @author Jorinde Milde
 */
class Address extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * locationTitle
	 *
	 * @var string
	 */
	protected $locationTitle = '';

	/**
	 * streetAddress
	 *
	 * @var string
	 */
	protected $streetAddress = '';

	/**
	 * city
	 *
	 * @var string
	 */
	protected $city = '';

	/**
	 * zip
	 *
	 * @var string
	 */
	protected $zip = '';

	/**
	 * country
	 *
	 * @var \SJBR\StaticInfoTables\Domain\Model\Country
	 */
	protected $country = NULL;

	/**
	 * region
	 *
	 * @var string
	 */
	protected $region = '';

	/**
	 * building
	 *
	 * @var string
	 */
	protected $building = '';

	/**
	 * room
	 *
	 * @var string
	 */
	protected $room = '';

    /**
     * latitude
     *
     * @var float
     */
    protected $latitude = 0.000000;

    /**
     * longitude
     *
     * @var float
     */
    protected $longitude = 0.000000;

	/**
	 * email
	 *
	 * @var string
	 */
	protected $email = '';

	/**
	 * telephone
	 *
	 * @var string
	 */
	protected $telephone = '';

	/**
	 * mobile
	 *
	 * @var string
	 */
	protected $mobile = '';

	/**
	 * fax
	 *
	 * @var string
	 */
	protected $fax = '';

	/**
	 * web
	 *
	 * @var string
	 */
	protected $web = '';

	/**
	 * Returns the streetAddress
	 *
	 * @return string $streetAddress
	 */
	public function getStreetAddress() {
		return $this->streetAddress;
	}

	/**
	 * Sets the streetAddress
	 *
	 * @param string $streetAddress
	 * @return void
	 */
	public function setStreetAddress($streetAddress) {
		$this->streetAddress = $streetAddress;
	}

	/**
	 * Returns the locationTitle
	 *
	 * @return string $locationTitle
	 */
	public function getLocationTitle() {
		return $this->locationTitle;
	}

	/**
	 * Sets the locationTitle
	 *
	 * @param string $locationTitle
	 * @return void
	 */
	public function setLocationTitle($locationTitle) {
		$this->locationTitle = $locationTitle;
	}

	/**
	 * Returns the city
	 *
	 * @return string $city
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Sets the city
	 *
	 * @param string $city
	 * @return void
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * Returns the zip
	 *
	 * @return string $zip
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * Sets the zip
	 *
	 * @param string $zip
	 * @return void
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}

	/**
	 * Returns the country
	 *
	 * @return \SJBR\StaticInfoTables\Domain\Model\Country $country
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * Sets the country
	 *
	 * @param \SJBR\StaticInfoTables\Domain\Model\Country $country
	 * @return void
	 */
	public function setCountry(\SJBR\StaticInfoTables\Domain\Model\Country $country) {
		$this->country = $country;
	}

	/**
	 * Returns the region
	 *
	 * @return string $region
	 */
	public function getRegion() {
		return $this->region;
	}

	/**
	 * Sets the region
	 *
	 * @param string $region
	 * @return void
	 */
	public function setRegion($region) {
		$this->region = $region;
	}

	/**
	 * Returns the building
	 *
	 * @return string $building
	 */
	public function getBuilding() {
		return $this->building;
	}

	/**
	 * Sets the building
	 *
	 * @param string $building
	 * @return void
	 */
	public function setBuilding($building) {
		$this->building = $building;
	}

	/**
	 * Returns the room
	 *
	 * @return string $room
	 */
	public function getRoom() {
		return $this->room;
	}

	/**
	 * Sets the room
	 *
	 * @param string $room
	 * @return void
	 */
	public function setRoom($room) {
		$this->room = $room;
	}

	/**
	 * Returns the latitude
	 *
	 * @return float $latitude
	 */
	public function getLatitude() {
		return $this->latitude;
	}

	/**
	 * Sets the latitude
	 *
	 * @param float $latitude
	 * @return void
	 */
	public function setLatitude($latitude) {
		$this->latitude = $latitude;
	}

    /**
     * Returns the longitude
     *
     * @return float $longitude
     */
    public function getLongitude() {
        return $this->longitude;
    }

    /**
     * Sets the longitude
     *
     * @param float $longitude
     * @return void
     */
    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

	/**
	 * Returns the email
	 *
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Sets the email
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Returns the telephone
	 *
	 * @return string $telephone
	 */
	public function getTelephone() {
		return $this->telephone;
	}

	/**
	 * Sets the telephone
	 *
	 * @param string $telephone
	 * @return void
	 */
	public function setTelephone($telephone) {
		$this->telephone = $telephone;
	}

	/**
	 * Returns the mobile
	 *
	 * @return string $mobile
	 */
	public function getMobile() {
		return $this->mobile;
	}

	/**
	 * Sets the mobile
	 *
	 * @param string $mobile
	 * @return void
	 */
	public function setMobile($mobile) {
		$this->mobile = $mobile;
	}

	/**
	 * Returns the fax
	 *
	 * @return string $fax
	 */
	public function getFax() {
		return $this->fax;
	}

	/**
	 * Sets the fax
	 *
	 * @param string $fax
	 * @return void
	 */
	public function setFax($fax) {
		$this->fax = $fax;
	}

	/**
	 * Returns the web
	 *
	 * @return string $web
	 */
	public function getWeb() {
		return $this->web;
	}

	/**
	 * Sets the web
	 *
	 * @param string $web
	 * @return void
	 */
	public function setWeb($web) {
		$this->web = $web;
	}

}