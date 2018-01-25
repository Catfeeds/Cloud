<?php
/**
 *
 * 版权所有：北京工业大学<Pad点餐项目组>
 * 作    者：侯自强
 * 日    期：2018-1-09
 * 功能说明：同步广告方法
 *
 **/

namespace SynData\Controller;
use Think\Controller;

class AdsController extends Controller
{
	public function synAd()
	{
		$ret=array();
		$syn_code=I("key");
		$AdModel=D("Ads");
		//获取餐厅的id
		$id=$AdModel->getHotelIdBySynCode($syn_code);
		if($id==0)
		{
			$ret["status"]=0;   //即找不到数据
			$this->ajaxReturn($ret);
		}

		//判断是否有数据变化
		$version=I("version");
		$is_up=$AdModel->isDataSyn($id,$version);
		if(!$is_up)
		{
			$ret["status"]=2;
			$this->ajaxReturn($ret);
		}
		else
		{
			$prefix=C('DB_PREFIX');
			$ret["data"]=$AdModel->getAdsData($id,$version,$is_up,$prefix);
			$ret["status"]=1;
			$ret["curversion"]=$is_up;
			$this->ajaxReturn($ret);
		}
		
	}
}