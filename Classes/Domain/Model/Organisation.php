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
 * Organisation
 * @author Jorinde Milde
 */
class Organisation extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * alternativeName
	 *
	 * @var string
	 */
	protected $alternativeName = '';

	/**
	 * note
	 *
	 * @var string
	 */
	protected $note = '';

    /**
     * images
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images = NULL;

	/**
	 * address
	 *
	 * @var \Fnn\FnnAddress\Domain\Model\Address
	 */
	protected $address = NULL;

	/**
	 * persons
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Fnn\FnnAddress\Domain\Model\Person>
	 * @cascade remove
	 */
	protected $persons = NULL;

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
		$this->persons = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->groups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Returns the alternativeName
	 *
	 * @return string $alternativeName
	 */
	public function getAlternativeName() {
		return $this->alternativeName;
	}

	/**
	 * Sets the alternativeName
	 *
	 * @param string $alternativeName
	 * @return void
	 */
	public function setAlternativeName($alternativeName) {
		$this->alternativeName = $alternativeName;
	}

	/**
	 * Returns the note
	 *
	 * @return string $note
	 */
	public function getNote() {
		return $this->note;
	}

	/**
	 * Sets the note
	 *
	 * @param string $note
	 * @return void
	 */
	public function setNote($note) {
		$this->note = $note;
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