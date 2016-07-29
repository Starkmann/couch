<?php
namespace Eike\Couch\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Eike Starkmann <eike.starkmann@posteo.de>
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
 * A couch
 */
class Couch extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';
    
    /**
     * Date
     *
     * @var \DateTime
     */
    protected $begin = null;
    
    /**
     * 
     * @var \DateTime
     */
    protected $end = null;
    
    /**
     * How much persons
     *
     * @var int
     */
    protected $space = 0;
    
    /**
     * provider
     *
     * @var \In2\Femanager\Domain\Model\User
     * 
     */
    protected $provider = null;
    
    /**
     * address
     *
     * @var \Undkonsorten\Addressmgmt\Domain\Model\Address\Location
     */
    protected $address = null;
    
    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Returns the date
     *
     * @return \DateTime $date
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * Sets the date
     *
     * @param \DateTime $date
     * @return void
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }
    
    /**
     * Returns the space
     *
     * @return int $space
     */
    public function getSpace()
    {
        return $this->space;
    }
    
    /**
     * Sets the space
     *
     * @param int $space
     * @return void
     */
    public function setSpace($space)
    {
        $this->space = $space;
    }
    
    /**
     * __construct
     */
    public function __construct()
    {
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
    protected function initStorageObjects()
    {
        $this->provider = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the provider
     *
     * @return \In2\Femanager\Domain\Model\User $provider
     */
    public function getProvider()
    {
        return $this->provider;
    }
    
    /**
     * Sets the provider
     *
     * @param \In2\Femanager\Domain\Model\User $provider
     * @return void
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }
    

    
    /**
     * Returns the address
     *
     * @return \Undkonsorten\Addressmgmt\Domain\Model\Address\Location $address
     */
    public function getAddress()
    {
        return $this->address;
    }
    
    /**
     * Sets the address
     *
     * @param \Undkonsorten\Addressmgmt\Domain\Model\Address\Location $address
     * @return void
     */
    public function setAddress(\Undkonsorten\Addressmgmt\Domain\Model\Address\Location $address)
    {
        $this->address = $address;
    }
    
    /**
     * 
     * @return DateTime
     */
	public function getBegin() {
		return $this->begin;
	}
	
	/**
	 * 
	 * @param \DateTime $begin
	 */
	public function setBegin(\DateTime $begin) {
		$this->begin = $begin;
	}
	
	/**
	 * 
	 * @return DateTime
	 */
	public function getEnd() {
		return $this->end;
	}
	
	/**
	 * 
	 * @param \DateTime $end
	 */
	public function setEnd(\DateTime $end) {
		$this->end = $end;
	}
	
    
    
    

}