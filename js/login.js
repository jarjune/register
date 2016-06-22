window.onload=function(){
	document.body.style.background='url('+'"images/bg_'+parseInt(Math.random()*10)+'.jpg"'+') no-repeat  center center'
	var tip = document.getElementById('tip')
	var username = document.getElementsByName('username')[0]
	var password = document.getElementsByName('password')[0]
	var checkcode = document.getElementsByName('checkcode')[0]
	var try1 = false
	var try2 = false
	var try3 = false
	
	//判断用户名
	username.onfocus = function(){
		tip.innerHTML = '可以输入用户名啦~'
	}
	username.onblur = function(){
		var user = username.value
		if(user==''){
			tip.innerHTML = '用户名不能为空哟~'
			username.style.boxShadow = '0px 0px 50px red'
			try1 = false
		}else if(user.length<6 || user.length>12){
			tip.innerHTML = '用户名要6-12个字符哟~'
			username.style.boxShadow = '0px 0px 50px red'
			try1 = false
		}else{
			tip.innerHTML = '用户名OK啦~'
			username.style.boxShadow = '0px 0px 50px #19f'
			try1 = true
		}
		
		if(try1 && try2 && try3){
			tip.innerHTML = '可以登录啦~'
		}
	}
	//判断密码
	password.onfocus = function(){
		tip.innerHTML = '可以输入密码啦~'
	}
	password.onblur = function(){
		var pass = password.value
		if(pass==''){
			tip.innerHTML = '密码不能为空哟~'
			password.style.boxShadow = '0px 0px 50px red'
			try2 = false
		}else if(pass.length<6 || pass.length>16){
			tip.innerHTML = '密码要6-16个字符哟~'
			password.style.boxShadow = '0px 0px 50px red'
			try2 = false
		}else{
			tip.innerHTML = '密码OK啦~'
			password.style.boxShadow = '0px 0px 50px #19f'
			try2 = true
		}
		
		if(try1 && try2 && try3){
			tip.innerHTML = '可以登录啦~'
		}
	}

	//判断验证码
	checkcode.onfocus = function(){
		tip.innerHTML = '可以输入验证码啦~'
	}
	checkcode.onblur = function(){
		var code = checkcode.value
		if(code==''){
			tip.innerHTML = '验证码不能为空哟~'
			checkcode.style.boxShadow = '0px 0px 50px red'
			try3 = false
		}else if(code.length!=4){
			tip.innerHTML = '验证码只有4个字符哟~'
			checkcode.style.boxShadow = '0px 0px 50px red'
			try3 = false
		}else{
			tip.innerHTML = '验证码OK啦~'
			checkcode.style.boxShadow = '0px 0px 50px #19f'
			try3 = true
		}
		
		if(try1 && try2 && try3){
			tip.innerHTML = '可以登录啦~'
		}
	}
}