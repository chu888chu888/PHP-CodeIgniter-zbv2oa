<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url(); ?>" />    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>风险管理平台</title>
<link href="public/dwz/themes/css/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="login">
		<div id="login_header">
			<h1 class="login_logo">
				<a href="#"><img src="public/dwz/themes/default/images/login_logo.gif" /></a>
			</h1>
			<div class="login_headerContent">
				<div class="navList">
					<ul>
						<li><a href="#">设为首页</a></li>
						<li><a href="#">反馈</a></li>
						<li><a href="#" target="_blank">帮助</a></li>
					</ul>
				</div>
				<h2 class="login_title"><img src="public/dwz/themes/default/images/login_title.png" /></h2>
			</div>
		</div>
		<div id="login_content">
			<div class="loginForm">
				<form action="<?php echo site_url('index/checklogin'); ?>" method="post">
					<p>
						<label>用户名：</label>
						<input type="text" name="username" value="<?php echo $cookie_username; ?>" size="20" class="login_input" />
					</p>
					<p>
						<label>密码：</label>
						<input type="password" name="password" size="20" class="login_input" />
					</p>
					<p>
						<label>验证码：</label>
						<input name="code" class="code" type="text" size="5" />
						<span><img src="<?php echo $src; ?>" width="" height="" style="border:0;" alt="验证码"
                                                           title="点击刷新验证码" onClick="this.src='<?php echo site_url('index/verfication_code/'); ?>'" /></span>
					</p>
                                        <p>
                                                <b style="color:red"><?php echo validation_errors(); ?></b>
                                                <b style="color:red"><?php echo $this->session->flashdata('error'); ?></b>
                                        </p>
					<div class="login_bar">
						<input class="sub" type="submit" value=" " />
					</div>
				</form>
			</div>
			<div class="login_banner"><img src="public/dwz/themes/default/images/login_banner.jpg" /></div>
			<div class="login_main">
				<ul class="helpList">
					<li><a href="#">忘记密码怎么办？</a></li>
					<li><a href="#">为什么登录失败？</a></li>
				</ul>
				<div class="login_inner">
					<p>您可以使用 网易网盘 ，随时存，随地取</p>
					<p>您还可以使用 闪电邮 在桌面随时提醒邮件到达，快速收发邮件。</p>
					<p>在 百宝箱 里您可以查星座，订机票，看小说，学做菜…</p>
				</div>
			</div>
		</div>
		<div id="login_footer">
			Copyright &copy; 2012 ZBV2 Inc. All Rights Reserved.
		</div>
	</div>
</body>
</html>