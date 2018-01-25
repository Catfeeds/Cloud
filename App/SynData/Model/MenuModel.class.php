<?php
namespace SynData\Model;
use Think\Model;

class MenuModel extends Model{

    public function __construct(){

    }

    /**
     * 根据syncode获取orgid
     */
    public function getOrgIdBySynCode($syn_code){
      $cond["h_scode"] = $syn_code;
      $ret = M("hotel")->where($cond)->find();
      if(!empty($ret)){
        
        return $ret["org_id"];
      }
      else return 0;
    }
    /**
     * 判断是否有更新的数据。
     * 仅需要对比org表中org_menu_version的大小就可以了。
     */
    public function isDataSyn($org_id,$version){
      $cond["id"] = $org_id;
      $ret = M("org")->where($cond)->find();
      if($ret["org_menu_version"]==$version) return 0;
      else return $ret["org_menu_version"];
    }

    /**
     * 返回更新数据
     */
     public function getSynData($org_id,$version,$sys_version,$db_prefix){
       $data = array();
       $sql_style = "SELECT * FROM {$db_prefix}cook_style where edit_time > {$version} AND edit_time<= {$sys_version} AND org_id = {$org_id} ORDER BY edit_time DESC";//加了AND is_delete = 0
       $data["cook_style"] = M("")->query($sql_style);
       $sql_menu = "SELECT * FROM {$db_prefix}cook_menu where edit_time > {$version} AND edit_time<= {$sys_version} AND org_id = {$org_id} ORDER BY edit_time DESC";//加了AND is_delete = 0
       $data["cook_menu"] = M("")->query($sql_menu);
       return $data;
     }
     /**
      * 更新Hotel表菜谱的版本信息
      */
      public function updatHotelMenuVersion($key,$last_version){
        $cond["h_scode"] = $key;
        $data["last_version"] = $last_version;
        M("hotel")->where($cond)->save($data);
      }

}
