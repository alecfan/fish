<?php
use App\Org\REST;
use Illuminate\Support\Facades\DB;

/**
 * 发送模板短信
 *
 * @param
 *            to 手机号码集合,用英文逗号分开
 * @param
 *            datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
 * @param $tempId 模板Id,测试应用和未上线应用使用测试模板请填写1，正式应用上线后填写已申请审核通过的模板ID
 */
function sendTemplateSMS($to, $datas, $tempId)
{
    // 主帐号,对应开官网发者主账号下的 ACCOUNT SID
    $accountSid = '8aaf07085d106c7f015d51680d071945';

    // 主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
    $accountToken = '8389644aba91400a8674ba1049aba849';

    // 应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
    // 在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
    $appId = '8aaf07085d106c7f015d51680d451949';

    // 请求地址
    // 沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
    // 生产环境（用户应用上线使用）：app.cloopen.com
    $serverIP = 'sandboxapp.cloopen.com';

    // 请求端口，生产环境和沙盒环境一致
    $serverPort = '8883';

    // REST版本号，在官网文档REST介绍中获得。
    $softVersion = '2013-12-26';
    // 初始化REST SDK
    // global $accountSid, $accountToken, $appId, $serverIP, $serverPort, $softVersion;
    $rest = new REST($serverIP, $serverPort, $softVersion);
    $rest->setAccount($accountSid, $accountToken);
    $rest->setAppId($appId);

    // 发送模板短信
    // echo "Sending TemplateSMS to $to <br/>";
    $result = $rest->sendTemplateSMS($to, $datas, $tempId);
    return $result;
    // if ($result == NULL) {
    // //echo "result error!";
    // // break;
    // return false;
    // }
    // if ($result->statusCode != 0) {
    // echo "error code :" . $result->statusCode . "<br>";
    // echo "error msg :" . $result->statusMsg . "<br>";
    // // TODO 添加错误处理逻辑
    // } else {
    // echo "Sendind TemplateSMS success!<br/>";
    // // 获取返回信息
    // $smsmessage = $result->TemplateSMS;
    // echo "dateCreated:" . $smsmessage->dateCreated . "<br/>";
    // echo "smsMessageSid:" . $smsmessage->smsMessageSid . "<br/>";
    // // TODO 添加成功处理逻辑
    // }
}

/**
 * 查询指定一级分类下的最新的N个商品
 *
 * @param int $tid
 *            一级分类id
 * @param int $num
 *            要查的商品数目
 * @return array 查出的商品
 */
function getGoods($tid, $num)
{
    $ids = [];
    $type2ids = DB::table('type')->select('id')
        ->where('pid', $tid)
        ->get();

    foreach ($type2ids as $type2id) {
        $type3ids = DB::table('type')->where('pid', $type2id->id)->get();
        foreach ($type3ids as $type3id) {
            $ids[] = $type3id->id; // 一级分类下所有三级分类的id
        }
    }

    $goods = DB::table('goods')->join('goodspics', 'goodspics.gid', '=', 'goods.id')
        ->select('goods.id', 'goods.title', 'goods.price', 'goodspics.picname')
        ->whereIn('goods.tid', $ids)
        ->where('goodspics.mpic', 1)
        ->where('goods.status', 0)
        ->where('goods.is_auction', 0)
        ->orderBy('goods.addtime', 'desc')
        ->limit($num)
        ->get();
    return $goods;
}