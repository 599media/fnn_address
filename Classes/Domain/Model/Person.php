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
 * Person
 * @author Jorinde Milde
 */
class Person extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * firstName
	 *
	 * @var string
	 */
	protected $firstName = '';

	/**
	 * middleName
	 *
	 * @var string
	 */
	protected $middleName = '';

	/**
	 * lastName
	 *
	 * @var string
	 */
	protected $lastName = '';

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * gender
	 *
	 * @var string
	 */
	protected $gender = '';

	/**
	 * birthday
	 *
	 * @var string
	 */
	protected $birthday = '0000-00-00';

	/**
	 * position
	 *
	 * @var string
	 */
	protected $position = '';

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

    /**
     * images
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images = NULL;

	/**
	 * relatedPersons
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Person>
	 */
	protected $relatedPersons = NULL;

	/**
	 * address
	 *
	 * @var \Fnn\FnnAddress\Domain\Model\Address
	 */
	protected $address = NULL;

	/**
	 * organisation
	 *
	 * @var \Fnn\FnnAddress\Domain\Model\Organisation
	 */
	protected $organisation = NULL;

	/**
	 * groups
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Group>
	 */
	protected $groups = NULL;

    /**
     * contents
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Content>
     */
    protected $contents = NULL;

    /**
     * categories
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $categories = NULL;

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
		$this->relatedPersons = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->groups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the firstName
	 *
	 * @return string $firstName
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * Sets the firstName
	 *
	 * @param string $firstName
	 * @return void
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * Returns the middleName
	 *
	 * @return string $middleName
	 */
	public function getMiddleName() {
		return $this->middleName;
	}

	/**
	 * Sets the middleName
	 *
	 * @param string $middleName
	 * @return void
	 */
	public function setMiddleName($middleName) {
		$this->middleName = $middleName;
	}

	/**
	 * Returns the lastName
	 *
	 * @return string $lastName
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * Sets the lastName
	 *
	 * @param string $lastName
	 * @return void
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
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
	 * Returns the gender
	 *
	 * @return string $gender
	 */
	public function getGender() {
		return $this->gender;
	}

	/**
	 * Sets the gender
	 *
	 * @param string $gender
	 * @return void
	 */
	public function setGender($gender) {
		$this->gender = $gender;
	}

	/**
	 * Returns the birthday
	 *
	 * @return string $birthday
	 */
	public function getBirthday() {
		return $this->birthday;
	}

	/**
	 * Sets the birthday
	 *
	 * @param string $birthday
	 * @return void
	 */
	public function setBirthday($birthday) {
		$this->birthday = $birthday;
	}

	/**
	 * Returns the position
	 *
	 * @return string $position
	 */
	public function getPosition() {
		return $this->position;
	}

	/**
	 * Sets the position
	 *
	 * @param string $position
	 * @return void
	 */
	public function setPosition($position) {
		$this->position = $position;
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

    /**
     * Adds a Image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function addImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
        $this->images->attach($image);
    }

    /**
     * Removes a Image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove The Image to be removed
     * @return void
     */
    public function removeImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove) {
        $this->images->detach($imageToRemove);
    }

    /**
     * Returns the images
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
     */
    public function getImages() {
        return $this->images;
    }

    /**
     * Returns the first image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getFirstImage() {
        $this->images->rewind();
        return $this->images->current();
    }

    /**
     * Sets the images
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
     * @return void
     */
    public function setImages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $images) {
        $this->images = $images;
    }

	/**
	 * Adds a Person
	 *
	 * @param \Fnn\FnnAddress\Domain\Model\Person $relatedPerson
	 * @return void
	 */
	public function addRelatedPerson(\Fnn\FnnAddress\Domain\Model\Person $relatedPerson) {
		$this->relatedPersons->attach($relatedPerson);
	}

	/**
	 * Removes a Person
	 *
	 * @param \Fnn\FnnAddress\Domain\Model\Person $relatedPersonToRemove The Person to be removed
	 * @return void
	 */
	public function removeRelatedPerson(\Fnn\FnnAddress\Domain\Model\Person $relatedPersonToRemove) {
		$this->relatedPersons->detach($relatedPersonToRemove);
	}

	/**
	 * Returns the relatedPersons
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Person> $relatedPersons
	 */
	public function getRelatedPersons() {
		return $this->relatedPersons;
	}

	/**
	 * Sets the relatedPersons
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Person> $relatedPersons
	 * @return void
	 */
	public function setRelatedPersons(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $relatedPersons) {
		$this->relatedPersons = $relatedPersons;
	}

	/**
	 * Returns the address
	 *
	 * @return \Fnn\FnnAddress\Domain\Model\Address $address
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Sets the address
	 *
	 * @param \Fnn\FnnAddress\Domain\Model\Address $address
	 * @return void
	 */
	public function setAddress(\Fnn\FnnAddress\Domain\Model\Address $address) {
		$this->address = $address;
	}

	/**
	 * Returns the organisation
	 *
	 * @return \Fnn\FnnAddress\Domain\Model\Organisation $organisation
	 */
	public function getOrganisation() {
		return $this->organisation;
	}

	/**
	 * Sets the organisation
	 *
	 * @param \Fnn\FnnAddress\Domain\Model\Organisation $organisation
	 * @return void
	 */
	public function setOrganisation(\Fnn\FnnAddress\Domain\Model\Organisation $organisation) {
		$this->organisation = $organisation;
	}

	/**
	 * Adds a Group
	 *
	 * @param \Fnn\FnnAddress\Domain\Model\Group $group
	 * @return void
	 */
	public function addGroup(\Fnn\FnnAddress\Domain\Model\Group $group) {
		$this->groups->attach($group);
	}

	/**
	 * Removes a Group
	 *
	 * @param \Fnn\FnnAddress\Domain\Model\Group $groupToRemove The Group to be removed
	 * @return void
	 */
	public function removeGroup(\Fnn\FnnAddress\Domain\Model\Group $groupToRemove) {
		$this->groups->detach($groupToRemove);
	}

	/**
	 * Returns the groups
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Group> $groups
	 */
	public function getGroups() {
		return $this->groups;
	}

    /**
     * Returns the first group
     *
     * @return \Fnn\FnnAddress\Domain\Model\Group
     */
    public function getFirstGroup() {
        $this->groups->rewind();
        return $this->groups->current();
    }

	/**
	 * Sets the groups
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Group> $groups
	 * @return void
	 */
	public function setGroups(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $groups) {
		$this->groups = $groups;
	}

    /**
     * Adds a ContentElement
     *
     * @param \Fnn\FnnAddress\Domain\Model\Content $contentElement
     * @return void
     */
    public function addContent(\Fnn\FnnAddress\Domain\Model\Content $contentElement) {
        $this->contents->attach($contentElement);
    }

    /**
     * Removes a Content
     *
     * @param \Fnn\FnnAddress\Domain\Model\Content $contentElementToRemove The ContentElement to be removed
     * @return void
     */
    public function removeContent(\Fnn\FnnAddress\Domain\Model\Content $contentElementToRemove) {
        $this->contents->detach($contentElementToRemove);
    }

    /**
     * Returns the contents
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Content> $contents
     */
    public function getContents() {
        return $this->contents;
    }

    /**
     * Sets the contents
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Content> $contents
     * @return void
     */
    public function setContents(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $contents) {
        $this->contents = $contents;
    }

    /**
     * Adds a Category
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $category
     * @return void
     */
    public function addCategories(\TYPO3\CMS\Extbase\Domain\Model\Category $category) {
        $this->categories->attach($category);
    }

    /**
     * Removes a Category
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove The Region to be removed
     * @return void
     */
    public function removeCategories(\TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove) {
        $this->categories->detach($categoryToRemove);
    }

    /**
     * Returns the Categories
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $categories
     */
    public function getCategories() {
        return $this->categories;
    }

    /**
     * Sets the Categories
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $categories
     * @return void
     */
    public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories) {
        $this->categories = $categories;
    }

}