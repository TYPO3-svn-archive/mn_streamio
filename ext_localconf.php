<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'StreamioApi' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'StreamioApi' => 'list, show',
		
	)
);

$TYPO3_CONF_VARS['FE']['eID_include']['tx_mnstreamio_Streamio'] = 'EXT:mn_streamio/Eid/class.Streamio_eid.php';

?>