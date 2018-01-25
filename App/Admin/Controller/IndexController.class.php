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

class IndexController extends ComController
{
    public function index()
    {
      $extra = D('Statis')->getExtraDishNumber();
      // $hotelDaily = D('Statis')->getTotalByMonthByHotel(13);
      $orgInfo = D('Statis')->getTotalByMonthByOrg();
      $mostDish = D('Statis')->getMostDish(100);
      $mostHotal = D('Statis')->getMostHotel(1);
      $lastDish = D('Statis')->getLastDish(1);
      $lastHotal = D('Statis')->getLastHotel(2, 1);
      $hotelList = D('Org')->getHotleByOrgId($_SESSION["org_id"]);
      
      // $this->assign('hotelDaily',$hotelDaily);
      $this->assign('lastDish', $lastDish);
      $this->assign('mostHotal', $mostHotal);
      
      $this->assign('orgInfo', $orgInfo);
      $this->assign('mostDish', $mostDish);
      $this->assign('lastHotal', $lastHotal);
      $this->assign('extra', $extra);
      $this->assign('hotelList', $hotelList);
      // dump($hotelList);die;
      // dump($extra);die;

      // dump($mostDish);die;

      // $extraNum = 0;
      // foreach ($extra as $v) {
      //   $extraNum = $extraNum + $v[][nums];
      // }
      // dump($extraNum);die;

      //$this->display("Index/Org/index");
      // $this->display("Index/Hotel/index");
        $role = D("Org")->user_role();
        // dump($role);
        // dump($ans);
        switch ($role) {
          case '1':
            // $data = self::getAdminData();
            $this->assign("data",$data);
            $this->display("admin");
            break;
          case '2':
            // $data = self::getOrgData();
            $this->assign("data",$data);
            $this->redirect('Admanage/myadlist');
            //$this->display("Admanage/myadlist");
            break;
          case '3':
            // $data = self::getOrgData();
            $this->assign("data",$data);
            $this->display("Index/Org/index");
            break;
          default:
            // $data = self::getHotelData();
            $this->assign("data",$data);
            $this->display("Index/Hotel/index");
            break;
        }
        die;

        $this->display();
    }

    public function getAdminData(){
      $model = new \Think\Model();
      $mysql = $model->query("select VERSION() as mysql");
      $p = isset($_GET['p']) ? intval($_GET['p']) : '1';
      $t = time() - 3600 * 24 * 60;
      $log = M('log');
      $log->where("t < $t")->delete();//删除60天前的日志
      $pagesize = 25;#每页数量
      $offset = $pagesize * ($p - 1);//计算记录偏移量
      $count = $log->count();
      $list = $log->order('id desc')->limit($offset . ',' . $pagesize)->select();
      $page = new \Think\Page($count, $pagesize);
      $page = $page->show();
      $this->assign('list', $list);
      $this->assign('page', $page);
      $this->assign('mysql', $mysql[0]['mysql']);
      $this->assign('nav', array('', '', ''));//导航
    }

  /**
   * 分店近一年销售情况
   */
  public function displayHotel(){
    $h_id = $_GET['h_id'];
    $year = date("Y",time());
    $nextYear = $year+1;
    $startTime = strtotime("1 January $year");
    $endTime = strtotime("1 January $nextYear");
    // $hotelDaily = D('Statis')->getTotalByMonthByHotel($h_id,13,06);
    $detail = D('Statis')->getDetailByHotel($h_id,$startTime,$endTime);

    // dump($leo);die;
    $h_name = M('hotel')->field("h_name")->where("id = $h_id")->find();
    $h_name = $h_name['h_name'];


    //$FirstFive = D('Statis')->FirstFive();
    //$this->assign('FirstFive', $FirstFive);
     //dump($FirstFive);die;
    

    $this->assign('detail', $detail);
    // dump($detail);die();

    $this->assign('h_name',$h_name);
    $this->assign('h_id',$h_id);
    $this->assign('hotelDaily',$hotelDaily);
    // dump($hotelDaily);die();
    $this->display("Index/Hotel/index");
  }

    /**
   * 分店销售情况查询
   */
  public function searchHotel(){
    $h_id = $_POST['h_id'];
    $k=I('k');
    //dump($k);die;
    $find = I('find');
    //dump($find);die;
    $times = $_POST['times'];
    $timee = $_POST['timee'];

    switch ($find) {
      case 'a':
        $startTime = time()-86400*7;
        $endTime = time();
        break;

      case 'b':
        $startTime = time()-86400*30;
        $endTime = time();
        break;

      case 'c':
        $startTime = time()-86400*90;
        $endTime = time();
        break;

      case 'd':
        $startTime = time()-86400*180;
        $endTime = time();
        break;

      case 'e':
        $startTime = strtotime($times);
        $endTime = strtotime($timee);
        break;

      default:
        $year = date("Y",time());
        $nextYear = $year+1;
        $startTime = strtotime("1 January $year");
        $endTime = strtotime("1 January $nextYear");
        break;
    }
    if(!$startTime&&!$endTime&&!$find) $this->ajaxReturn('请输入日期');
    //dump($startTime);die;
    // $hotelDaily = D('Statis')->getTotalByMonthByHotel($h_id,13,06);

    switch ($k) {
      case 'a':
        $detail = D('Statis')->searchDetailByNumDE($h_id,$startTime,$endTime);
        break;

      case 'b':
        $detail = D('Statis')->searchDetailByNumA($h_id,$startTime,$endTime);
        break;

      case 'c':
        $detail = D('Statis')->searchDetailByTotalDE($h_id,$startTime,$endTime);
        break;

      case 'd':
        $detail = D('Statis')->searchDetailByTotalA($h_id,$startTime,$endTime);
        break;

      default:
        $detail = D('Statis')->searchDetailByNumDE($h_id,$startTime,$endTime);
        break;
    }
    //$detail = D('Statis')->searchDetailByHotel($h_id,$startTime,$endTime);
    $firstFive = D('Statis')->firstFiveByHotel($h_id,$startTime,$endTime);
   
    // dump($leo);die;
    // $h_name = M('hotel')->field("h_name")->where("id = $h_id")->find();
    // $h_name = $h_name['h_name'];


    //$FirstFive = D('Statis')->searchFirstFive($startTime,$endTime);

    $data=array();
    $data['detail']=$detail;
    $data['five']=$firstFive;
    
    //$this->assign('find',$find);
    $this->ajaxReturn($data);

  }

  /**
   * 销售走势动态图
   */
  public function displaySetbox(){
    $dishnumbymonth = D('Statis')->getNumByMonthByOrg();
    $this->assign('dishnumbymonth', $dishnumbymonth);
    // dump($NumByMonthByOrg);die;
    $this->display("Index/Hotel/setbox");
  }

  /**
   * 分店总体销售详情表
   */
  public function displayBox(){

    $dishnumbymonth = D('Statis')->getNumByMonthByOrg();
    $salebymonth = D('Statis')->getSaleByMonthByOrg();

    $this->assign('dishnumbymonth', $dishnumbymonth);
    $this->assign('salebymonth', $salebymonth);
    // dump($salebymonth);die;

    $this->display("Index/Hotel/box");
  }

  /**
   * 查询单个菜品某日销量
   */
  public function displaySingle(){

    $h_id = $_POST['h_id'];
    $menu_id = $_POST['menu_id'];
    $time = $_POST['time'];
    $startTime = strtotime($time);
    $endTime = $startTime+24*3600-1;


    $cookmenuByDay = D('Statis')->cookmenuByDay($h_id,$menu_id,$startTime,$endTime);

    $this->ajaxReturn($cookmenuByDay);
  }

}