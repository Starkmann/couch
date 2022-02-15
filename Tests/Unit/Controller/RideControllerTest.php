<?php
namespace Eike\Couch\Tests\Unit\Controller;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use Eike\Couch\Domain\Model\Couch;
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
 * Test case for class Eike\Couch\Controller\CouchController.
 *
 * @author Eike Starkmann <eike.starkmann@posteo.de>
 */
class CouchControllerTest extends UnitTestCase
{

	/**
	 * @var \Eike\Couch\Controller\CouchController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Eike\\Couch\\Controller\\CouchController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllCouchsFromRepositoryAndAssignsThemToView()
	{

		$allCouchs = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$couchRepository = $this->getMock('Eike\\Couch\\Domain\\Repository\\CouchRepository', array('findAll'), array(), '', FALSE);
		$couchRepository->expects($this->once())->method('findAll')->will($this->returnValue($allCouchs));
		$this->inject($this->subject, 'couchRepository', $couchRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('couchs', $allCouchs);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenCouchToView()
	{
		$couch = new Couch();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('couch', $couch);

		$this->subject->showAction($couch);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenCouchToCouchRepository()
	{
		$couch = new Couch();

		$couchRepository = $this->getMock('Eike\\Couch\\Domain\\Repository\\CouchRepository', array('add'), array(), '', FALSE);
		$couchRepository->expects($this->once())->method('add')->with($couch);
		$this->inject($this->subject, 'couchRepository', $couchRepository);

		$this->subject->createAction($couch);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenCouchToView()
	{
		$couch = new Couch();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('couch', $couch);

		$this->subject->editAction($couch);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenCouchInCouchRepository()
	{
		$couch = new Couch();

		$couchRepository = $this->getMock('Eike\\Couch\\Domain\\Repository\\CouchRepository', array('update'), array(), '', FALSE);
		$couchRepository->expects($this->once())->method('update')->with($couch);
		$this->inject($this->subject, 'couchRepository', $couchRepository);

		$this->subject->updateAction($couch);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenCouchFromCouchRepository()
	{
		$couch = new Couch();

		$couchRepository = $this->getMock('Eike\\Couch\\Domain\\Repository\\CouchRepository', array('remove'), array(), '', FALSE);
		$couchRepository->expects($this->once())->method('remove')->with($couch);
		$this->inject($this->subject, 'couchRepository', $couchRepository);

		$this->subject->deleteAction($couch);
	}
}
