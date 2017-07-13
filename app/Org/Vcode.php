<?php
namespace App\Org;

/**
 * 验证码类
 * @author lamp兄弟连php184朱云飞 <765065120@qq.com>
 */

class Vcode
{
    private $code; //码
    private $length; //码长度
    private $width; //宽
    private $height; //高
    private $img; //资源
    private $font; //字体
    private $size; //字体大小

    /**
     * 构造函数: 初始化设置验证码的一些属性
     * @param number $length  验证码的位数
     * @param number $width   验证码图片的宽度
     * @param number $height  验证码图片的高度
     */
    public function __construct($length = 4, $width = 200, $height = 60)
    {
        $str = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $this->length = $length;
        $this->code = substr(str_shuffle($str), 0, $this->length);
        $this->width = $width;
        $this->height = $height;
        $this->font = __DIR__ . '/font/code.ttf';
        $this->size = $height / 2; //字体大小设置为高度的一半
    }

    // 获取画布资源
    private function getImg()
    {
        $img = imagecreatetruecolor($this->width, $this->height);
        $color = imagecolorallocate($img, 0xF4, 0xF8, 0xFF);
        imagefill($img, 0, 0, $color);
        return $img;
    }

    // 画验证码
    private function setCode()
    {
        /*
        array imagettftext ( resource $image , float $size , float $angle , int $x , int $y , int $color , string $fontfile , string $text )
         */
        // 字体位置是以左下角为基点的
        $x = $this->size; //x位置 前面空一个字体大小位置
        $y = $this->height / 4 * 3; //y位置 上面空3/4高度位置

        for ($i = 0; $i < $this->length; $i++) {
            $code_s = ($this->code) {$i};
            $color = imagecolorallocate($this->img, rand(0, 255), rand(0, 255), rand(0, 255));
            $angle = rand(-10, 10);
            imagettftext($this->img, $this->size, $angle, $x + $i * $this->size, $y, $color, $this->font, $code_s);
        }

    }

    // 设置干扰元素
    private function setInterference()
    {
        /*bool imagesetpixel ( resource $image , int $x , int $y , int $color )*/
        for ($i = 0; $i < 50; $i++) {
            $color = imagecolorallocate($this->img, rand(0, 255), rand(0, 255), rand(0, 255));
            imagesetpixel($this->img, rand(0, $this->width), rand(0, $this->height), $color);
        }
        for ($i = 0; $i < 6; $i++) {
            $color = imagecolorallocate($this->img, rand(0, 255), rand(0, 255), rand(0, 255));
            /*bool imageline ( resource $image , int $x1 , int $y1 , int $x2 , int $y2 , int $color )*/
            imageline($this->img, rand(0, $this->width), rand(0, $this->height), rand(0, $this->width), rand(0, $this->height), $color);
        }
    }

    // 输出验证码
    private function output()
    {
        header('Content-type: image/jpeg');
        imagejpeg($this->img);
        imagedestroy($this->img);
    }

    /**
     * 供外部调用：生成验证码图片
     * @param  void   没有参数
     * @return void   没有返回值
     */
    public function doImg()
    {
        // 获取画布
        $this->img = $this->getImg();
        // 设置干扰元素
        $this->setInterference();
        // 画验证码
        $this->setCode();
        // 输出验证码
        $this->output();
    }
    /**
     * 供外部调用： 输出验证码
     * @param  void   没有参数
     * @return string 返回验证码字符串(小写)
     */
    public function getCode()
    {
        return strtolower($this->code);
    }
}
