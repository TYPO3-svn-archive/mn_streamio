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
class Tx_MnStreamio_Controller_StremioApiController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * stremioApiRepository
	 *
	 * @var Tx_MnStreamio_Domain_Repository_StremioApiRepository
	 */
	protected $stremioApiRepository;

	/**
	 * injectStremioApiRepository
	 *
	 * @param Tx_MnStreamio_Domain_Repository_StremioApiRepository $stremioApiRepository
	 * @return void
	 */
	public function injectStremioApiRepository(Tx_MnStreamio_Domain_Repository_StremioApiRepository $stremioApiRepository) {
		$this->stremioApiRepository = $stremioApiRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$stremioApis = $this->stremioApiRepository->findAll();
		$this->view->assign('stremioApis', $stremioApis);
	}

	/**
	 * action show
	 *
	 * @param $stremioApi
	 * @return void
	 */
	public function showAction(Tx_MnStreamio_Domain_Model_StremioApi $stremioApi) {
		$this->view->assign('stremioApi', $stremioApi);
	}

	/**
	 * action new
	 *
	 * @param $newStremioApi
	 * @dontvalidate $newStremioApi
	 * @return void
	 */
	public function newAction(Tx_MnStreamio_Domain_Model_StremioApi $newStremioApi = NULL) {
		$this->view->assign('newStremioApi', $newStremioApi);
	}

	/**
	 * action create
	 *
	 * @param $newStremioApi
	 * @return void
	 */
	public function createAction(Tx_MnStreamio_Domain_Model_StremioApi $newStremioApi) {
		$this->stremioApiRepository->add($newStremioApi);
		$this->flashMessageContainer->add('Your new StremioApi was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $stremioApi
	 * @return void
	 */
	public function editAction(Tx_MnStreamio_Domain_Model_StremioApi $stremioApi) {
		$this->view->assign('stremioApi', $stremioApi);
	}

	/**
	 * action update
	 *
	 * @param $stremioApi
	 * @return void
	 */
	public function updateAction(Tx_MnStreamio_Domain_Model_StremioApi $stremioApi) {
		$this->stremioApiRepository->update($stremioApi);
		$this->flashMessageContainer->add('Your StremioApi was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $stremioApi
	 * @return void
	 */
	public function deleteAction(Tx_MnStreamio_Domain_Model_StremioApi $stremioApi) {
		$this->stremioApiRepository->remove($stremioApi);
		$this->flashMessageContainer->add('Your StremioApi was removed.');
		$this->redirect('list');
	}

}
?>