<?php
namespace Admin\Model;
use Think\Model;

class CookModel extends Model{
    public function __construct(){

    }

    protected $_validate = array(
       array('picture','require','图片必须上传！'),
       array('menu_name','require','菜品名称必须填写！'),
       array('price','require','单价必须填写！'),
       array('standard','require','规格必须填写！'),
     );
    public function getStyleByOrgId($prefix,$org_id){
      $cond["org_id"] = $org_id;
      $cond["is_delete"] = 0;
      if($org_id!=0) $cook_style = M("cook_style")->where($cond)->order('edit_time desc')->select();
      return $cook_style;
    }
    /**
     * 根据org_id获取cook_style
     */
    public function getStyleCountByOrgId($prefix,$org_id){
        // if($org_id!=0) $cook_style = M("cook_style")->where('org_id='.$org_id)->order('edit_time desc')->select();
        // return $cook_style;
        if($org_id!=0) $sql = "SELECT s.style_name, s.org_id,s.id, COUNT(m.id) AS num FROM {$prefix}cook_style s LEFT JOIN {$prefix}cook_menu m ON s.id=m.style_id WHERE s.org_id = {$org_id} AND m.is_delete = 0  group  BY s.id,s.org_id ORDER BY num DESC";
        //dump($sql);
        return M("")->query($sql);
        
    }
    /**
     * 新增菜系
     */
    public function add($data){
        $org_id = $_SESSION["org_id"];
        $data["org_id"] = $org_id;
        $tt = time();
        $data["edit_time"] = $tt;
        $this->upOrgVersion($tt,$_SESSION["org_id"]);
        $ret = M("cook_style")->add($data);
        visitServer($url);
        return $ret;
    }
    /**
     * 修改菜系
    */
    public function save($data){
      $id = $data["id"];
      unset($data["id"]);
      $data["edit_time"] = time();
      // dump($data);die;
      $this->upOrgVersion($data["edit_time"],$_SESSION["org_id"]);
      if(M("cook_style")->where('id='.$id)->save($data)) {
        visitServer($url);
        return 1;
      }
      else return 0;
    }
     /**
      * 删除菜系
      */
      public function delStyle($id){
        $data["is_delete"] = 1;
        $data["edit_time"] = time();
        if(M("cook_style")->where("id=".$id)->save($data)) {
          $this->upOrgVersion($data["edit_time"],$_SESSION["org_id"]);
          visitServer($url);        //删除菜系，月姐加的 
          return 1;
        }
        else return 0;
      }





     /**
      * 根据org_id获取cook_menu
      */
     public function getMenuByOrgId($prefix,$org_id){
       if($org_id!=0) $sql = "SELECT m.*, s.style_name FROM {$prefix}cook_menu m
       LEFT JOIN {$prefix}cook_style s ON s.id=m.style_id
       WHERE m.org_id=".$org_id." AND m.is_delete = 0 order by edit_time desc" ;
       // dump($sql);die;
       return M("")->query($sql);
     }
     /**
      * 添加菜品
      */
      public function addMenu($data){
        $this->upOrgVersion($data["edit_time"],$_SESSION["org_id"]);
        $ret = M("cook_menu")->add($data);            //真正的存库操作在这里。ret里存储的是这里菜单信息的id号
        visitServer($url);                            //同步方法，将数据同步到smartorder
        return $ret;
      }
      /**
       * 删除菜品
       */
       public function delMenu($id){
         $data["is_delete"] = 1;
         $cond["id"] = $id;
         $data["edit_time"] = time();
         $this->upOrgVersion($data["edit_time"],$_SESSION["org_id"]);
         $ret = M("cook_menu")->where($cond)->save($data);
         visitServer($url);                 //删除同步数据，月姐加的
         return $ret;
       }
       /**
        * 更新菜品
        */
       public function saveMenu($data){
         $id = $data["id"];
         //  dump($data);die;
         $data["edit_time"] = time();
         unset($data["id"]);
         $this->upOrgVersion($data["edit_time"],$_SESSION["org_id"]);
         $ret = M("cook_menu")->where("id=".$id)->save($data);
         visitServer($url);
         return $ret;
       }

      /**
       * 更新org表的连锁机构菜谱版本信息
       */
       public function upOrgVersion($version,$org_id){
         $cond["id"] = $org_id;
         $data["org_menu_version"] = $version;          //org的菜单版本
         if(M("org")->where($cond)->save($data)) return 1;
         else return 0;
       }



}
