<?php if (!defined('THINK_PATH')) exit();?><style>
select {
	width: auto !important;
	height: auto !important;
}

input {
	height: auto !important;
}
</style>

</head>
<!doctype html>
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
	</style><?php endif; ?><body class="J_scroll_fixed">
	<div class="wrap J_check_wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="javascript:;">课程列表</a></li>
            <li><a href="<?php echo U('Curriculum/add');?>">添加课程</a></li>
		</ul>
		<form class="well form-search" method="post" action="<?php echo U('Curriculum/index');?>">
			<div class="search_type cc mb10">
				<div class="mb10">
					<span class="mr20">
                        
						<input type="text" name="keyword" style="width: 200px;" value="<?php echo ($formget["keyword"]); ?>" placeholder="课程名称..."> &nbsp; &nbsp;
                        价格：
						<input type="text" name="start_money" value="<?php echo ($formget["start_price"]); ?>" style="width: 100px;" autocomplete="off">-
						<input type="text" name="end_money" value="<?php echo ($formget["end_price"]); ?>" style="width: 100px;" autocomplete="off"> &nbsp; &nbsp;
                        
						
                        
                        &nbsp;
                        <!-- <select name="goods_type">
                            <option value="0">商品分类...</option>
                            <?php if(is_array($goods_class)): foreach($goods_class as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" <?php if($formget['goods_type'] == $vo['id']): ?>selected<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                        </select> -->
                        已售数量：
						<input type="text" name="start_xl" value="<?php echo ($formget["start_xl"]); ?>" style="width: 100px;" autocomplete="off">-
						<input type="text" name="end_xl" value="<?php echo ($formget["end_xl"]); ?>" style="width: 100px;" autocomplete="off"> &nbsp; 
						<input type="submit" class="btn btn-primary" value="搜索" />
					</span>
				</div>
			</div>
		</form>
		<form class="J_ajaxForm" action="" method="post">
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th><label><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></label></th>
                        <th>排序</th>
                        <th>课程名程</th>
                        <th>课程图标</th>
                        <th>课程价格</th>
						<th>一级分佣</th>
						<th>二级分佣</th>
                        <th>三级分佣</th>
                        <th>售出数量</th>
                        <th>课程状态</th>
						<th>操作</th>
					</tr>
				</thead>
				<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
					<td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="ids[]" value="<?php echo ($vo["id"]); ?>" title="ID:<?php echo ($vo["id"]); ?>"></td>
                    <td><input name='listorders[<?php echo ($vo["id"]); ?>]' class="input input-order mr5" type='text' size='3' value='<?php echo ($vo["listorder"]); ?>'></td>
					<td><?php echo ($vo["curriculum_name"]); ?></td>
                    <td>
                    	<?php $curriculum_pic = json_decode($vo['curriculum_pic']); ?>
                    	<img src="<?php echo ($curriculum_pic[0]); ?>" style="width:50px; height:50px;" />
                    </td>
                    <td><?php echo ($vo["curriculum_money"]); ?></td>
                    <td><?php echo ($vo["one_level"]); ?></td>
                    <td><?php echo ($vo["two_level"]); ?></td>
                    <td><?php echo ($vo["three_level"]); ?></td>
                    <td><?php echo ($vo["sold_number"]); ?></td>
                    <td style="text-align:center;">
                        <?php if($vo['curriculum_status'] == 1): ?><font color="red" size="5px;"><a href="javascript:void(0)" class="curriculum_status" data-msg="您确定要下架吗？" data-url="<?php echo U('Curriculum/status');?>" data-id="<?php echo ($vo["id"]); ?>" data-value="0">√</a></font>
                        <?php else: ?>
                            <a href="javascript:void(0)" class="curriculum_status" data-msg="您确定要上架吗？" data-url="<?php echo U('Curriculum/status');?>" data-id="<?php echo ($vo["id"]); ?>" data-value="1"><font color="red" size="5px;"  >╳</font></a><?php endif; ?>
                    </td>
                    <td>
						<a href="<?php echo U('Curriculum/edit',array('id'=>$vo['id']));?>">修改</a> | 
						<a href="<?php echo U('Curriculum/delete',array('id'=>$vo['id']));?>" class="J_ajax_del">删除</a>
                    </td>
				</tr><?php endforeach; endif; ?>
				
			</table>
			<div class="table-actions">
                <button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('Curriculum/listorders');?>">排序</button>
				<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('Curriculum/delete');?>" data-subcheck="true" data-msg="你确定删除吗？">删除</button>
			</div>
			<div class="pagination"><?php echo ($Page); ?></div>
		</form>
	</div>
	<script src="/shares/statics/js/common.js"></script>
	<script src="/shares/statics/js/jquery-1.8.2.min.js"></script>
	<script src="/shares/statics/js/layer/layer.js"></script>
	<script src="/shares/statics/js/zt/js_zt.js"></script>
	
</body>
</html>