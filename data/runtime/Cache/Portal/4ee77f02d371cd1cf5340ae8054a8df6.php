<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>经纪人</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no'>
	<meta name='format-detection' content='telephone=no'>
	<link rel="stylesheet" href="/shares/tpl/simplebootx_mobile/Public/style/common.css" type="text/css">
	<link rel="stylesheet" href="/shares/tpl/simplebootx_mobile/Public/style/index.css" type="text/css">
	<link rel="stylesheet" href="/shares/tpl/simplebootx_mobile/Public/style/person.css" type="text/css">
	<style>
		#head{width:70px;height:70px;margin-right: 15px}
	</style>
</head>
<body>
<div style="background: url(/shares/tpl/simplebootx_mobile/Public/image/agent.gif) no-repeat;">
	<div id='header' style="background: none">
		<h1>经纪人</h1>
	</div>
	<div id="container">
		<div class="logo_info clear_fix" style="box-shadow: none; padding: 10px 54px">
			<div class="head_logo"><img id="head" src="<?php echo ($userInfo["headimgurl"]); ?>" alt="个人头像"></div>
			<div class="logo_info_top" style="margin: 0">
				<span class="name">姓&nbsp;名:&nbsp;<span class="agent_name"><?php echo ($userInfo["nickname"]); ?></span></span>
				<span class="member" style="margin:0">
					手&nbsp;机:&nbsp;<span class="level agent_phone"><?php echo ($userInfo["telphone"]); ?></span>
				</span>
				<span class="property" style="position: static;">级&nbsp;别:&nbsp;<span class="money rank"><?php echo ($userInfo["leavea"]); ?></span></span>
			</div>
		</div>			
	</div>
	<div id="info_list">
		<div class="use_property" style="margin-bottom: 18px;">
			<p>我的收入：&nbsp;<span class="can my_income"><?php echo ($userInfo["money"]); ?>元</span></p>
		</div>
		<div style="padding-top: 2px;box-shadow: 0 0 16px #C0BBB9;">
		<ul>
			<li><a href="<?php echo U('Index/returnlog');?>"><div><span class="icon_agent trade"></span><span>返佣记录</span><img src="/shares/tpl/simplebootx_mobile/Public/image/g_than.gif"></div></a></li>
			<li><a href="<?php echo U('Index/bonusrecord');?>"><div><span class="icon_agent entry_out_money"></span><span>管理奖金记录</span><img src="/shares/tpl/simplebootx_mobile/Public/image/g_than.gif"></div></a></li>
			<li><a href="<?php echo U('Index/directly');?>"><div><span class="icon_agent trade_pwd"></span><span>直属客户</span><img src="/shares/tpl/simplebootx_mobile/Public/image/g_than.gif"></div></a></li>
			<li><a href="<?php echo U('Index/mycard');?>"><div><span class="icon_agent check_phone"></span><span>我的名片</span><img src="/shares/tpl/simplebootx_mobile/Public/image/g_than.gif"></div></a></li>
			<li><a href="<?php echo U('Index/share');?>"><div style="border: none;"><span class="icon_agent about"></span><span>名片分享</span><img src="/shares/tpl/simplebootx_mobile/Public/image/g_than.gif"></div></a></li>
		</ul>
		</div>
	</div>
</div>

</body>
</html>