<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>充值</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no'>
	<meta name='format-detection' content='telephone=no'>
	<link rel="stylesheet" href="/mayajinxin/shares/tpl/simplebootx_mobile/Public/style/recharge.css" type="text/css">
	<link rel="stylesheet" href="/mayajinxin/shares/tpl/simplebootx_mobile/Public/style/common.css" type="text/css">
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
			<div class="head_logo"><img  id="head" src="<?php echo ($userInfo["headimgurl"]); ?>" alt="个人头像"></div>
			<div class="logo_info_top">
				<span class="name"><?php echo ($userInfo['nickname']); ?></span>
				<span class="member">
					<!--会员等级:<span class="level"> 白银 </span><img src="/mayajinxin/shares/tpl/simplebootx_mobile/Public/image/star.png" alt=""><img src="/mayajinxin/shares/tpl/simplebootx_mobile/Public/image/star.png" alt="">-->
				</span>
				<span class="property">资产:<span class="money"><?php echo ($userInfo['money']); ?>元</span></span>
			</div>			
		</div>
		<div class="charge_money">
			<p>充值金额</p>
			<table cellspacing='16'>
				<tr>
					<td>5000元</td>
					<td>500元</td>
					<td>50元</td>
				</tr>
				<tr>
					<td>2000元</td>
					<td>200元</td>
					<td>30元</td>
				</tr>
				<tr>
					<td>1000元</td>
					<td>100元</td>
					<td>20元</td>
				</tr>
			</table>
		</div>
		<div class="charge_way">
			<p>充值方式</p>
			<p class="pay"><img src="/mayajinxin/shares/tpl/simplebootx_mobile/Public/image/weixin.gif">微信支付<span class="pay_btn"></span></p>
			
		</div>
		<div><input type="" name="" value="确定"></div>
	</div>		
</body>
</html>