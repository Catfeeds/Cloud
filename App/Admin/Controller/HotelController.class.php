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

namespace Admin\Controller;

class HotelController extends ComController
{
    public function index()
    {
      $prefix = C('DB_PREFIX');
      $org_id = $_SESSION["org_id"];
      $list = D("Hotel")->hotelList($prefix,$org_id);
      // dump($list);die;
      $this->assign("list",$list);
      $this->display();
    }
    public function addHotel(){
      if(IS_POST){
        // dump($_POST);
        $hotel = D("hotel");
        $data = I("post.");
        if(!$hotel->create($data)){
          $error = $hotel->getError();
          $this->error("添加失败，".$error,"addHotel");
        }
        else{
          $data["h_scode"]=createRandomStr(32);
          // dump($data);die;
          $hotel->addHotel($data);
          $this->success("添加成功~",'index');
        }
      }else {
        $this->display("add");
      }
    }
    public function editHotel(){
      if(IS_POST){
        $data = I("post.");
        $hotel = D("hotel");
        if($hotel->updateHotel($data)) $this->success("修改成功","index");
        else $this->error("修改失败","index");
      }
      else{
        $id = I("id");
        $val = M("hotel")->where("id=".$id)->find();
        $this->assign("val",$val);
        $this->display("edit");
      }
    }

    /**
     * 删除Hotel
     */
     Public function delHotel($id){
       if(D("hotel")->delHotel($id)) $this->success("删除成功！~",U('index'));
       else $this->error("删除失败！~",U('index'));
     }
}
