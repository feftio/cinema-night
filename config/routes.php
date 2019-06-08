<?php
//*******************************************************************************
//							SETTING START INFO
//*******************************************************************************

return
[
	'id([0-9]{0,10}$)' => 'id/index/$1',
	'wipe([0-9]{0,10}$)' => 'ticket/wipe/$1',
	'ticket([0-9]{0,10}$)' => 'ticket/index/$1',
	'login/chlogin' => 'login/chlogin',
	'login/chreg' => 'login/chreg',
	'cabinet/taken' => 'cabinet/taken',
	'cabinet/seats' => 'cabinet/seats',
	'cabinet/logout' => 'cabinet/logout',
	'cabinet/ch' => 'cabinet/ch',
	'login' => 'login/index',
	'doc' => 'doc/index',
	'cabinet' => 'cabinet/index',
	'' => 'main/index'
];

// nameController/nameAction/param[1].../param[2].../param[n]