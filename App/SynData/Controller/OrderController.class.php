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
use Think\Log;

class OrderController extends Controller
{
    public function index()
    {
      $con["id"] = 1999;
      $data["name"] = "hhh";
      $ret = M("log")->where($con)->save($data);
      dump($ret);
    }
    /**
     * 检查餐厅服务端的菜谱更新的核心函数
     * 1.获取餐厅的org_id,h_id
     * 2.插入订单信息到cloud_order表
     * 3.解析同步信息中order
     * 4.返回给请求者
     * 状态代码：0->code错误；；1->有更新内容；；2->没有更新；；
     */
    public function synOrder($syn_key,$syn_order=array()){
      // Log::Write("syn_key:####:{$syn_key}$$$$$$$");
      // $str = serialize($syn_order);
      $syn_order = unserialize($syn_order);
      // Log::Write("syn_order:####:{$str}");
      // 1. 获取餐厅的org_id,h_id
      $ord = D("Order");
      $org_id = $ord->getOrgIdBySynKey($syn_key);
      $h_id = $ord->getHIdBySynKey($syn_key);
      // Log::Write("我是org_id{$org_id}:我是h_id:{$h_id}");
      // Log::Write("&&&&&&&&&&&:".count($syn_order));
      foreach ($syn_order as $id => $order) {
        //Log::Write("%%%%%%%%%%%%%{$id}");
        $data = array();
        $data["org_id"] = $org_id;
        $data["h_id"] = $h_id;
        $data["order_time"] = $order["order_time"];
        $data["syn_time"] = time();
        $data["pay_time"] = $order["pay_time"];
        $data["pay_type"] = $order["pay_type"];
        $data["total_money"] = $order["total_money"];
        $data["real_money"] = $order["real_money"];
        $data["pay_type"] = $order["pay_type"];
        $data["evaluate"] = $order["evaluate"];
        $oid = M("order")->add($data);
        $order_detail = object_array(json_decode($order["detail"]));
        // Log::Write("我是Oid：".$oid);
        foreach ($order_detail as $id=> $dish) {
          $sub_order = $dish;
          unset($sub_order["is_up"]);
          unset($sub_order["menuId"]);
          $sub_order["menu_id"] = $dish["c_id"];
          // $sub_order["menu_id"] = $dish["c_id"];
          $sub_order["oid"] = $oid;
          M("order_sub")->add($sub_order);
        }
      }
      $ret["status"] = 1;
      $this->ajaxReturn($ret);
  }
}
