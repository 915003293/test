<?php
	session_start();
	//sendCode("15360631740");
	//var_dump(checkCode("15360631740","3509"));
	function checkCode($f,$code){
		if(empty($_SESSION['find_time'])){
			//验证码还没发送
			return false;
		}else{
			//已经发送了验证码
			$time = time() - $_SESSION['find_time'];
			if($time>180){
				//超过有效时间
				return false;
			}else{
				if($_SESSION['find_name']!=$f){
					//号码不对
					return false;
				}else{
					if($code!=$_SESSION['find_code']){
						//验证码错误
						return false;
					}else{
						$_SESSION['find_code'] = null;
						$_SESSION['find_name'] = null;
						$_SESSION['find_time'] = null;
						//验证码正确
						return true;
					}
				}
			}
		}
		var_dump( $_SESSION['find_code']);
		var_dump( $_SESSION['find_name']);
		var_dump( $_SESSION['find_time']);
	}
	function sendCode($to){
		//设置时区
		date_default_timezone_set("Asia/Shanghai");
		//ACCOUNT SID 登录秒滴获取
		$ACCOUNTSID	  		 = "555eb095d99e4b359659cc92d51dfd4a";
		//AUTH TOKEN 登录秒滴获取
		$AUTHTOKEN     		 = "ffe8b759d17340e8bb61ae6a3396d1bc";
		//随机生成验证码
		$code		   		 = rand(1000,9999);
		//验证码过期时间
		$time		   		 = 3;
		//短信模版需要在秒滴设置
		$string				 = "【Find论坛】验证码为{$code}，请于{$time}分钟内正确输入验证码。";
		//当前时间
		$ymd				 = date('YmdHis');
		//创建数据
		$data['accountSid']  = $ACCOUNTSID;
		$data['timestamp']   = $ymd;
		$data['sig']         = md5($ACCOUNTSID.$AUTHTOKEN.$ymd);
		$data['to'] 		 = $to;
		$data['smsContent']  = $string;
		$data['respDataType']= "JSON";
		$json				 = POST('https://api.miaodiyun.com/20150822/industrySMS/sendSMS',$data);
		$json				 = json_decode($json);
		if($json -> respCode =="00000" ){
			//发送成功
			$_SESSION['find_name'] = $to;
			$_SESSION['find_code'] = $code;
			$_SESSION['find_time'] = time();
			return true;
		}else{
			//发送失败
			return false;
		}
	}
	function POST($url,$data){
		//发送post请求
		//@url地址
		//@post数据
		$string = null;
		foreach($data as $key => $val){
			$string .= $key . "=" . $val ."&";
		}
		$string = trim($string,"&");
		$ch  	= curl_init();
		//url
		curl_setopt($ch,CURLOPT_URL,$url);
		//不让自动输出
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		//设置头到输出
		curl_setopt($ch,CURLOPT_HEADER,0);
		//标准的POST请求
		curl_setopt($ch,CURLOPT_POST,true);
		//取消https证书验证
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
		//POST数据,可以接受数组,但是最好是拆分成字符串a=f&b=f这样的形式
		curl_setopt($ch,CURLOPT_POSTFIELDS,$string);
		return curl_exec($ch);
	}

