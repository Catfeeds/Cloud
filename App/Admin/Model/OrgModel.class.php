<?php
namespace Admin\Model;
use Think\Model;

class OrgModel extends Model{

  protected $_validate = array(
     array('org_name','require','用户名必须！'), // 用户名必须
     array('org_name','','帐号名称已经存在！',1,'unique',1), // 验证用户名是否已经存在
     array('org_code','','组织机构代码已经存在',1,'unique',1), // 验证组织机构代码是否已经存在
     array('org_legal_person_code','','法人身份证号码已经存在',1,'unique',1), // 验证组织机构代码是否已经存在
     array('org_buss_code','','工商登记代码已经存在',1,'unique',1), // 验证工商登记代码是否已经存在
   );
   protected $rule = array(
      array('org_name','require','用户名必须！'), // 用户名必须
      array('org_name','','帐号名称已经存在！',1,'unique',2), // 验证用户名是否已经存在
      array('org_code','','组织机构代码已经存在',1,'unique',2), // 验证组织机构代码是否已经存在
      array('org_legal_person_code','','法人身份证号码已经存在',1,'unique',2), // 验证组织机构代码是否已经存在
      array('org_buss_code','','工商登记代码已经存在',1,'unique',2), // 验证工商登记代码是否已经存在
    );
   /**
    * 删除机构
    */
   public function delete($id){
     return M("org")->where('id='.$id)->delete();
   }
   /**
    * 更新修该内容
    * 这里没做更新时候的自动验证，请下级同学补充完成该功能。
    */
   public function save($data){
     $id = $data["id"];
     unset($data["id"]);
     $ret = M("org")->where('id='.$id)->save($data);
     return $ret;
   }

   /**
    * 判断登陆者角色
    * 返回1->超级管理员
    * 返回2->连锁机构角色
    * 返回3->餐厅角色
    */
    /*public function user_role(){
      // dump($_SESSION);
      $uid = $_SESSION["uid"];
      $user = M("member")->where("uid = ".$uid)->find();
      // dump($user);
      if($user["org_id"]==0) return 1;
      else if($user["org_id"]!=0&&$user["h_id"]==0) return 2;
      else return 3;
    }
    public function getHotleByOrgId($org_id){
      return M("hotel")->where("org_id=".$org_id)->select();

    }*/

    public function user_role(){
      // dump($_SESSION);
      $uid = $_SESSION["uid"];
      $user = M("auth_group_access")->where("uid = ".$uid)->find();
      $member = M("member")->where("uid = ".$uid)->find();
      // dump($user);
      if($user["group_id"]==1) return 1;
      else if($user["group_id"]==10) return 2;
      else if($user["group_id "]!=1&&$user["group_id"]!==10&&$member["h_id"]==0) return 3;
      else return 4;
    }
    public function getHotleByOrgId($org_id){
      return M("hotel")->where("org_id=".$org_id)->select();

    }







}
