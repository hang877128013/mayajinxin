<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no maximum-scale=1.0"  />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ($site_name); ?></title>
<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
<meta name="description" content="<?php echo ($site_seo_description); ?>">
<link rel="stylesheet" type="text/css" href="/shares/tpl/simplebootx_mobile/Public/style/base.css" />
<link rel="stylesheet" type="text/css" href="/shares/tpl/simplebootx_mobile/Public/style/skins/all.css" />
<link rel="stylesheet" type="text/css" href="/shares/tpl/simplebootx_mobile/Public/style/style.css" />
<link rel="stylesheet" type="text/css" href="/shares/tpl/simplebootx_mobile/Public/style/member.css">
<link rel="stylesheet" href="/shares/tpl/simplebootx_mobile/Public/style/font-awesome.min.css">
<link rel="stylesheet" href="/shares/tpl/simplebootx_mobile/Public/style/swiper.css">
<script type="text/javascript" src="/shares/tpl/simplebootx_mobile/Public/js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="/shares/tpl/simplebootx_mobile/Public/js/swiper.jquery.min.js"></script>
<script type="text/javascript" src="/shares/tpl/simplebootx_mobile/Public/js/touchScroll.js"></script>
<script type="text/javascript" src="/shares/tpl/simplebootx_mobile/Public/js/icheck.min.js"></script>
<script type="text/javascript" src="/shares/tpl/simplebootx_mobile/Public/js/city.js"></script>
<script type="text/javascript" src="/shares/tpl/simplebootx_mobile/Public/js/area.js"></script>
<script type="text/javascript" src="/shares/tpl/simplebootx_mobile/Public/js/js.js"></script>
<script type="text/javascript" src="/shares/statics/js/zt/js_zt.js"></script>
<!--统计代码-->
<?php  ?>
</head>
<body class="f0">
	<form action="<?php echo U('Index/dologin');?>" method="post">
		<div class="login_box">
			<div class="int_box">
				<p class="name"><input type="tel" id="phone" name="phone" placeholder="请输入手机号码" datatype="m" nullmsg="请输入手机号！" errormsg="手机号不正确！"/></p>
				<p class="pass"><input type="password" name="password" datatype="s6-18" nullmsg="请输入密码" errormsg="密码需6-18位字符！" placeholder="请输入登录密码" /></p>
			</div>
			<p class="od_word"><a href="<?php echo U('Index/zhmm');?>"><font color="red">忘记密码？</font></a></p>
			<input type="submit" value="登录" class="login_btn zt_ajax_form" />
		</div>
	</form>
	
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    /*
     * 注意：
     * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
     * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
     * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
     *
     * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
     * 邮箱地址：weixin-open@qq.com
     * 邮件主题：【微信JS-SDK反馈】具体问题
     * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
     */
    wx.config({
        debug: false,
        appId: '<?php echo ($site_AppId); ?>',
        timestamp: '<?php echo ($signPackage1["timestamp"]); ?>',
        nonceStr: '<?php echo ($signPackage1["nonceStr"]); ?>',
        signature: '<?php echo ($signPackage1["signature"]); ?>',
        jsApiList: [
            // 所有要调用的 API 都要加到这个列表中
            'onMenuShareAppMessage', 'onMenuShareTimeline', 'scanQRCode'
        ]
    });
    wx.ready(function () {
        // 在这里调用 API

        wx.onMenuShareAppMessage({
            title: '<?php echo ($site_name); ?>', // 分享标题
            desc: '<?php echo ($site_seo_description); ?>', // 分享描述
            link: '<?php echo ($weixin_url); ?>', // 分享链接
            imgUrl: 'http://yixin.woyii.com//shares/tpl/simplebootx_mobile/Public/image/wx_logo.png', // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
                //layer.msg('分享成功了');
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
                //layer.msg('分享取消了');
            }
        });

        wx.onMenuShareTimeline({
            title: '<?php echo ($site_name); ?>', // 分享标题
            link: '<?php echo ($weixin_url); ?>', // 分享链接
            imgUrl: 'http://yixin.woyii.com//shares/tpl/simplebootx_mobile/Public/image/wx_logo.png', // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
                //layer.msg('分享成功了');
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
                //layer.msg('分享取消了');
            }
        });

/* 2016-07-14 注释，此只有在附近商铺里调用，因此不做为通用
        wx.getLocation({
            success: function (res) {
                var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                var speed = res.speed; // 速度，以米/每秒计
                var accuracy = res.accuracy; // 位置精度
//                    //返回坐标

                $("#zuobiao").val(latitude+","+longitude);
                if ($(".view_list_box").size() > 0) {
                    if($(".view_list_box").hasClass('on')) {
                        var page = 1;
                        var IsNext = true;
                        $(document).ready(function () {
                            $(window).scroll(function () {
                                var tops = parseFloat($(window).height()) + parseFloat($(window).scrollTop()) + 380; //380
                                var h = $(document).height();
                                //h = $(document.body).height()*page;
                                var w = tops - h;
                                if (IsNext && w >= 0) {
                                    if (IsNext) page++;
                                    foodlist(page);
                                }
                            });
                            foodlist(1);//第二个参数是坐标地址 其他项目可删掉
                        });
                    }
                }
            },
            cancel: function (res) {
                alert('用户拒绝授权获取地理位置');
            }
        });
*/
    });


    $(function(){
	//获取当前地理位置
	$("#getLocation").click(function() {
		getuserlocation();
	});

        function getuserlocation() {
            wx.getLocation({
                success: function (res) {
                    var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                    var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                    var speed = res.speed; // 速度，以米/每秒计
                    var accuracy = res.accuracy; // 位置精度
//                    //返回坐标
//                    return JSON.stringify(res);
                },
                cancel: function (res) {
                    alert('用户拒绝授权获取地理位置');
                }
            });
        }

        //点击扫描按钮，扫描二维码并返回结果
        $("#scanQRCode").click(function() {
            wx.scanQRCode({
                needResult: 1, // 默认为0，扫描结果由微信处理，1则直接返回扫描结果，
                scanType: ["qrCode","barCode"], // 可以指定扫二维码还是一维码，默认二者都有
                success: function (res) {
                    //扫码后获取结果参数:htpp://xxx.com/c/?6123，截取到url中的防伪码后，赋值给Input
                    var url = res.resultStr;
                    //var tempArray = url.split('?');
                    //var tempNum = tempArray[1];
                    $("#seller").val(url);
                    $("#user").val(url);
                    hd();//调用不同页面的验证
                }
            });
        });
    });

</script>
</body>
</html>