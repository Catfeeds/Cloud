<?php
namespace Admin\Model;
use Think\Model;

class StatisModel extends Model{

  public function __construct(){

  }

/**
 * 统计其他剩余菜品的数量总和
 */
  public function getExtraDishNumber(){
    // dump($_SESSION);die;
    $prefix = C('DB_PREFIX');
    $overline = "SELECT SUM(s.num) AS nums, o.org_id, o.h_id, s.*, m.menu_name FROM {$prefix}order o INNER JOIN {$prefix}order_sub s ON s.oid = o.id INNER JOIN {$prefix}cook_menu m ON m.id=s.menu_id WHERE o.org_id = {$_SESSION["org_id"]} Group by menu_id ORDER BY nums DESC";
    $overline = M("")->query($overline);
    $overline = count($overline);
    $sql = "SELECT SUM(nums) nums FROM(SELECT SUM(s.num) AS nums, o.org_id, o.h_id, s.*, m.menu_name FROM {$prefix}order o INNER JOIN {$prefix}order_sub s ON s.oid = o.id INNER JOIN {$prefix}cook_menu m ON m.id=s.menu_id WHERE o.org_id = {$_SESSION["org_id"]} Group by menu_id ORDER BY nums DESC LIMIT 5,$overline) AS A";
    $ret = M("")->query($sql);
    return $ret;
  }

