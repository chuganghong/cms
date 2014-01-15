<?php
/**
 *cms20131119项目
 *@description 图片处理类，包括生成验证码，加水印等
 *@filename Image.class.php
 *@author cg
 *@version 1.0
 *@date 2013/12/11 21:18
 */
class Image
{
	/**
	 *生成验证码
	 *@param integer $width=120 验证码的宽度，默认值是120
	 *@param integer $height=35 验证码的高度，默认值是35
	 *@param integer $sum 验证码上的字符数量，默认值是4
	 */
	public function verify($width=120,$height=35,$sum=4)
	{
		//set up image
		$width = 120;
		$height = 35;
		$img = imagecreatetruecolor($width,$height);
		$white = imagecolorallocate($img,255,255,255);
		$blue = imagecolorallocate($img,0,0,64);
		
		//draw on image
		imagefill($img,0,0,$blue);			
		$font = 'arial.ttf';
		
		$mix = 65;   //A
		$max = 90;   //Z
		$sum = 4;
		
		for($i = 1;$i<=$sum;$i++)
		{
			$num = mt_rand($mix,$max);
			$text = chr($num);
			switch($i)
			{
				case 1:
					imagettftext($img,16,0,10,28,$white,$font,$text);
					break;
				case 2:
					imagettftext($img,16,0,40,28,$white,$font,$text);
					break;
				case 3:
					imagettftext($img,16,0,70,28,$white,$font,$text);
					break;
				case 4:
					imagettftext($img,16,0,100,28,$white,$font,$text);
					break;
			}
		}		
		//output image		
		Header("Content-Type:image/PNG");		
		imagepng($img);	
		
		//clean up
		imagedestroy($img);			
	}
}


/*test
$img = new Image();
$img->verify();
*/