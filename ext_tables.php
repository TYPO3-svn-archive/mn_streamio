<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Stremio FE'
);

//$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . pi1;
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' .pi1. '.xml');






t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Streamio');


t3lib_extMgm::addLLrefForTCAdescr('tx_mnstreamio_domain_model_stremioapi', 'EXT:mn_streamio/Resources/Private/Language/locallang_csh_tx_mnstreamio_domain_model_stremioapi.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_mnstreamio_domain_model_stremioapi');
$TCA['tx_mnstreamio_domain_model_stremioapi'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:mn_streamio/Resources/Private/Language/locallang_db.xml:tx_mnstreamio_domain_model_stremioapi',
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/StremioApi.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_mnstreamio_domain_model_stremioapi.gif'
	),
);

?>