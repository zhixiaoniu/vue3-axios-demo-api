<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
if(!function_exists('ajax_success')){
    function ajax_success($data=null,$msg=null,$status=null)
    {
        $obj=array();
        $obj["Success"]=true;
        $obj["data"]=$data;
        $obj["Message"]=$msg;
        $obj["status"]=$status;
        echo json_encode($obj);
        exit;
    }
}

if(!function_exists('ajax_fail')){
    function ajax_fail($msg=null,$status=null,$data=null)
    {
        $obj=array();
        $obj["data"]=$data;
        $obj["Success"]=false;
        $obj["Message"]=$msg;
        $obj["status"]=$status;
        echo json_encode($obj);
        exit;
    }
}




