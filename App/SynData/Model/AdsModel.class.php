<?php
namespace SynData\Model;
use Think\Model;

class AdsModel extends Model{

    public function __construct(){

    }

    //根据key查找餐厅id
    public function getHotelIdBySynCode($syn_code)
    {
    	$condition["h_scode"]=$syn_code;
    	$ret=M("hotel")->where($condition)->find();
    	if(!empty($ret))
    	{
    		return $ret["id"];
    	}
    	else return 0;

    }


    //判断版本号，循环查找审核通过的广告是否包含该餐厅

    public function isDataSyn($id,$version)
    {
    	$condition["id"]=$id;
    	$ret=M("hotel")->where($condition)->find();
    	if($ret["id_ad_version"]==$version)  return 0;
    	else return $ret["id_ad_version"];
    }

    //获取广告信息
    public function getAdsData($id,$version,$is_up,$db_prefix)
    {
    	$oldversion=$version;
        $curversion=$is_up;
        $data=array();
        $i=0;
        $sql="SELECT * FROM {$db_prefix}ads where adverify_time > {$oldversion} AND adverify_time<= {$curversion} AND adverify=1 AND is_delete=0 ORDER BY adnum DESC";
        $adsinfo=M("")->query($sql);
        foreach ($adsinfo as $key => $value) {
            # code...
            $temp=explode(",",$value["ad_hotel"]);
            foreach ($temp as $v => $item) {
                # code...
                if($id==$item)
                {
                    $data[$i]=$adsinfo[$key];
                    $i++;
                }
            }
        }
        return $data;


    }
}