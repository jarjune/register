$(document).ready(function(){
	//验证
	var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((.[a-zA-Z0-9_-]{2,3}){1,2})$/;

	var user_check = false;
	var passwd_check = false;
	var checkpasswd_check = false;
	var email_check = false;
	var code_check = false;


	$.fn.extend({
		errorInfo : function(){
			$(this).removeClass('fi-check').addClass('fi-alert').css('color','orange');
		},
		successInfo : function(){
			$(this).removeClass('fi-alert').addClass('fi-check').css('color','#6BC827');
		},
		U_name : function(){
			if($(this).val()==''){
				$('input[name=username] + i').text("用户名不能为空");
				$('input[name=username] + i').errorInfo();
				user_check = false;
			}else if($(this).val().length>14){
				$('input[name=username] + i').text("用户名必须不超过14个字符");
				$('input[name=username] + i').errorInfo();
				user_check = false;
			}else{
				$('input[name=username] + i').text("");
				$('input[name=username] + i').successInfo();
				user_check = true;
			}
		},
		E_mail : function(){
			if($(this).val()==''){
				$('input[name=email] + i').text("邮箱不能为空");
				$('input[name=email] + i').errorInfo();
				email_check = false;
			}else if(!reg.test($(this).val())){
				$('input[name=email] + i').text("邮箱输入不合法");
				$('input[name=email] + i').errorInfo();
				email_check = false;
			}else{
				$.ajax({
					type : 'post',
					url : 'http://localhost/zc/check_email.php',
					data : {
						'email' : $('input[name=email]').val()
					},
					dataType : 'text',
					success : function(res,sta,xhr){
						if(res==0){
							$('input[name=email] + i').text("");
							$('input[name=email] + i').successInfo();
							email_check = true;
						}else{
							$('input[name=email] + i').text("邮箱已注册");
							$('input[name=email] + i').errorInfo();
							code_check = false;
						}
						
					}
				});
			}
		},
		P_word : function(){
			if($(this).val()==''){
				$('input[name=passwd] + i').text("密码不能为空");
				$('input[name=passwd] + i').errorInfo();
				passwd_check = false;
			}else if($(this).val().length>16 || $(this).val().length<6){
				$('input[name=passwd] + i').text("密码必须是6-16个字符");
				$('input[name=passwd] + i').errorInfo();
				passwd_check = false;
			}else{
				$('input[name=passwd] + i').text("");
				$('input[name=passwd] + i').successInfo();
				passwd_check = true;
			}
		},
		CP_word : function(){
			if($(this).val()==''){
				$('input[name=checkpasswd] + i').text("确认密码不能为空");
				$('input[name=checkpasswd] + i').errorInfo();
				checkpasswd_check = false;
			}else if($(this).val() != $('input[name=passwd]').val()){
				$('input[name=checkpasswd] + i').text("密码不一致");
				$('input[name=checkpasswd] + i').errorInfo();
				checkpasswd_check = false;
			}else{
				$('input[name=checkpasswd] + i').text("");
				$('input[name=checkpasswd] + i').successInfo();
				checkpasswd_check = true;
			}
		},
		C_code : function(){
			if($(this).val()==''){
				$('input[name=checkcode] + i').text("验证码不能为空");
				$('input[name=checkcode] + i').errorInfo();
				code_check = false;
			}else if($(this).val().length==4){
				$.ajax({
					type : 'post',
					url : 'http://localhost/zc/check.php',
					data : {
						'checkCode' : $('input[name=checkcode]').val()
					},
					dataType : 'text',
					success : function(res,sta,xhr){
						if(res){
							$('input[name=checkcode] + i').text("");
							$('input[name=checkcode] + i').successInfo();
							code_check = true;
						}else{
							$('input[name=checkcode] + i').text("验证码错误");
							$('input[name=checkcode] + i').errorInfo();
							code_check = false;
						}
					},
					error : function(res){
						alert(res);
					}
				});
			}else{
				$('input[name=checkcode] + i').text("验证码错误");
				$('input[name=checkcode] + i').errorInfo();
				code_check = false;
			}
		}
	});

	$('input[name=username]').blur(function(){
		$(this).U_name();
	});

	$('input[name=email]').blur(function(){
		$(this).E_mail();
	});
	
	$('input[name=passwd]').blur(function(){
		$(this).P_word();
	});

	$('input[name=checkpasswd]').blur(function(){
		$(this).CP_word();
	});

	$('input[name=checkcode]').blur(function(){
		$(this).C_code();
	});

	$('#Code').click(function(){
		$(this).attr('src','checkImg/checkCode.php?change='+Math.random());
	});

	$('.btn').click(function(){
		if(user_check&&email_check&&checkpasswd_check&&passwd_check&&code_check){
			$.ajax({
				type : 'post',
				url : 'register.php',
				data : {
					"username" : $('input[name=username]').val(),
					"passwd" : $('input[name=passwd]').val(),
					"email" : $('input[name=email]').val()
				},
				dataType : 'json',
				success : function(res,sta,xhr){
					// document.write(res==0);
					// alert(res+"-"+res['row']+res['judge']);
					if(res['row']!=0)
						alert('提交成功');
					else
						alert('提交失败');

					if(res['judge']){
							window.location.href="http://localhost/zc/activation.php";
					}else{
							alert("邮件发送失败");
					}
				},
				error : function(res,sta,xhr){
					alert('提交失败');
				}
			});
		}else{
			alert('信息还没填好哦');
		}
		$('#Code').attr('src','checkImg/checkCode.php?change='+Math.random());
		$('input[name=username]').U_name();
		$('input[name=passwd]').P_word();
		$('input[name=checkpasswd]').CP_word();
		$('input[name=email]').E_mail();
		$('input[name=checkcode]').C_code();
		code_check = false;

	});

});