  /**
   * 获取最受欢迎的菜根据每个餐厅
   * $h_id
   * $num是返回的数目
   */
   public function getMostDish($num){
    // dump($_SESSION);die;
    $prefix = C('DB_PREFIX');
    $sql = "SELECT SUM(s.num) AS nums, o.org_id, o.h_id, s.*, m.menu_name FROM {$prefix}order o INNER JOIN {$prefix}order_sub s ON s.oid = o.id INNER JOIN {$prefix}cook_menu m ON m.id=s.menu_id WHERE o.org_id = {$_SESSION["org_id"]} Group by menu_id ORDER BY nums DESC LIMIT {$num}";
    $ret = M("")->query($sql);
    // dump(M("")->getLastSql());
    return $ret;
  }
  /**
   * 最不受欢迎的菜
   */
  public function getLastDish($num){
    $prefix = C('DB_PREFIX');
    $sql = "SELECT COUNT(s.id) AS nums, o.org_id, o.h_id, s.* ,m.menu_name FROM {$prefix}order o INNER JOIN {$prefix}order_sub s ON s.oid = o.id INNER JOIN {$prefix}cook_menu m ON m.id=s.menu_id WHERE o.org_id = {$_SESSION["org_id"]} Group by menu_id ORDER BY nums ASC LIMIT {$num}";
    $ret = M("")->query($sql);
    // return array_slice($ret,0,$num);
    return $ret;
  }
  /**
   * 获取销量最好的分店
   */
  public function getMostHotel($num){
    $prefix = C('DB_PREFIX');
    $sql = "SELECT SUM(total_money) AS money, h.org_id,h.h_name FROM {$prefix}hotel h INNER JOIN {$prefix}order o ON o.h_id = h.id  WHERE h.org_id = {$_SESSION["org_id"]} GROUP BY o.h_id ORDER BY money DESC LIMIT {$num}";
    // dump($sql);die;
    $ret = M("")->query($sql);
    return $ret;
  }
  /**
   * 获取销量最差的分店
   */
  public function getLastHotel($org,$num){
    $prefix = C('DB_PREFIX');
    $sql = "SELECT SUM(total_money) AS money, h.org_id,h.h_name FROM {$prefix}hotel h INNER JOIN {$prefix}order o ON o.h_id = h.id  WHERE h.org_id = {$_SESSION["org_id"]} GROUP BY o.h_id ORDER BY money ASC LIMIT {$num}";
    // dump($sql);
    $ret = M("")->query($sql);
    return $ret;
  }
  /**
   * 根据组织机构获取每月的统计信息
   */
  public function getTotalByMonthByOrg($year){  //默认年份为当前年份
    if($year == "")
    $year = date("Y",time());
    $prefix = C('DB_PREFIX');
    $January = $year.'01';
    $February = $year.'02';
    $March = $year.'03';
    $April = $year.'04';
    $May = $year.'05';
    $June = $year.'06';
    $July = $year.'07';
    $August = $year.'08';
    $September = $year.'09';
    $October = $year.'10';
    $November = $year.'11';
    $December = $year.'12';



    $sql =
    "SELECT IFNULL(h_name,'合计') AS h_name,
      SUM(IF(year='{$January}',count,0)) AS month01,
      SUM(IF(year='{$February}',count,0)) AS month02,
      SUM(IF(year='{$March}',count,0)) AS month03,
      SUM(IF(year='{$April}',count,0)) AS month04,
      SUM(IF(year='{$May}',count,0)) AS month05,
      SUM(IF(year='{$June}',count,0)) AS month06,
      SUM(IF(year='{$July}',count,0)) AS month07,
      SUM(IF(year='{$August}',count,0)) AS month08,
      SUM(IF(year='{$September}',count,0)) AS month09,
      SUM(IF(year='{$October}',count,0)) AS month10,
      SUM(IF(year='{November}',count,0)) AS month11,
      SUM(IF(year='{$December}',count,0)) AS month12,
      SUM(IF(year='total',count,0)) AS total
      FROM(
          SELECT h_name,IFNULL(year,'total') AS year,SUM(count) AS count
          FROM(
            SELECT h_name,FROM_UNIXTIME(order_time,'%Y%m')as year,SUM(o.total_money) count
            FROM {$prefix}order o
            JOIN {$prefix}hotel h ON h.id = o.h_id
            WHERE FROM_UNIXTIME(order_time,'%Y') = $year
            GROUP BY h_name,year
            ) AS A
          GROUP BY h_name,year
          WITH ROLLUP
          HAVING h_name IS NOT NULL
            )AS B
      GROUP BY h_name
      WITH ROLLUP";

    $ret = M("")->query($sql);
    return $ret;
  }
  /**
   * 根据每个分店统计信息
   */
  public function getTotalByMonthByHotel($h_id,$day,$month){  //按照查询条件分别返回数值
    $prefix = C('DB_PREFIX');
    if($day == "")
    {
      $day = date("Ymd",time());
    }

    $condition = "FROM_UNIXTIME(o.order_time,'%Y%m%d') = $day";
    if($month != "")
    {
      $condition = "FROM_UNIXTIME(o.order_time,'%Y%m') = $month";
    }
    // dump($condition);die;
    $sql =
    "SELECT cm.menu_name,cm.price price,IFNULL(temp.num,'0') num,price*num total FROM(
      SELECT cm.id,menu_name,SUM(num) num
      FROM {$prefix}cook_menu cm
      LEFT JOIN {$prefix}order_sub os ON cm.id = os.menu_id
      LEFT JOIN {$prefix}order o ON o.id = os.oid
      WHERE o.h_id = $h_id AND ".$condition."
      GROUP BY menu_name) AS temp
      RIGHT JOIN {$prefix}cook_menu cm ON cm.id = temp.id
      WHERE cm.org_id = {$_SESSION["org_id"]}
      ORDER BY num DESC";
    $ret = M("")->query($sql);
    // dump($condition);die;
    // dump($ret);die();
    return $ret;
  }

  /**
   * 右侧获取分店总计销售详情
   */
  public function getDetailByHotel($h_id,$day,$month){  
    $prefix = C('DB_PREFIX');

    if($day == "")
    {
      $day = date("Ymd",time());
    }

    $condition = "FROM_UNIXTIME(o.order_time,'%Y%m%d') = $day";
    if($month != "")
    {
      $condition = "FROM_UNIXTIME(o.order_time,'%Y%m') = $month";
    }
        // dump($condition);die;

    $sql =
    "
      SELECT cm.menu_name, cm.price price, IFNULL(temp.num,'0') num, IFNULL(price*num,'0') total 
      FROM( 
            SELECT cm.id,cm.menu_name,SUM(num) num
            FROM {$prefix}cook_menu cm
            LEFT JOIN {$prefix}order_sub os ON cm.id = os.menu_id
            LEFT JOIN {$prefix}order o ON o.id = os.oid
            WHERE o.h_id = $h_id 
            GROUP BY menu_name
          ) AS temp

      RIGHT JOIN {$prefix}cook_menu cm ON cm.id = temp.id

      WHERE cm.org_id = {$_SESSION["org_id"]}

      ORDER BY total DESC
    ";
    $ret = M("")->query($sql);
    // dump($ret);die();
    return $ret;
  }


  /**
   * 分店每个月的菜品销售情况
   */
  public function getNumByMonthByOrg($year){  //默认年份为当前年份
    if($year == "")
    $year = date("Y",time());
    $prefix = C('DB_PREFIX');
    $January = $year.'01';
    $February = $year.'02';
    $March = $year.'03';
    $April = $year.'04';
    $May = $year.'05';
    $June = $year.'06';
    $July = $year.'07';
    $August = $year.'08';
    $September = $year.'09';
    $October = $year.'10';
    $November = $year.'11';
    $December = $year.'12';
    // dump($January);die;

    $sql =
    "SELECT IFNULL(menu_name,'合计') AS menu_name, amount,
      SUM(IF(year='{$January}',count,0)) AS month01,
      SUM(IF(year='{$February}',count,0)) AS month02,
      SUM(IF(year='{$March}',count,0)) AS month03,
      SUM(IF(year='{$April}',count,0)) AS month04,
      SUM(IF(year='{$May}',count,0)) AS month05,
      SUM(IF(year='{$June}',count,0)) AS month06,
      SUM(IF(year='{$July}',count,0)) AS month07,
      SUM(IF(year='{$August}',count,0)) AS month08,
      SUM(IF(year='{$September}',count,0)) AS month09,
      SUM(IF(year='{$October}',count,0)) AS month10,
      SUM(IF(year='{November}',count,0)) AS month11,
      SUM(IF(year='{$December}',count,0)) AS month12,
      SUM(IF(year='total',count,0)) AS total,
      SUM(IF(year='total',count*amount,0)) AS sum
      FROM(
          SELECT menu_name,IFNULL(year,'total') AS year,SUM(count) AS count,  amount
          FROM(
          SELECT cm.menu_name, FROM_UNIXTIME(order_time,'%Y%m')as year, SUM(os.num) count, 
              os.price amount
              FROM cloud_order o
               JOIN cloud_order_sub os on oid = o.id
               JOIN cloud_cook_menu cm on cm.id = os.menu_id
               WHERE FROM_UNIXTIME(order_time,'%Y') = $year
               GROUP BY year, menu_name)AS A
              GROUP BY menu_name,year
          WITH ROLLUP
          HAVING menu_name IS NOT NULL
            )AS B
      GROUP BY menu_name
      WITH ROLLUP";

    $ret = M("")->query($sql);
    // dump($ret);die;
    return $ret;
  }


