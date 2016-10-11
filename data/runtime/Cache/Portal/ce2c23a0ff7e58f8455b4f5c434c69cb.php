<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>提现</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no'>
	<meta name='format-detection' content='telephone=no'>
	<link rel="stylesheet" href="/mayajinxin/shares/tpl/simplebootx_mobile/Public/style/common.css" type="text/css">
	<link rel="stylesheet" href="/mayajinxin/shares/tpl/simplebootx_mobile/Public/style/recharge.css" type="text/css">
	<style>
		#head{width:70px;height:70px;}
	</style>
</head>
<body>
	<div id='header'>
		<h1>提现</h1>
	</div>
	<div id="container">
		<div class="logo_info clear_fix">
			<div class="head_logo"><img id="head" src="<?php echo ($userInfo["headimgurl"]); ?>" alt="个人头像"></div>
			<div class="logo_info_top">
				<span class="name"><?php echo ($userInfo["nickname"]); ?></span>
				<span class="member" style="margin-top: 9px;">
					可提现金额：<span class="level" style="color: red"> <?php echo ($userInfo['money']); ?>元 </span>
				</span>
				
			</div>			
		</div>
		<div class="get_money">
			<p><span>提现金额</span><span><input type="text" placeholder="请输入提现金额" value=''></span></p>
			<p>手续费: 2元/笔</p>
		</div>
		
		<div class="charge_way" style="padding: 0; margin-bottom: 0">
			<div>
				<p>提现方式</p>
				<p class="pay"><img src="/mayajinxin/shares/tpl/simplebootx_mobile/Public/image/weixin.gif">微信提现<span class="pay_btn"></span></p>
			</div>
			<p style="border:none" class="phone"><span>已验证手机</span><span class="phone_num">133****1234</span></p>
		</div>
		<div class="check">
			<span>验证码</span>
			<span><input style="border:none" type="text" placeholder="请输入验证码" value=''></span>
			<span class="check_code">获取验证码</span>
			</div>
		<div><input type="" name="" value="立即提现"></div>
	</div>		
</body>
</html>