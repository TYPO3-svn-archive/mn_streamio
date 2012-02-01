<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'StreamioApi' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'StreamioApi' => 'create, update, delete',
		
	)
);

?>