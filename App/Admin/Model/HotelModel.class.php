<?php
namespace Admin\Model;
use Think\Model;

class HotelModel extends Model{

  protected $_validate = array(
     array('h_name','require','名称必须填写！'),
     array('h_code','require','加盟编号必须填写！'),
     array('h_add','require','地址必须填写！'),
   );

   /**
    * 添加酒店
    */
   public function addHotel($data){
     $data["org_id"] = $_SESSION["org_id"];
     $data["h_add_time"] = time();
    //  dump($data);die;
     return M("hotel")->add($data);
   }
   /**
    * 删除酒店
    */
   public function delHotel($id){
     return M("hotel")->delete($id);
   }
   /**
    * 更新酒店
    */
   public function updateHotel($data){
     $id = $data["id"];
     unset($data["id"]);
     $data["h_add_time"] = time();
     return M("hotel")->where("id=".$id)->save($data);
   }
   /**
    * 获取酒店列表
    */
    public function hotelList($prefix,$org_id){
      $condition = array("org_id"=>$org_id);
      $sql = "SELECT h.*,o.org_name FROM {$prefix}hotel h LEFT JOIN {$prefix}org o ON h.org_id=o.id where org_id=".$org_id." order by h.h_add_time DESC";
      return M("")->query($sql);
      return $ret;
    }


}
