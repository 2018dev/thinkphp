<?php
class code{
    
        /**
     * @desc  生成图片二维码
     * @param string $url   生成图片内容
     * @return string
     * @author hanxiaochun
     */
    public static function getCode($url) {
        if(!$url){
            return false;
        }
        $errorCorrectionLevel = 'L';  //容错级别
        $matrixPointSize = 6;      //生成图片大小
        $filename = dirname($_SERVER['SCRIPT_FILENAME']).'/QRcode/'.uniqid().'.png';//生成二维码图片
        //import('ORG.Util.Qrcode');
        include_once 'phpqrcode.php';
        QRcode::png($url, $filename , $errorCorrectionLevel, $matrixPointSize, 2);
        $QR = $filename;        //已经生成的原始二维码图片文件
        $QR = imagecreatefromstring(file_get_contents($QR));
        imagepng($QR, 'qrcode.png');//输出图片
        imagedestroy($QR);
        return 'qrcode.png';
    }
}
$img = code::getCode('www.baidu.com');
echo "<img src='{$imt}'>";
