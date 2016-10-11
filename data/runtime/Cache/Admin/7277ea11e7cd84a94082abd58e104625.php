<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/shares/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/shares/statics/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/shares/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/shares/statics/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}

	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/shares/statics/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/shares/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/shares/statics/js/jquery.js"></script>
    <script src="/shares/statics/js/wind.js"></script>
    <script src="/shares/statics/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<body class="J_scroll_fixed">
	<div class="wrap jj">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('Interface/index');?>">线下订单添加列表</a></li>
			<li class="active"><a href="<?php echo U('Interface/add');?>">添加线下课程订单 </a></li>
		</ul>
		<div class="common-form">
			<form method="post" class="form-horizontal J_ajaxForm" action="<?php echo U('Interface/add_post');?>">
				<fieldset>
					<div class="control-group">
						<label class="control-label">课程名称:</label>
						<div class="controls">
							<input type="text" class="input" name="curriculum_name" value="">
							<span class="must_red">*</span>
							<span style="margin-left: 15px;">课程名称必须完全一致，请确认好前后无空格</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">会员ID:</label>
						<div class="controls">
							<input type="text" class="input" name="uid" value="">
							<span class="must_red">*</span>
							<span style="margin-left: 15px;">会员ID为唯一标识，可在会员列表查看</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">备注:</label>
						<div class="controls">
							<textarea name="interface_bz" rows="5" cols="57"></textarea>
						</div>
					</div>
				</fieldset>
				<div class="form-actions">
					<button class="btn btn-primary btn_submit" type="submit">添加</button>
					<a class="btn" href="/shares/index.php/admin/interface">返回</a>
				</div>
			</form>
		</div>
	</div>
	<script src="/shares/statics/js/common.js"></script>
</body>
</html>