<?php
/**
 *
 * 版权所有：北京工业大学<Pad点餐项目组>
 * 作    者：Mr.Xiao<xqnssa@qq.com>
 * 日    期：2016-09-20
 * 版    本：1.0.0
 * 功能说明：文章控制器。
 * http://127.0.0.1/Cloud/index.php/Admin/Member/del/uid/5.html
 *
 **/

namespace Admin\Controller;

class OrgController extends ComController
{
    /**
     * Orglist
     */
    public function index(){
      $var = M("org")->where('is_delete = 0 And id!=0')->order('org_add_time desc')->select();
      $this->assign('var',$var);
      // dump($var);die;
      $this->display("index");
    }
    /**
     * 添加机构
     */
    public function add(){
      if(!IS_POST) $this->display("add");
      else {
        $data = I('post.');
        $data["org_add_time"] = time();
        // dump($data);die;
        $org = D("org");
        if(!$org->create()){
          $error = $org->getError();
          $this->error("添加失败，".$error."。");
        }
        else {
          $org->add();
          $this->success("添加成功~",'index');
        }
      }
    }
    /**
     * 修改机构
     */
    public function edit(){

      if (!IS_POST)  {
        $id = I("id");
        // dump($id);die;
        $var = M("org")->where('id='.$id)->find();
        $this->assign('var',$var)->display("edit");
      }
      else {
         //Update
         $data = I("post.");
        //  dump($data);die;
         if(D("org")->save($data)) $this->success("修改成功!",'index');
         else $this->error("修改失败！",'index');

      }
    }
    /**
     * 删除机构
     */
    public function delete(){
        $id = I("id");
        // dump($id);die;
        $org = D("org")->delete($id);
        if($org) $this->success("删除成功");
        else $this->error("删除失败");
    }


}
