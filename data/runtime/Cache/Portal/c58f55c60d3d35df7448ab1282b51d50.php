<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改交易密码</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no'>
	<meta name='format-detection' content='telephone=no'>
	<link rel="stylesheet" href="/shares/tpl/simplebootx_mobile/Public/style/common.css" type="text/css">
	<link rel="stylesheet" href="/shares/tpl/simplebootx_mobile/Public/style/change_pwd.css" type="text/css">
</head>
<body>
	<div id='header'>
		<h1>修改密码</h1>
	</div>
	<div id="main">
		<form action="">
			<div style="height:243px;">
				<p>初次使用,请设置交易密码</p>
				<input type="password" placeholder='请输入原密码'>
				<input type="password" placeholder='请输入6~12位密码'>
				<input type="password" placeholder='请再次输入新密码'>
			</div>
			<input style="margin-top: 55px;" type="submit" class="submit" value="确定">
		</form>
	</div>
</body>
</html>