<?php

namespace Odydo\Laravelaliscan;


use Green\Request\V20170112 as Green;

class Laravelaliscan 
{

    public $client = false;
    public $cc = '';

    public function __construct()
    {
        $this->getClient();
    }
    public function getClient(){
        if(!$this->client){
            include __DIR__ . '/../aliscan.php';
            $this->client = $client;
        }
        return $this->client;
    }

    /**
     * $task1 = array('dataId' =>  uniqid(),
     *       'content' => '你真棒哈哈哈哈'
     *   );
     */
    public function getTextScan ($task1){
        $client = $this->getClient();

        $request = new Green\TextScanRequest();
        $request->setMethod("POST");
        $request->setAcceptFormat("JSON");

        
        $request->setContent(json_encode(array("tasks" => array($task1),
        "scenes" => array("antispam"))));

        try {
            $response = $client->getAcsResponse($request);
           
            if (200 == $response->code) {
                $taskResults = $response->data;
                foreach ($taskResults as $taskResult) {
                    if (200 == $taskResult->code) {
                        $sceneResults = $taskResult->results;
                        foreach ($sceneResults as $sceneResult) {
                            $scene = $sceneResult->scene;
                            $suggestion = $sceneResult->suggestion;
                            //根据scene和suggetion做相关的处理
                            //do something
                            return [
                                'response'=>$response,
                                'scene'=>$scene,
                                'suggestion'=>$suggestion
                            ];
     
                        }
                    } else {
                        return "task process fail:" + $response->code;
                    }
                }
            } else {
                return "detect not success. code:" + $response->code;
            }
        } catch (Exception $e) {
            return $e;
        }
    }

}