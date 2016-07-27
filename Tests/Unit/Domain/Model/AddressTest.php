<?php

namespace Eike\Couch\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Eike Starkmann <eike.starkmann@posteo.de>
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
 * Test case for class \Undkonsorten\Addressmgmt\Domain\Model\Address\Location.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Eike Starkmann <eike.starkmann@posteo.de>
 */
class AddressTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Undkonsorten\Addressmgmt\Domain\Model\Address\Location
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Undkonsorten\Addressmgmt\Domain\Model\Address\Location();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName()
	{
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
	public function getStreetReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getStreet()
		);
	}

	/**
	 * @test
	 */
	public function setStreetForStringSetsStreet()
	{
		$this->subject->setStreet('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'street',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStreetNumberReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getStreetNumber()
		);
	}

	/**
	 * @test
	 */
	public function setStreetNumberForStringSetsStreetNumber()
	{
		$this->subject->setStreetNumber('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'streetNumber',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCityReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getCity()
		);
	}

	/**
	 * @test
	 */
	public function setCityForStringSetsCity()
	{
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
	public function getZipReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getZip()
		);
	}

	/**
	 * @test
	 */
	public function setZipForStringSetsZip()
	{
		$this->subject->setZip('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'zip',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCountryReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getCountry()
		);
	}

	/**
	 * @test
	 */
	public function setCountryForStringSetsCountry()
	{
		$this->subject->setCountry('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'country',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStateReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getState()
		);
	}

	/**
	 * @test
	 */
	public function setStateForStringSetsState()
	{
		$this->subject->setState('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'state',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLatitudeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLatitude()
		);
	}

	/**
	 * @test
	 */
	public function setLatitudeForStringSetsLatitude()
	{
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
	public function getLongitudeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLongitude()
		);
	}

	/**
	 * @test
	 */
	public function setLongitudeForStringSetsLongitude()
	{
		$this->subject->setLongitude('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'longitude',
			$this->subject
		);
	}
}
