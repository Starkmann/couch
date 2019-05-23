<?php
namespace Eike\Couch\ViewHelpers\Access;

use TYPO3\CMS\Extbase\Domain\Model\FrontendUser;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractConditionViewHelper;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 "Felix Althaus <felix.althaus@undkonsorten.com>"
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
 *
 *
 * @package PACKAGENAME
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class MayEditObjectViewHelper extends AbstractConditionViewHelper
{
    /**
     * Arguments Initialization
     */
    public function initializeArguments()
    {
        $this->registerArgument('object', 'object', 'The wall to evaluate', TRUE);
        $this->registerArgument('user', FrontendUser::class, 'The user to evaluate', TRUE);
    }

    /**
     * @param null $arguments
     * @return bool
     */
    static protected function evaluateCondition($arguments = null)
    {
        $object = $arguments['object'];
        /** @var FrontendUser $user */
        $user = $arguments['user'];

        /** @noinspection PhpUndefinedMethodInspection */
        return $object->getProvider() === $user;
    }

}

