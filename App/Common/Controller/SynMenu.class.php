<?php
/**
 *
 * 版权所有：北京工业大学<Pad点餐项目组>
 * 作    者：Mr.Xiao<xqnssa@qq.com>
 * 日    期：2015-09-17
 * 版    本：1.0.0
 * 功能说明：管理后台模块公共控制器，用于储存公共数据。
 *
 **/

namespace Common\Controller;

use Think\Controller;

class SynMenuController extends Controller
{
    public function SynMenu(){
      D("SynMenu")->getSynData();

    }
}
