<?php
/**
 *
 * 版权所有：北京工业大学<Pad点餐项目组>
 * 作    者：Mr.Xiao<xqnssa@qq.com>
 * 日    期：2016-01-19
 * 版    本：1.0.0
 * 功能说明：菜品挂历。
 *
 **/

namespace Admin\Controller;

class CookController extends ComController{
    public function _construct(){
      // $org_id = $_SESSION["org_id"];

    }
    //显示菜系主页
    public function index(){
      $org_id = $_SESSION["org_id"];
      $prefix = C('DB_PREFIX');
      $cook_style = D("Cook")->getStyleCountByOrgId($prefix,$org_id);
      //获取菜系类型以及此菜系有多少菜
      // $all = M("cook_style")->where(array("org_id"=>2))->select(); //原始版本
      $all = M("cook_style")->where(array("is_delete"=>0))->select();
      // if($all['0']['is_delete'] == 1 or $all['0']['id'] == null){
        // $all['0']['num'] = 0;
      // }
      
      // dump($all);
      // // dump($cook_style);die;
      // foreach ($cook_style as $k => $v) {
      //     if($v['id']==$all[$k]['id']){
      //         $all[$k]['style_name']=$v['style_name'];
      //         $all[$k]['num']=$v['num'];
      //         $all[$k]['org_id']=$v['org_id'];
      //     }
      //   }
      // dump($cook_style);die;


      if($cook_style == null){
        // $all['num'] = 0;
        $this->assign("vars", $all)->display();
      }
      else{
        $this->assign("vars",$cook_style)->display();
      }
      
    }
    public function add(){
      //如果不是POST提交表单，加载模板引擎。
      if (!IS_POST){
        $this->display();
      }
      //如果是POST提交表单，直接入库
      else{
        $data = I('post.');
        if(D("Cook")->add($data)) $this->success("添加成功~",'index');
        else $this->error("添加失败~",'add');
        // dump($data);
      }
    }
    public function edit($id){
      if(!IS_POST){
        $var = M("cook_style")->where("id=".$id)->find();
        $this->assign("var",$var)->display();
      }
      else{
        $data = I('post.');
        if(D("Cook")->save($data)) $this->success("修改成功~",'index');
        else $this->error("修改失败~",'add');
      }
    }
    /**
     * 删除菜系
     */
     public function delStyle(){
       $id = I("id");
       $num = M("cook_menu")->where('style_id='.$id)->count();
      //  dump($num);die;
       if($num!=0) $this->error("该菜系下的菜品不为空，请删除菜品后再次尝试~");
       else {
         D("Cook")->delStyle($id);
         $this->success("删除成功~");
       }
     }




//以下是菜谱逻辑

    /**
     * 菜谱列表
     */
     public function menuList(){
       $org_id = $_SESSION["org_id"];
       $prefix = C('DB_PREFIX');
       $menu = D("Cook")->getMenuByOrgId($prefix,$org_id);
       // dump($menu);die;
       $this->assign("vars",$menu)->display();
     }
     /**
      * 新增菜谱
      */
     public function addMenu(){
        if(!IS_POST) {
          $org_id = $_SESSION["org_id"];
          $prefix = C('DB_PREFIX');
          $cook_style = D("Cook")->getStyleByOrgId($prefix,$org_id);
          // dump($cook_style);die;
          $this->assign("vars",$cook_style)->display();
        }
        else{
          $data = I("post.");
          $data["edit_time"] = time();
          //验证并添加
          // dump($data);die;
          $data["org_id"] = $_SESSION["org_id"];
          $cook = D("Cook");
          // dump($cook->create($data));die;
          $check = $cook->create($data);
          if(!$check&&is_bool($check)){
            $error = $cook->getError();
            $this->error("添加失败，".$error."。");
          }
          else {
            $cook->addMenu($data);          //这里调用的是Model里的addMenu方法
            $this->success("添加成功~",'index');
          }
          // if(D("Cook")->addMenu($data)) $this->success("添加成功",'menuList');
          // else $this->error("添加失败",'addMenu');
        }
     }
     public function delMenu(){
       $id = I("id");
       // dump($id);die;
       if(D("Cook")->delMenu($id)) $this->success("删除成功~");
       else $this->error("删除失败~");
     }
     /**
      * 编辑菜品
      */
     public function editMenu(){
       if(!IS_POST){
         $id = I("id");
         $org_id = $_SESSION["org_id"];
         $prefix = C('DB_PREFIX');
         $cook_style = D("Cook")->getStyleByOrgId($prefix,$org_id);
         $menu = M("cook_menu")->where("id=".$id)->find();
         $cook_style_def = M("cook_style")->where("id =".$menu['style_id'])->find();
         // $cook_style['def'] = $cook_style_def['id'];

         // dump($menu);
         // dump($cook_style);die;
         // dump($cook_style_def);die();

         $this->assign("cook_style_def",$cook_style_def);
         $this->assign("var",$menu);
         $this->assign("vars",$cook_style)->display();
       }
       else {
         $data = I("post.");
         // dump($data);die();
         if($data["picture_o"]!=""&&$data["picture"]=="") {
           $data["picture"] = $data["picture_o"];
         }
         if(isset($data["picture_o"])) unset($data["picture_o"]);
         if(D("Cook")->saveMenu($data)) $this->success("修改成功~","menuList");
         else $this->error("修改失败~","menuList");
       }

     }


}
