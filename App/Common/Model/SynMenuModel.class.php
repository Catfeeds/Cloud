<?php
namespace Common\Model;
use Think\Model;

class SynModelModel extends Model{

    public function __construct(){

    }

    public function getSynData($syn_code,$version){
      return M("cook_style")->select();


    }

}
