<head>
	<meta charset="UTF-8">
	<title><?php echo G::var('title'); ?></title>
	<!--<meta http-equiv="Cache-Control" content="no-cache">-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="<?php csrf_token() ?>"/>
	<link rel="icon" type="image/x-icon" href="../../template/image/favicon.ico">

	<?php foreach (G::varDirs('css') as $value){ ?>
	<link rel="stylesheet" href="<?php echo $value; ?>">
	<?php } ?>

	<?php foreach (G::varDirs('fontawesome') as $value){ ?>
	<script defer src="<?php echo $value ?>"></script>
	<?php } ?>

</head>