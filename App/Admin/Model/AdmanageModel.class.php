<?php 
namespace Admin\Model;
use Think\Model;

class AdmanageModel extends Model{

   public function __construct(){

    }
	// 更新org表的连锁机构广告版本信息
	public function upOrgAdVersion($adnum)
	{
		$map["id"]=0;
		$version=time();
		$data["org_ad_version"]=$version;
		$adversion["adverify_time"]=$version;
		$ad_version["id_ad_version"]=$version;
		$condition["adnum"]=$adnum;
		if(M("org")->where($map)->save($data)&&M("ads")->where($condition)->save($adversion))
		{
			$ad_hotel=M("ads")->where($condition)->field("ad_hotel")->find();
			$hotel_id=explode(",", $ad_hotel["ad_hotel"]);
			if(is_array($hotel_id))
			{
				foreach ($hotel_id as $key => $value) {
				# code...
				$con["id"]=$value;
				M('hotel')->where($con)->save($ad_version);
				}
				return 1;
			}
			else return 2;	

		}
		else return 0;
	}
	public function visitSmart()
	{
		$url="http://127.0.0.1/SmartOrder/SynData/Update/updateAd";
		$curl=curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_exec($curl);
	}




}