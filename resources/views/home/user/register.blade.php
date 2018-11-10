<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>个人注册</title>
    <link rel="stylesheet" type="text/css" href="/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/css/pages-register.css" />
</head>

<body>
    <div class="register py-container ">
        <!--head-->
        <div class="logoArea">
            <a href="" class="logo"></a>
        </div>
        <!--register-->
        <div class="registerArea">
            <h3>注册新用户<span class="go">我有账号，去<a href="{{ route('home_login') }}" target="_blank">登陆</a></span></h3>
            <div class="info">
                <form action="{{ route('doregist') }}" class="sui-form form-horizontal" method="post">
                {{ csrf_field() }}
                    <div class="control-group">
                        <label class="control-label">用户名：</label>
                        <div class="controls">
                            <input type="text" placeholder="请输入用户名" id="name" onblur="check_user_name()" name="username" class="input-xfat input-xlarge">
                        </div>
                        <span id="err_name"></span>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">登录密码：</label>
                        <div class="controls">
                            <input type="password" placeholder="设置登录密码" id="pwd" onblur="check_pwd()" name="password" class="input-xfat input-xlarge">
                        </div>
                        <span id="err_pwd"></span>
                    </div>
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">确认密码：</label>
                        <div class="controls">
                            <input type="password" placeholder="再次确认密码" id="repwd" onblur="check_pwd2()" name="repossword" class="input-xfat input-xlarge">
                        </div>
                        <span id="re_err_pwd"></span>
                    </div>

                    <div class="control-group">
                        <label class="control-label">手机号：</label>
                        <div class="controls">
                            <input type="text" placeholder="请输入你的手机号" id="phone"  onblur="check_phone()" name="mobile" class="input-xfat input-xlarge">
                        </div>
                        <span id="err_phone"></span>
                    </div>
                    
                    <div class="control-group">
                        <label for="inputPassword" class="control-label">短信验证码：</label>
                        <div class="controls">
                            <input type="text" placeholder="短信验证码" name="mobile_code" class="input-xfat input-xlarge"> 
                            <input type="button" id="btn-send" value="获取短信验证码">
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="inputPassword" class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <div class="controls">
                            <input name="m1" type="checkbox" value="2" checked=""><span>同意协议并注册《品优购用户协议》</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"></label>
                        <div class="controls btn-reg">
                            <input type="submit" class="sui-btn btn-block btn-xlarge btn-danger" value="提交注册">
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
        <!--foot-->
        <div class="py-container copyright">
            <ul>
                <li>关于我们</li>
                <li>联系我们</li>
                <li>联系客服</li>
                <li>商家入驻</li>
                <li>营销中心</li>
                <li>手机品优购</li>
                <li>销售联盟</li>
                <li>品优购社区</li>
            </ul>
            <div class="address">地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</div>
            <div class="beian">京ICP备08001421号京公网安备110108007702
            </div>
        </div>
    </div>


    <script type="text/javascript" src="/js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/js/plugins/jquery.easing/jquery.easing.min.js"></script>
    <script type="text/javascript" src="/js/plugins/sui/sui.min.js"></script>
    <script type="text/javascript" src="/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
    <script type="text/javascript" src="/js/pages/register.js"></script>

</body>

</html>

<script>


    //定时60s
		var seconds = 60;
		//保存定时
		var si;
		//给发送验证码的按钮添加一个点击事件
		$("#btn-send").click(function(){
			var mobile = $("input[name=mobile]").val();
			//ajax传到服务器
			$.ajax({
				type:"GET",    //GET方式
                url:"{{ route('sendmobilecode') }}",
				data:{mobile:mobile},						  //提交参数（手机号码）
				success:function(data){	
                    // console.log(data);					  //ajax成功之后执行的代码
					$("#btn-send").attr('disable',true);

					si = setInterval(function(){
						//每秒执行一次
						seconds--;
						if(seconds==0){
							$("#btn-send").attr('disable',false);
							seconds = 60;
							$('#btn-send').val("发送验证码");
							//关闭定时器
							clearInterval(si);
						}else{
							$("#btn-send").val("还剩："+(seconds));
						}
					},1000);
				}
			});
		});

// 验证用户名
    function check_user_name()
    {

        var userName = document.getElementById("name").value;
        var regName = /[a-zA-Z]\w{4,16}/
        if (userName == "" || userName.trim() == "") {
            document.getElementById("err_name").innerHTML = "请输入用户名";
            return false;
        } else if (!regName.test(userName)) {
            document.getElementById("err_name").innerHTML = "由英文字母和数字组成的4-16位字符，以字母开头";
            return false;
        } else {
            document.getElementById("err_name").innerHTML = "ok!!!";
            return true;
        }
    }

// 验证密码
    function check_pwd() {
        var pwd = document.getElementById("pwd").value;
        var regPwd = /^\w{4,10}$/;
        if (pwd == "" || pwd.trim() == "") {
            document.getElementById("err_pwd").innerHTML = "请输入密码";
            return false;
        } else if (!regPwd.test(pwd)) {
            document.getElementById("err_pwd").innerHTML = "请输入6-10位的密码  ";
            return false;
        } else {
            document.getElementById("err_pwd").innerHTML = "ok!!!";
            return true;
        }
    }

// 确认密码
    function check_pwd2() {
        
        var pwd = document.getElementById("pwd").value;
        var pwd2 = document.getElementById("repwd").value;
        if (pwd2 == "" || pwd2.trim() == "") {
            document.getElementById("re_err_pwd").innerHTML = "请输入密码";
            return false;
        } else if (pwd2 !== pwd) {
            document.getElementById("re_err_pwd").innerHTML = "两次输入密码不一致";
            return false;
        } else {
            document.getElementById("re_err_pwd").innerHTML = "ok!!!";
            return true;
        }
    }


// 验证手机号
    function check_phone() {
        var phone = document.getElementById("phone").value;
        var regPhone = /^[1][3,4,5,7,8,9][0-9]{9}$/;
        if (phone == "" || phone.trim() == "") {
            document.getElementById("err_phone").innerHTML = "请输入手机号";
            return false;
        } else if (!regPhone.test(phone)) {
            document.getElementById("err_phone").innerHTML = "请输入正确的手机号";
            return false;
        } else {
            document.getElementById("err_phone").innerHTML = "ok!!!";
            return true;
        }
    }
</script>


 