<?php 
if (! function_exists('redirect_back'))
	{
		function redirect_back()
		{
			if(isset($_SERVER['HTTP_REFERER']))
			{
				header('Location:'.$_SERVER['HTTP_REFERER']);
			}else{
				header('Location:http://'.$_SERVER['SERVER_NAME']);
			}
			exit;
		}
	}