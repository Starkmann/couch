<?php
namespace Eike\Couch\Controller;

use Eike\Couch\Domain\Model\Couch;
use In2code\Powermail\Utility\LocalizationUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
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
 * CouchController
 */
class CouchController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * couchRepository
     *
     * @var \Eike\Couch\Domain\Repository\CouchRepository
     * @inject
     */
    protected $couchRepository = NULL;
    /**
     * addressRepository
     *
     * @var \Undkonsorten\Addressmgmt\Domain\Repository\AddressRepository
     * @inject
     */
    protected $addressRepository = NULL;

    /**
     * access
     *
     * @var \Eike\Couch\Service\Access
     * @inject
     */
    protected $access = NULL;

    /**
     *
     * @var \Eike\Couch\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $categoryRepository = NULL;

    /**
     *
     * @var \Undkonsorten\Addressmgmt\Service\AddressLocatorService
     * @inject
     */
    protected $addressService = NULL;

    public function initializeCreateAction() {
        if (isset($this->arguments['newCouch'])) {
            $this->arguments['newCouch']
            ->getPropertyMappingConfiguration()
            ->forProperty('begin')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'Y/m/d H:i');
            $this->arguments['newCouch']
            ->getPropertyMappingConfiguration()
            ->forProperty('end')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'Y/m/d H:i');
            $this->arguments['newCouch']->getPropertyMappingConfiguration()->forProperty('address')->allowProperties('zip');


        }
    }

    public function initializeUpdateAction() {
        if (isset($this->arguments['couch'])) {
            $this->arguments['couch']
            ->getPropertyMappingConfiguration()
            ->forProperty('begin')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'Y/m/d H:i');
            $this->arguments['couch']
            ->getPropertyMappingConfiguration()
            ->forProperty('end')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'Y/m/d H:i');
            $this->arguments['couch']->getPropertyMappingConfiguration()->forProperty('address')->allowProperties('zip');
        }
    }

    /**
     * Initializes the current action
     *
     * @return void
     */
    public function initializeAction() {
    	// Only do this in Frontend Context
    	if (!empty($GLOBALS['TSFE']) && is_object($GLOBALS['TSFE'])) {
    		// We only want to set the tag once in one request, so we have to cache that statically if it has been done
    		static $cacheTagsSet = FALSE;

    		if (!$cacheTagsSet) {
    			/** @var $typoScriptFrontendController \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController  */
    			$typoScriptFrontendController = $GLOBALS['TSFE'];
    			$typoScriptFrontendController->addCacheTags(array($this->request->getControllerExtensionKey()));
    			$cacheTagsSet = TRUE;
    		}
    	}

    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        if ($this->settings['orderBy'] && $this->settings['orderDirection']) {
            $orderings = array($this->settings['orderBy'] => $this->settings['orderDirection']);
        }
        $couchs = $this->couchRepository->findDemanded(null,null,null, $orderings);

        $this->view->assign('feUser', $this->access->getLoggedInFrontendUser());
        $this->view->assign('couchs', $couchs);
        $this->view->assign('destination', $this->addressRepository->findByUid($this->settings['destination']));
        $this->view->assign('contentUid', $this->configurationManager->getContentObject()->data['uid']);
    }

    /**
     * action show
     *
     * @param \Eike\Couch\Domain\Model\Couch $couch
     * @return void
     */
    public function showAction(\Eike\Couch\Domain\Model\Couch $couch)
    {
        $this->view->assign('couch', $couch);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
    	if(!$this->access->getLoggedInFrontendUser()){
    		throw new InsufficientUserPermissionsException('You are not logged in so you cannot create something here',1466258305);
    	}

    	$this->view->assign('now', new \DateTime());
    	$this->view->assign('categories', $this->categoryRepository->findByUids($this->settings['category']));
    	$this->view->assign('provider', $this->access->getLoggedInFrontendUser());
    	$this->view->assign('newCouch', $this->objectManager->get(Couch::class));
    }

    /**
     * action create
     *
     * @param \Eike\Couch\Domain\Model\Couch $newCouch
     * @return void
     */
    public function createAction(\Eike\Couch\Domain\Model\Couch $newCouch)
    {

    	$this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('flashMessage.newCouch','couch'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
    	$this->addressService->updateCoordinates($newCouch->getAddress());
        $this->couchRepository->add($newCouch);
        $this->flushCachesByExtKeyTag();
        if($this->settings['listPage'] != ''){
            $this->redirect(null,null,null,null,$this->settings['listPage']);
        }else{
            $this->redirect('list');
        }

    }

    /**
     * action edit
     *
     * @param \Eike\Couch\Domain\Model\Couch $couch
     * @ignorevalidation $couch
     * @return void
     */
    public function editAction(\Eike\Couch\Domain\Model\Couch $couch)
    {
    	if(!$this->access->mayEditOrDelete($couch, $this->access->getLoggedInFrontendUser())){
    		throw new InsufficientUserPermissionsException('You are not allowed to edit this couch',1466260533);
    	}
        $this->view->assign('couch', $couch);
        $this->view->assign('categories', $this->categoryRepository->findByUids($this->settings['category']));
        $this->view->assign('provider', $this->access->getLoggedInFrontendUser());
    }

    /**
     * action update
     *
     * @param \Eike\Couch\Domain\Model\Couch $couch
     * @return void
     */
    public function updateAction(\Eike\Couch\Domain\Model\Couch $couch)
    {
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('flashMessage.updateCouch','couch'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->addressService->updateCoordinates($couch->getAddress());
        $this->couchRepository->update($couch);
        $this->flushCachesByExtKeyTag();
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Eike\Couch\Domain\Model\Couch $couch
     * @return void
     */
    public function deleteAction(\Eike\Couch\Domain\Model\Couch $couch)
    {
    	if(!$this->access->mayEditOrDelete($couch, $this->access->getLoggedInFrontendUser())){
    		throw new InsufficientUserPermissionsException('You are not allowed to delete this couch',1466260675);
    	}
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('flashMessage.deleteCouch','couch'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->couchRepository->remove($couch);
        $this->flushCachesByExtKeyTag();
        $this->redirect('list');
    }

    /**
     * Flush all caches with this extension key as tag
     */
    protected function flushCachesByExtKeyTag(){
    	/*@var $cacheManager \TYPO3\CMS\Core\Cache\CacheManager */
    	$cacheManager = $this->objectManager->get('TYPO3\CMS\Core\Cache\CacheManager');
    	$cacheManager->flushCachesByTag($this->request->getControllerExtensionKey());
    }

    protected function getErrorFlashMessage() {
        #DebuggerUtility::var_dump($this->controllerContext->getArguments()->getValidationResults()->getFlattenedErrors());
        return FALSE;
    }

}
