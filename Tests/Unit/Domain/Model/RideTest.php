<?php

namespace Eike\Couch\Tests\Unit\Domain\Model;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use Eike\Couch\Domain\Model\Couch;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use In2\Femanager\Domain\Model\User;
use Undkonsorten\Addressmgmt\Domain\Model\Address\Location;
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
 * Test case for class \Eike\Couch\Domain\Model\Couch.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Eike Starkmann <eike.starkmann@posteo.de>
 */
class CouchTest extends UnitTestCase
{
	/**
	 * @var \Eike\Couch\Domain\Model\Couch
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new Couch();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDateReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getDate()
		);
	}

	/**
	 * @test
	 */
	public function setDateForDateTimeSetsDate()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setDate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'date',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSpaceReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setSpaceForIntSetsSpace()
	{	}

	/**
	 * @test
	 */
	public function getRouteReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRoute()
		);
	}

	/**
	 * @test
	 */
	public function setRouteForStringSetsRoute()
	{
		$this->subject->setRoute('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'route',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReturningReturnsInitialValueForCouch()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getReturning()
		);
	}

	/**
	 * @test
	 */
	public function setReturningForCouchSetsReturning()
	{
		$returningFixture = new Couch();
		$this->subject->setReturning($returningFixture);

		$this->assertAttributeEquals(
			$returningFixture,
			'returning',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getProviderReturnsInitialValueForFeUser()
	{
		$newObjectStorage = new ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getProvider()
		);
	}

	/**
	 * @test
	 */
	public function setProviderForObjectStorageContainingFeUserSetsProvider()
	{
		$provider = new User();
		$objectStorageHoldingExactlyOneProvider = new ObjectStorage();
		$objectStorageHoldingExactlyOneProvider->attach($provider);
		$this->subject->setProvider($objectStorageHoldingExactlyOneProvider);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneProvider,
			'provider',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addProviderToObjectStorageHoldingProvider()
	{
		$provider = new User();
		$providerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$providerObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($provider));
		$this->inject($this->subject, 'provider', $providerObjectStorageMock);

		$this->subject->addProvider($provider);
	}

	/**
	 * @test
	 */
	public function removeProviderFromObjectStorageHoldingProvider()
	{
		$provider = new User();
		$providerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$providerObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($provider));
		$this->inject($this->subject, 'provider', $providerObjectStorageMock);

		$this->subject->removeProvider($provider);

	}

	/**
	 * @test
	 */
	public function getDestinationReturnsInitialValueForAddress()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getDestination()
		);
	}

	/**
	 * @test
	 */
	public function setDestinationForAddressSetsDestination()
	{
		$destinationFixture = new Location();
		$this->subject->setDestination($destinationFixture);

		$this->assertAttributeEquals(
			$destinationFixture,
			'destination',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStartReturnsInitialValueForAddress()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getStart()
		);
	}

	/**
	 * @test
	 */
	public function setStartForAddressSetsStart()
	{
		$startFixture = new Location();
		$this->subject->setStart($startFixture);

		$this->assertAttributeEquals(
			$startFixture,
			'start',
			$this->subject
		);
	}
}
