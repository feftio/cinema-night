<?php
//*******************************************************************************
//							SETTING START INFO
//*******************************************************************************

return
[
	'id([0-9]{0,10}$)' => 'id/index/$1',
	'ticket([0-9]{0,10}$)' => 'ticket/index/$1',
	'login/chlogin' => 'login/chlogin',
	'login/chreg' => 'login/chreg',
	'cabinet/logout' => 'cabinet/logout',
	'cabinet/ch' => 'cabinet/ch',
	'login' => 'login/index',
	'doc' => 'doc/index',
	'cabinet' => 'cabinet/index',
	'' => 'main/index'
];

// nameController/nameAction/param[1].../param[2].../param[n]