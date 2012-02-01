<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Streamio FE'
);

//$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . pi1;
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' .pi1. '.xml');






t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Streamio.com');


t3lib_extMgm::addLLrefForTCAdescr('tx_mnstreamio_domain_model_streamioapi', 'EXT:mn_streamio/Resources/Private/Language/locallang_csh_tx_mnstreamio_domain_model_streamioapi.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_mnstreamio_domain_model_streamioapi');
$TCA['tx_mnstreamio_domain_model_streamioapi'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:mn_streamio/Resources/Private/Language/locallang_db.xml:tx_mnstreamio_domain_model_streamioapi',
		'label' => 'user_name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/StreamioApi.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_mnstreamio_domain_model_streamioapi.gif'
	),
);

if (TYPO3_MODE === 'BE')	{
	/**
	* Registers a Backend Module
	*/
	Tx_Extbase_Utility_Extension::registerModule(
		$_EXTKEY,
		'tools',					// Make module a submodule of 'web'
		'tx_mnstreamio_m1',	// Submodule key
		'', 						// Position
		array(																			// An array holding the controller-action-combinations that are accessible
			'StreamioBackend' => 'index',	// The first controller and its first action will be the default
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:mn_streamio/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod.xml',
		)
	);

}

?>