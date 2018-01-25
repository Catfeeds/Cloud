<?php
namespace SynData\Model;
use Think\Model;

class OrderModel extends Model{

    public function __construct(){

    }

    /**
     * 根据syncode获取orgid
     */
    public function getOrgIdBySynKey($syn_code){
      $cond["h_scode"] = $syn_code;
      $ret = M("hotel")->where($cond)->find();
      if(!empty($ret)){
        return $ret["org_id"];
      }
      else return 0;
    }
    /**
     * 根据syncode获取h_id
     */
    public function getHIdBySynKey($syn_code){
      $cond["h_scode"] = $syn_code;
      $ret = M("hotel")->where($cond)->find();
      if(!empty($ret)){
        return $ret["id"];
      }
      else return 0;
    }
    /**
     * 同步数据插入Order表
     */
    public function InsertOrder($org_id){

    }

}
