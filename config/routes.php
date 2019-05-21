<?php
//*******************************************************************************
//							SETTING START INFO
//*******************************************************************************

return
[
	'id([0-9]{0,10}$)' => 'id/index/$1',
	'ticket([0-9]{0,10}$)' => 'ticket/index/$1',
	'login' => 'login/index',
	'doc' => 'doc/index',
	'' => 'main/index'
];

// nameController/nameAction/param[1].../param[2].../param[n]