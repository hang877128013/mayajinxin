<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录后台管理系统</title>
<link href="/mayajinxin/shares/tpl_admin/simpleboot/assets/_login/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/mayajinxin/shares/tpl_admin/simpleboot/assets/_login/js/jquery.js"></script>
<script src="/mayajinxin/shares/tpl_admin/simpleboot/assets/_login/js/cloud.js" type="text/javascript"></script>
<script type="text/javascript" src="/mayajinxin/shares/tpl_admin/simpleboot/assets/_login/js/jquery.min.js"></script>
<script type="text/javascript" src="/mayajinxin/shares/tpl_admin/simpleboot/assets/_login/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/mayajinxin/shares/tpl_admin/simpleboot/assets/_login/js/jquery.layout.js"></script>

<script language="javascript">
	$(function(){
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
	$(window).resize(function(){  
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    })  
});  
</script> 

</head>

<body style="background-color:#1c77ac; background-image:url(/mayajinxin/shares/tpl_admin/simpleboot/assets/_login/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">



    <div id="mainBody">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
    </div>  


<div class="logintop">    
    <span>欢迎登录后台管理界面平台</span>    
       
    </div>
    
    <div class="loginbody">
        <span class="systemlogo"></span>  
        <div class="loginbox loginbox1" style="top: 200px;">
			<form method="post" name="login" action="<?php echo U('public/dologin');?>" autoComplete="off" class="J_ajaxForm form-horizontal J_ajaxForms">
                <ul>
                    <li><input name="username" type="text" class="loginuser" value=""  placeholder="请输入用户名" datatype="Require" msg="请输入用户名" /></li>
                    <li><input name="password" type="password" class="loginpwd" value="" placeholder="请输入密码" datatype="Require" msg="请输入密码" /></li>
                    <li class="yzm"><span><input name="verify" type="text" value=""  placeholder="请输入验证码" datatype="Require" msg="请输入验证码" /></span><cite><?php echo sp_verifycode_img('length=4&font_size=15&width=113&height=47&charset=1234567890');?></cite> </li>
                    
					<li id="login_btn_wraper">
					<button type="submit" name="submit" class="btn btn_submit J_ajax_submit_btn loginbtn login_post">登录</button>
					</li>
                </ul>
            </form>
        </div>
    </div>
    
    
    <div class="loginbm"></div>
	
    
</body>
<script>
var GV = {
	DIMAUB: "/mayajinxin/shares/",
	JS_ROOT: "statics/js/",//js版本号
	TOKEN : ''	//token ajax全局
};
</script>
<script src="/mayajinxin/shares/statics/js/wind.js"></script>
<script src="/mayajinxin/shares/statics/js/jquery.js"></script>
<script type="text/javascript" src="/mayajinxin/shares/statics/js/common.js"></script>
<script>
;(function(){
	document.getElementById('J_admin_name').focus();
	
})();
</script>
</html>