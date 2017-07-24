<?php
namespace App\Org;

use App\Org\PSCWS4;

class Chinese
{

    public static function fenci($str)
    {
        // 实例化
        $cws = new PSCWS4();
        // 设置字符集
        $cws->set_charset('utf8');
        // 设置词典
        $cws->set_dict('etc/dict.utf8.xdb');
        // 设置utf8规则
        $cws->set_rule('etc/rules.utf8.ini');
        // 忽略标点符号
        $cws->set_ignore(true);
        // 传递字符串
        $cws->send_text($str);
        // 获取权重最高的前十个词
        $ret = $cws->get_tops(20);
        // 关闭
        $cws->close();
        // 返回结果
        return $ret;
    }
}
