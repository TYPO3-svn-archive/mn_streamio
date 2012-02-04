<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Mattias Nilsson <tollepjaer@gmail.com>
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
 *
 *
 * @package mn_streamio
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class Tx_MnStreamio_Controller_StreamioApiController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * streamioApiRepository
	 *
	 * @var Tx_MnStreamio_Domain_Repository_StreamioApiRepository
	 */
	protected $streamioApiRepository;

    /**
	 * injectStremioApiRepository
	 *
	 * @param Tx_MnStreamio_Domain_Repository_StreamioApiRepository $StreamioApiRepository
	 * @return void
	 */
	public function injectStreamioApiRepository(Tx_MnStreamio_Domain_Repository_StreamioApiRepository $streamioApiRepository) {
		$this->streamioApiRepository = $streamioApiRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 * @param Tx_MnStreamio_Domain_Model_StreamioApi
	 */
	public function listAction() {
		$streamioApis = $this->streamioApiRepository->findAll();
		$this->view->assign('streamioApis', $streamioApis);
        $this->view->assign('requestUrl', t3lib_div::getIndpEnv('TYPO3_SITE_URL'));
	}

	/**
	 * action show
	 *
	 * @param Tx_MnStreamio_Domain_Model_StreamioApi
	 * @return void
	 */
	public function showAction(Tx_MnStreamio_Domain_Model_StreamioApi $streamioApi) {
		$this->view->assign('streamioApi', $streamioApi);
	}

}
?>