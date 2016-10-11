<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>微交易</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no'>
	<meta name='format-detection' content='telephone=no'>
	
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
<meta content="telephone=no" name="format-detection"/>
<meta name="format-detection" content="email=no"/>
<title>玛雅金信----微交易</title>
<link rel="stylesheet" href="/mayajinxin/shares/tpl/simplebootx_mobile/Public/style/change_pwd.css" type="text/css">
<link rel="stylesheet" href="/mayajinxin/shares/tpl/simplebootx_mobile/Public/style/common.css" type="text/css">
<link rel="stylesheet" href="/mayajinxin/shares/tpl/simplebootx_mobile/Public/style/index.css" type="text/css">
<link rel="stylesheet" href="/mayajinxin/shares/tpl/simplebootx_mobile/Public/style/popup.css" type="text/css">
<script type="text/javascript" src="/mayajinxin/shares/tpl/simplebootx_mobile/Public/js/js.js"></script>

	<style>
		#head{width:70px;height:70px;}
	</style>
</head>
<body>
<div id='header'>
	<h1>微交易</h1>
</div>
<div id="container">
	<div class="logo_info clear_fix">
		<div class="head_logo"><img id="head" src="<?php echo ($userInfo["headimgurl"]); ?>" alt="个人头像"></div>

		<div class="logo_info_top">
			<span><?php echo ($userInfo["nickname"]); ?></span>
			<span class="member">
						<!--会员等级:<span class="level">白银</span><img src="/mayajinxin/shares/tpl/simplebootx_mobile/Public/image/star.png" alt=""><img src="/mayajinxin/shares/tpl/simplebootx_mobile/Public/image/star.png" alt="">-->
					</span>
			<span class="property">资产:<span class="money"><?php echo ($userInfo['money']); ?>元</span></span>
		</div>
		<div class="logo_info_btn">
			<a href="<?php echo U('Index/recharge');?>"><div>充值</div></a>
			<a href="<?php echo U('Index/withdrawals');?>"><div>提现</div></a>
			<a href="<?php echo ($url); ?>"><div>一键登录</div></a>
		</div>

	</div>
	<div class="main">
		<div class="main_info">
			<div class="gold_info">
				<span>黄 金 </span>
				<span>4423 </span>
				<img src="/mayajinxin/shares/tpl/simplebootx_mobile/Public/image/arrow_active.png" alt="">
			</div>
			<div class="sliver_info">
				<span>白 银 </span>
				<span>3422 </span>
				<img src="/mayajinxin/shares/tpl/simplebootx_mobile/Public/image/arrow_default.png" alt="">
			</div>
		</div>
		<div class="diagram">
			<div class="diagram_info">曲线图</div>
			<div class="today_trend">
				<ul>
					<li class="active">今日走势</li>
					<li>1M</li>
					<li>5M</li>
					<li>15M</li>
					<li>60M</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div id="footer">
	<div class="up_down">
			<span class="up">
				<img src="/mayajinxin/shares/tpl/simplebootx_mobile/Public/image/up.png" alt="">
			</span>
		<span class="down">
				<img src="/mayajinxin/shares/tpl/simplebootx_mobile/Public/image/down.png" alt="">
			</span>
		<p>注意：交易时间为周一~周五08:00-次日04：00，每日04：00-07：00休市结算!</p>
	</div>
	<div class="hr"></div>
	<ul class="ul">
		<li class="trade"><a href="<?php echo U('Index/index');?>"><img src="/mayajinxin/shares/tpl/simplebootx_mobile/Public/image/trade.png" alt=""><p>微交易</p></a></li><li class="agent"><a href="<?php echo U('Index/agent');?>"><img src="/mayajinxin/shares/tpl/simplebootx_mobile/Public/image/agent.png" alt=""><p>经纪人</p></a></li><li class="personal"><a href="<?php echo U('Index/mycenter');?>"><img src="/mayajinxin/shares/tpl/simplebootx_mobile/Public/image/personal.png" alt=""><p>个人中心</p></a></li>
	</ul>
</div>
</body>
</html>