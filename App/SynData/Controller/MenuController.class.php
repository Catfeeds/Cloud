<?php
/**
 *
 * 版权所有：北京工业大学<Pad点餐项目组>
 * 作    者：Mr.Xiao<xqnssa@qq.com>
 * 日    期：2016-09-20
 * 版    本：1.0.0
 * 功能说明：后台首页控制器。
 *
 **/

namespace SynData\Controller;
use Think\Controller;

class MenuController extends Controller
{
    public function index()
    {
//      $url = "http://219.218.160.71:61000/SmartOrder/SynData/Update/index";
	$url = "http://172.18.4.71/SmartOrder/SynData/Update/index";
      visitServer($url);
      $con["id"] = 1999;
      $data["name"] = "hhh";
      $ret = M("log")->where($con)->save($data);
      dump($ret);
    }
    /**
     * 检查餐厅服务端的菜谱更新的核心函数
     * 1.获取餐厅的org_id
     * 2.检查是否有更新
     * 3.获取更新数据
     * 4.返回给请求者
     * 5.更新hotel表的版本信息
     * 状态代码：0->code错误；；1->有更新内容；；2->没有更新；；
     */
    public function synMenu(){

      $ret=array();
      $syn_code = I("key");
      //1. 获取餐厅的org_id
      $org_id = D("Menu")->getOrgIdBySynCode($syn_code);
      //如果org_id无法获取，返回错误
      if(!$org_id) {
        $ret["status"] = 0;
        // dump($ret);
        $this->ajaxReturn($ret);
      }
      $version = I("version");
      //如果有更新is_up返回云端最新版本，如果没有更新返回0
      $is_up = D("Menu")->isDataSyn($org_id,$version);
      if(!$is_up) {
        $ret["status"] = 2;
        // dump($ret);
        // return $ret;
        $this->ajaxReturn($ret);
      }
      else{
        //获取更新内容并返回
        $prefix = C('DB_PREFIX');
        $ret = D("Menu")->getSynData($org_id,$version,$is_up,$prefix);
        $ret["status"] = 1;
        $ret["version"] = $is_up;
        //更新版本信息
        D("Menu")->updatHotelMenuVersion($key,$is_up);
        // dump($ret);
        // return $ret;
        $this->ajaxReturn($ret);
      }
    }

}
