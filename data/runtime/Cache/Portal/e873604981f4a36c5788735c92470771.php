<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人中心</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no'>
	<meta name='format-detection' content='telephone=no'>
	<link rel="stylesheet" href="/shares/tpl/simplebootx_mobile/Public/style/common.css" type="text/css">
	<link rel="stylesheet" href="/shares/tpl/simplebootx_mobile/Public/style/index.css" type="text/css">
	<link rel="stylesheet" href="/shares/tpl/simplebootx_mobile/Public/style/person.css" type="text/css">
	<style>
		#head{width:70px;height:70px;}
	</style>
</head>
<body>
<div style="background: url(/shares/tpl/simplebootx_mobile/Public/image/personal.gif) no-repeat;">
	<div id='header' style="background: none">
		<h1>个人中心</h1>
	</div>
	<div id="container">
		<div class="logo_info clear_fix" style="box-shadow: none">
			<div class="head_logo"><img id="head" src="<?php echo ($userInfo["headimgurl"]); ?>" alt="个人头像"></div>
			<div class="logo_info_top">
				<span><?php echo ($userInfo["nickname"]); ?></span>
				<span class="member">
					<!--会员等级:<span class="level">白银</span><img src="/shares/tpl/simplebootx_mobile/Public/image/star.png" alt=""><img src="/shares/tpl/simplebootx_mobile/Public/image/star.png" alt="">-->
				</span>
				<span class="property">资产:<span class="money"><?php echo ($userInfo['money']); ?>元</span></span>
			</div>
			<div class="logo_info_btn">
				<a href="<?php echo U('Index/recharge');?>"><div>充值</div></a>
				<a href="<?php echo U('Index/withdrawals');?>"><div>提现</div></a>
			</div>
		</div>			
	</div>
	<div id="info_list">
		<div class="use_property">
			<p>可用资金：<span class="can"><?php echo ($userInfo['money']); ?>元</span></p>
			<p class="hr"></p>
			<!--<p>占用资金：<span class="occupied">10元</span></p>-->
		</div>
		<ul>
			<li>
				<a href="<?php echo U('Index/myrecord');?>"><div><span class="icon trade"></span><span>交易记录</span><img src="/shares/tpl/simplebootx_mobile/Public/image/g_than.gif"></div></a></li>
			<li>
				<a href="<?php echo U('Index/entryrecord');?>"><div><span class="icon entry_out_money"></span><span>出入金记录</span><img src="/shares/tpl/simplebootx_mobile/Public/image/g_than.gif"></div></a></li>
			<li>
				<a href="<?php echo U('Index/modifypwd');?>"><div><span class="icon trade_pwd"></span><span>修改交易密码</span><img src="/shares/tpl/simplebootx_mobile/Public/image/g_than.gif"></div></a></li>
			<li>
				<a href="<?php echo U('Index/entryrecord');?>"><div><span class="icon check_phone"></span><span>验证手机号</span><img src="/shares/tpl/simplebootx_mobile/Public/image/g_than.gif"></div></a></li>
			<li>
				<a href="<?php echo U('Index/aboutus');?>"><div><span class="icon about"></span><span>关于我们</span><img src="/shares/tpl/simplebootx_mobile/Public/image/g_than.gif"></div></a></li>
		</ul>
	</div>
</div>

</body>
</html>