			<?php
				return array(
					'COOKIE_PREFIX'		 => 'think_',// cookies缓存前缀 
					'system' 			 => php_uname('s'),//操作系统  
					'apache' 			 => php_sapi_name(),//运行环境
					'php'    			 => phpversion() , //PHP版本
					'fileMax'			 => ini_get('post_max_size'),//上传最大文件大小 
					'error'				 => ini_get('display_errors'),//是否开启错误
					'fileDir'            => 'file/',//文件存储路径
				);
				