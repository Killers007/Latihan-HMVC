<?php 

if ( ! function_exists('tes'))
{
	function tesing($data)
	{
		$res=json_encode($data);
		return json_decode($res);
	}
}


?>