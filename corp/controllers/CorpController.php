<?php

namespace corp\controllers;

use Yii;

class CorpController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$this->layout = false;
    	$wechat 	= Yii::$app->wechat;
    	$agentid	= $wechat->agentid;
    	$cretime	= "时间：".date("Y-m-d H:i:s")."\n";
    	$bmKeShi	= "处室：11楼综合科\n";
    	$bmRoom     = "房号：1118室\n";
    	$Device		= "设备：三星打印机\n";
    	$FixTyp		= "内容：硒鼓\n";
    	//     	$content	= $cretime.$bmKeShi.$bmRoom.$Device.$FixTyp.
    	//     	              "最新维修任务已填报，我们即刻出发前往维修，请稍候……\n
    	//                        <a href=\"http://work.weixin.qq.com\">确认接单?</a>\n";
    	$content	= $cretime.$bmKeShi.$bmRoom.$Device.$FixTyp.
    	"最新维修任务已填报，我们即刻出发前往维修，请稍候……\n<a href=\"http://work.weixin.qq.com\">查看详情</a>\n";
    	$data       = [
    			"touser" => "DianSing|mrli",
    			"toparty" => "@all",
    			"totag" => "@all",
    			"msgtype" => "text",
    			"agentid" => $agentid,
    			"text" => ["content" => $content],
    			"safe"=>"0"
    	];
    	$result		= $wechat->sendMessage($data);
    	echo "<pre>";
    	var_dump($result);
    	echo "</pre>";
    }

}
