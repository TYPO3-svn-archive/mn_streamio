<?php

########################################################################
# Extension Manager/Repository config file for ext "mn_streamio".
#
# Auto generated 17-02-2012 12:27
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Streamio.com',
	'description' => 'Adds the functionality of Streamio.com into TYPO3 frontend and backend.',
	'category' => 'plugin',
	'author' => 'Mattias Nilsson',
	'author_email' => 'tollepjaer@gmail.com',
	'author_company' => '',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '0.2.1',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'extbase' => '',
			'fluid' => '',
			't3jquery' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:40:{s:21:"ExtensionBuilder.json";s:4:"a81b";s:21:"ext_conf_template.txt";s:4:"3541";s:12:"ext_icon.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"56cf";s:14:"ext_tables.php";s:4:"5066";s:14:"ext_tables.sql";s:4:"a473";s:44:"Classes/Controller/StreamioApiController.php";s:4:"8318";s:48:"Classes/Controller/StreamioBackendController.php";s:4:"ffea";s:36:"Classes/Domain/Model/StreamioApi.php";s:4:"1b9d";s:51:"Classes/Domain/Repository/StreamioApiRepository.php";s:4:"3f13";s:44:"Configuration/ExtensionBuilder/settings.yaml";s:4:"0976";s:33:"Configuration/TCA/StreamioApi.php";s:4:"6f40";s:38:"Configuration/TypoScript/constants.txt";s:4:"85c6";s:34:"Configuration/TypoScript/setup.txt";s:4:"fed6";s:26:"Eid/class.Streamio_eid.php";s:4:"b0c5";s:53:"Resources/Private/Backend/Layouts/DefaultBackend.html";s:4:"3c36";s:62:"Resources/Private/Backend/Templates/StreamioBackend/Index.html";s:4:"b54b";s:40:"Resources/Private/Language/locallang.xml";s:4:"a62b";s:83:"Resources/Private/Language/locallang_csh_tx_mnstreamio_domain_model_streamioapi.xml";s:4:"9291";s:82:"Resources/Private/Language/locallang_csh_tx_mnstreamio_domain_model_stremioapi.xml";s:4:"3209";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"c01d";s:44:"Resources/Private/Language/locallang_mod.xml";s:4:"fdbf";s:38:"Resources/Private/Layouts/Default.html";s:4:"d4c6";s:42:"Resources/Private/Partials/FormErrors.html";s:4:"f5bc";s:54:"Resources/Private/Partials/StreamioApi/FormFields.html";s:4:"4c55";s:54:"Resources/Private/Partials/StreamioApi/Properties.html";s:4:"ca74";s:53:"Resources/Private/Partials/StremioApi/FormFields.html";s:4:"c1a4";s:53:"Resources/Private/Partials/StremioApi/Properties.html";s:4:"88c9";s:49:"Resources/Private/Templates/StreamioApi/List.html";s:4:"9bd0";s:49:"Resources/Private/Templates/StreamioApi/Show.html";s:4:"d5a5";s:36:"Resources/Public/Css/mn_streamio.css";s:4:"905e";s:35:"Resources/Public/Icons/relation.gif";s:4:"e615";s:65:"Resources/Public/Icons/tx_mnstreamio_domain_model_streamioapi.gif";s:4:"905a";s:64:"Resources/Public/Icons/tx_mnstreamio_domain_model_stremioapi.gif";s:4:"905a";s:51:"Tests/Unit/Controller/StreamioApiControllerTest.php";s:4:"3952";s:50:"Tests/Unit/Controller/StremioApiControllerTest.php";s:4:"3883";s:43:"Tests/Unit/Domain/Model/StreamioApiTest.php";s:4:"57a0";s:42:"Tests/Unit/Domain/Model/StremioApiTest.php";s:4:"d5a0";s:14:"doc/manual.pdf";s:4:"e31f";s:14:"doc/manual.sxw";s:4:"f03c";}',
);

?>