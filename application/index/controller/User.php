<?php

namespace app\index\controller;

use think\Db;
use wxapp\WXBizDataCrypt;
use think\App;
use think\Controller;
use think\facade\Request;
use app\index\model\User as AppUser;
use think\Validate;
use app\index\model\Zzjg as Zzjg;


class User extends Controller
{
    //查找 www.vue3demo.com/index.php?s=/index/user/userSelect
    public function userSelect(){
        $name = @Request::post('name');
        if(empty(trim($name))){
            $res = Db::table('user')->select();
        }else{
            $res = Db::table('user')->where('name','like','%'.$name.'%')->select();
        }
        return ajax_success($res);
    }
    //新增
    public function userAdd(){
        $name = @Request::post('name');
        $state = @Request::post('state');
        $email = @Request::post('email');
        $phone = @Request::post('phone');
        $address = @Request::post('address');
        $data = [
            'name'=>$name,
            'state'=>$state,
            'email'=>$email,
            'phone'=>$phone,
            'address'=>$address,
        ];
        $res = Db::table('user')->insert($data);
        if($res){
            ajax_success($res);
        }else{
            ajax_fail('失败');
        }
    }
    //编辑
    public function userEdit(){
        $id = @Request::post('id');
        $name = @Request::post('name');
        $state = @Request::post('state');
        $email = @Request::post('email');
        $phone = @Request::post('phone');
        $address = @Request::post('address');
        $data = [
            'name'=>$name,
            'state'=>$state,
            'email'=>$email,
            'phone'=>$phone,
            'address'=>$address,
        ];
//        var_dump($data);exit;
        if(empty(trim($id))){
            ajax_fail('id不能未空');
        }
        $res = Db::table('user')->where('id',$id)->update($data);
        if($res){
            ajax_success($res);
        }else{
            ajax_fail('失败');
        }
    }
    //删除
    public function userDel(){
        $id = @Request::post('id');
        if(!is_array($id)){
            if(empty(trim($id))){
                ajax_fail('id不能未空');
            }
            $res = Db::table('user')->where('id',$id)->delete();
        }else{
            $res = Db::table('user')->where('id','in',$id)->delete();
        }
        if($res){
            ajax_success($res);
        }else{
            ajax_fail('失败');
        }
    }

}