/**
   * 单独处理每月的销售额
   */
  public function getSaleByMonthByOrg($year){  //默认年份为当前年份
    if($year == "")
    $year = date("Y",time());
    $prefix = C('DB_PREFIX');
    $January = $year.'01';
    $February = $year.'02';
    $March = $year.'03';
    $April = $year.'04';
    $May = $year.'05';
    $June = $year.'06';
    $July = $year.'07';
    $August = $year.'08';
    $September = $year.'09';
    $October = $year.'10';
    $November = $year.'11';
    $December = $year.'12';
    // dump($January);die;

    $sql =
    "SELECT IFNULL(menu_name,'合计') AS menu_name, amount,
      SUM(IF(year='{$January}',count,0)) AS month1,
      SUM(IF(year='{$February}',count,0)) AS month2,
      SUM(IF(year='{$March}',count,0)) AS month3,
      SUM(IF(year='{$April}',count,0)) AS month4,
      SUM(IF(year='{$May}',count,0)) AS month5,
      SUM(IF(year='{$June}',count,0)) AS month6,
      SUM(IF(year='{$July}',count,0)) AS month7,
      SUM(IF(year='{$August}',count,0)) AS month8,
      SUM(IF(year='{$September}',count,0)) AS month9,
      SUM(IF(year='{$October}',count,0)) AS month10,
      SUM(IF(year='{November}',count,0)) AS month11,
      SUM(IF(year='{$December}',count,0)) AS month12,
      SUM(IF(year='total',count,0)) AS total,
      SUM(IF(year='total',count*amount,0)) AS sum
      FROM(
          SELECT menu_name,IFNULL(year,'total') AS year,SUM(count) AS count,  amount
          FROM(
          SELECT cm.menu_name, FROM_UNIXTIME(order_time,'%Y%m')as year, SUM(os.num) count, 
              os.price amount
              FROM cloud_order o
               JOIN cloud_order_sub os on oid = o.id
               JOIN cloud_cook_menu cm on cm.id = os.menu_id
               WHERE FROM_UNIXTIME(order_time,'%Y') = $year
               GROUP BY year, menu_name)AS A
              GROUP BY menu_name,year
          WITH ROLLUP
          HAVING menu_name IS NOT NULL
            )AS B
      GROUP BY menu_name
      WITH ROLLUP";

    $ret = M("")->query($sql);
    $fine = array();

    for($i=1;$i<13;$i++){
    
      for($j=0,$fine[$i]=0;$j<30;$j++){
        $fine[month.$i] = ((int)$ret[$j][month.$i])*((int)$ret[$j][amount]) + $fine[month.$i];

      }

    }
    return $fine;
  }



  /**
   * 柱状图，显示前五菜品数量和销售额
   */
  public function FirstFive($year){  //默认年份为当前年份
  
    if($year == "")
    $year = date("Y",time());
    //$year='2017';
    $prefix = C('DB_PREFIX');
    $January = $year.'01';
    $February = $year.'02';
    $March = $year.'03';
    $April = $year.'04';
    $May = $year.'05';
    $June = $year.'06';
    $July = $year.'07';
    $August = $year.'08';
    $September = $year.'09';
    $October = $year.'10';
    $November = $year.'11';
    $December = $year.'12';
    // dump($January);die;

    $sql =
    "SELECT IFNULL(menu_name,'合计') AS menu_name, amount,
      SUM(IF(year='{$January}',count,0)) AS month01,
      SUM(IF(year='{$February}',count,0)) AS month02,
      SUM(IF(year='{$March}',count,0)) AS month03,
      SUM(IF(year='{$April}',count,0)) AS month04,
      SUM(IF(year='{$May}',count,0)) AS month05,
      SUM(IF(year='{$June}',count,0)) AS month06,
      SUM(IF(year='{$July}',count,0)) AS month07,
      SUM(IF(year='{$August}',count,0)) AS month08,
      SUM(IF(year='{$September}',count,0)) AS month09,
      SUM(IF(year='{$October}',count,0)) AS month10,
      SUM(IF(year='{November}',count,0)) AS month11,
      SUM(IF(year='{$December}',count,0)) AS month12,
      SUM(IF(year='total',count,0)) AS total,
      SUM(IF(year='total',count*amount,0)) AS sum
      FROM(
          SELECT menu_name,IFNULL(year,'total') AS year,SUM(count) AS count,  amount
          FROM(
          SELECT cm.menu_name, FROM_UNIXTIME(order_time,'%Y%m')as year, SUM(os.num) count, 
              os.price amount
              FROM cloud_order o
               JOIN cloud_order_sub os on oid = o.id
               JOIN cloud_cook_menu cm on cm.id = os.menu_id
               WHERE FROM_UNIXTIME(order_time,'%Y') = $year
               GROUP BY year, menu_name)AS A
              GROUP BY menu_name,year
          WITH ROLLUP
          HAVING menu_name IS NOT NULL
            )AS B
      GROUP BY menu_name
      ORDER BY total DESC";

    $ret = M("")->query($sql);
    // dump($ret);die;
    return $ret;
  }


}
