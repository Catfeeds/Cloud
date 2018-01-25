<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title><?php echo ($current['title']); ?>-<?php echo (C("sitename")); ?></title>

    <meta name="keywords" content="<?php echo (C("keywords")); ?>" />
    <meta name="description" content="<?php echo (C("description")); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link rel="stylesheet" href="/cloud/Public/Admin/css/box.css" />
    <link rel="stylesheet" href="/cloud/Public/Admin/css/style.css" />
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="/cloud/Public/Admin/css/bootstrap.css" />
    <link rel="stylesheet" href="/cloud/Public/Admin/css/font-awesome.css" />
    <link rel="stylesheet" href="/cloud/Public/Admin/css/jquery-ui.css" />
    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="/cloud/Public/Admin/css/ace-fonts.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="/cloud/Public/Admin/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="icon" href="https://static.jianshukeji.com/highcharts/images/favicon.ico">

    <!--ads add and show styles-->
    <link rel="stylesheet" href="/cloud/Public/Admin/css/newLayout.css" />
    <link rel="stylesheet" href="/cloud/Public/Admin/css/newLayout1.css"/>
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/cloud/Public/Admin/css/ace-part2.css" class="ace-main-stylesheet"/>
    <![endif]-->

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/cloud/Public/Admin/css/ace-ie.css"/>

    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="/cloud/Public/Admin/js/ace-extra.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="/cloud/Public/Admin/js/html5shiv.js"></script>
    <script src="/cloud/Public/Admin/js/respond.js"></script>
    <![endif]-->
</head>


<body class="no-skin">

  <!-- #section:basics/navbar.layout -->
<div id="navbar" class="navbar navbar-default">
  <script type="text/javascript">
    try {
      ace.settings.check('navbar', 'fixed')
    } catch (e) {}
  </script>

  <div class="navbar-container" id="navbar-container">
    <!-- #section:basics/sidebar.mobile.toggle -->
    <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>

    <!-- /section:basics/sidebar.mobile.toggle -->
    <div class="navbar-header pull-left">
      <!-- #section:basics/navbar.layout.brand -->
      <a href="<?php echo U('index/index');?>" class="navbar-brand">
        <small>
                        <i class="fa fa-home"></i>
                        <?php echo (C("sitename")); ?>
                    </small>
      </a>

      <!-- /section:basics/navbar.layout.brand -->

      <!-- #section:basics/navbar.toggle -->

      <!-- /section:basics/navbar.toggle -->
    </div>

    <!-- #section:basics/navbar.dropdown -->
    <div class="navbar-buttons navbar-header pull-right" role="navigation">
      <ul class="nav ace-nav">
        <!-- #section:basics/navbar.user_menu -->
        <li class="red">
          <a href="<?php echo U('cache/clear');?>" title="清除缓存" target="_self">
            <i class="ace-icon fa glyphicon-trash"></i>
          </a>
        </li>
        <li class="red">
          <a href="/" title="前台首页" target="_blank">
            <i class="ace-icon fa fa-home"></i>
          </a>
        </li>
        <li class="light-blue">
          <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo" src="<?php if( $user["head"] == '' ): ?>/cloud/Public/Admin/avatars/avatar2.png
                            <?php else: ?>
                            <?php echo ($user["head"]); endif; ?>" alt="<?php echo ($user["user"]); ?>" />
                            <span class="user-info">
                                <small><?php echo ($user["role"]); ?></small>
                                <?php echo ($user["user"]); ?>
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

          <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
            <li>
              <a href="<?php echo U('Setting/Setting');?>">
                <i class="ace-icon fa fa-cog"></i> 设置
              </a>
            </li>

            <li>
              <a href="<?php echo U('Personal/profile');?>">
                <i class="ace-icon fa fa-user"></i> 个人资料
              </a>
            </li>

            <li class="divider"></li>

            <li>
              <a href="<?php echo U('logout/index');?>">
                <i class="ace-icon fa fa-power-off"></i> 退出
              </a>
            </li>
          </ul>
        </li>

        <!-- /section:basics/navbar.user_menu -->
      </ul>
    </div>

    <!-- /section:basics/navbar.dropdown -->
  </div>
  <!-- /.navbar-container -->
</div>

<!-- /section:basics/navbar.layout -->

  <div class="main-container" id="main-container">
    <script type="text/javascript">
      try {
        ace.settings.check('main-container', 'fixed')
      } catch (e) {}
    </script>

        <!-- #section:basics/sidebar -->
    <div id="sidebar" class="sidebar responsive">
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'fixed')
            } catch (e) {
            }
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-success">
                    <i class="ace-icon fa fa-signal"></i>
                </button>

                <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>

                <!-- #section:basics/sidebar.layout.shortcuts -->
                <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
                </button>

                <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
                </button>

                <!-- /section:basics/sidebar.layout.shortcuts -->
            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>

                <span class="btn btn-info"></span>

                <span class="btn btn-warning"></span>

                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->

        <ul class="nav nav-list">
            <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li
                <?php if(($v['id'] == $current['id']) OR ($v['id'] == $current['pid']) OR ($v['id'] == $current['ppid'])): ?>class="active
                    <?php if($current['pid'] != '0'): ?>open<?php endif; ?>
                    "<?php endif; ?>
                >
                <a href="<?php if(empty($v["name"])): ?>#
                <?php else: ?>
                <?php echo U($v['name']); endif; ?>"
                <?php if(!empty($v["children"])): ?>class="dropdown-toggle"<?php endif; ?>
                >
                <i class="<?php echo ($v["icon"]); ?>"></i>
                <span class="menu-text">
                                    <?php echo ($v["title"]); ?>
                                </span>
                <?php if(!empty($v["children"])): ?><b class="arrow fa fa-angle-down"></b><?php endif; ?>
                </a>

                <b class="arrow"></b>
                <?php if(!empty($v["children"])): ?><ul class="submenu">
                        <?php if(is_array($v["children"])): $i = 0; $__LIST__ = $v["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li
                            <?php if(($vv['id'] == $current['id']) OR ($vv['id'] == $current['pid'])): ?>class="active
                                <?php if($current['ppid'] != '0'): ?>open<?php endif; ?>
                                "<?php endif; ?>
                            >
                            <a href="<?php if(empty($vv["children"])): echo U($vv['name']);?>
                            <?php else: ?>
                            #<?php endif; ?>"
                            <?php if(!empty($vv["children"])): ?>class="dropdown-toggle"<?php endif; ?>
                            >
                            <i class="<?php echo ($vv["icon"]); ?>"></i>
                            <?php echo ($vv["title"]); ?>
                            <?php if(!empty($vv["children"])): ?><b class="arrow fa fa-angle-down"></b><?php endif; ?>
                            </a>

                            <b class="arrow"></b>
                            <?php if(!empty($vv["children"])): ?><ul class="submenu">
                                    <?php if(is_array($vv["children"])): $i = 0; $__LIST__ = $vv["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?><li
                                        <?php if($vvv['id'] == $current['id']): ?>class="active"<?php endif; ?>
                                        >
                                        <a href="<?php echo U($vvv['name']);?>">
                                            <i class="<?php echo ($vvv["icon"]); ?>"></i>
                                            <?php echo ($vvv["title"]); ?>
                                        </a>
                                        <b class="arrow"></b>
                                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul><?php endif; ?>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul><?php endif; ?>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul><!-- /.nav-list -->

        <!-- #section:basics/sidebar.layout.minimize -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left"
               data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <!-- /section:basics/sidebar.layout.minimize -->
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'collapsed')
            } catch (e) {
            }
        </script>
    </div>

    <!-- /section:basics/sidebar -->
    <div class="main-content">
      <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->
            <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try {
                ace.settings.check('breadcrumbs', 'fixed')
            } catch (e) {
            }
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?php echo U('index/index');?>">首页</a>
            </li>
            <?php if(isset($current['ptitle'])): ?><li>
                    <a href="#"><?php echo ($current['ptitle']); ?></a>
                </li><?php endif; ?>
            <li class="active"><?php echo ($current['title']); ?></li>
        </ul><!-- /.breadcrumb -->
    </div>

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">

              <!-- #section:settings.box -->
    <!--<?php if($current["tips"] != ''): ?><div class="alert alert-block alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>
            <!--i class="ace-icon fa fa-check green"></i-->
            <!--<?php echo ($current["tips"]); ?>
        </div><?php endif; ?>-->
    <div class="ace-settings-container" id="ace-settings-container">
        <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
            <i class="ace-icon fa fa-cog bigger-130"></i>
        </div>

        <div class="ace-settings-box clearfix" id="ace-settings-box">
            <div class="pull-left width-50">
                <!-- #section:settings.skins -->
                <div class="ace-settings-item">
                    <div class="pull-left">
                        <select id="skin-colorpicker" class="hide">
                            <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                            <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                            <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                            <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                        </select>
                    </div>
                    <span>&nbsp; 选择皮肤</span>
                </div>

                <!-- /section:settings.skins -->

                <!-- #section:settings.navbar -->
                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar"/>
                    <label class="lbl" for="ace-settings-navbar"> 固定导航条</label>
                </div>

                <!-- /section:settings.navbar -->

                <!-- #section:settings.sidebar -->
                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar"/>
                    <label class="lbl" for="ace-settings-sidebar"> 固定侧边栏</label>
                </div>

                <!-- /section:settings.sidebar -->

                <!-- #section:settings.breadcrumbs -->
                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs"/>
                    <label class="lbl" for="ace-settings-breadcrumbs"> 固定面包屑</label>
                </div>

                <!-- /section:settings.breadcrumbs -->

                <!-- #section:settings.rtl -->
                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl"/>
                    <label class="lbl" for="ace-settings-rtl"> 切换至左边</label>
                </div>

                <!-- /section:settings.rtl -->

                <!-- #section:settings.container -->
                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container"/>
                    <label class="lbl" for="ace-settings-add-container">
                        切换宽窄度
                    </label>
                </div>

                <!-- /section:settings.container -->
            </div><!-- /.pull-left -->

            <div class="pull-left width-50">
                <!-- #section:basics/sidebar.options -->
                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover"/>
                    <label class="lbl" for="ace-settings-hover"> 子菜单收起</label>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact"/>
                    <label class="lbl" for="ace-settings-compact"> 侧边栏紧凑</label>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight"/>
                    <label class="lbl" for="ace-settings-highlight"> 当前位置</label>
                </div>

                <!-- /section:basics/sidebar.options -->
            </div><!-- /.pull-left -->
        </div><!-- /.ace-settings-box -->
    </div><!-- /.ace-settings-container -->

          <!-- /section:settings.box -->
          <div class="row">
            <div class="col-xs-12">
              <!-- PAGE CONTENT BEGINS -->
              <div class="row">

                <div id="accordion-sysinfo" class="accordion-style1 panel-group col-sm-3" style="width: 650px;">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse"
                                               data-parent="#accordion-sysinfo" href="#sysinfo">
                                                <i class="ace-icon fa fa-angle-down bigger-110"
                                                   data-icon-hide="ace-icon fa fa-angle-down"
                                                   data-icon-show="ace-icon fa fa-angle-right"></i>
                                                &nbsp;分店名称
                                            </a>
                                        </h4>
                    </div>

                    <div class="panel-collapse collapse in" id="sysinfo">
                      <div class="panel-body">
                        <?php if(is_array($hotelList)): $i = 0; $__LIST__ = $hotelList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($v["h_name"]); ?>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('displayHotel');?>?h_id=<?php echo ($v['id']); ?>" style="text-decoration: underline;" class="look">进入查看</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </p><?php endforeach; endif; else: echo "" ;endif; ?>
                  


                        <hr>
                        <div>
                          <div class="bt1" style="float: left;height:70px;width: 150px;border: 4px solid white;margin-right: 20px;margin-left: 35px;margin-bottom: 10px;color: white;border-radius: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;销量最好的菜
                            <p style="text-align: center;font-size: 16px;font-weight: bold;color: #515151;"><?php echo ($mostDish[0]['menu_name']); ?></p>
                          </div>
                          <span class="bt2" style="float: left;height:70px;width: 150px;border: 4px solid white;margin-right: 20px;margin-bottom: 10px;color: white;border-radius: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;销量最好的分店
                                                   <p style="text-align: center;font-size: 16px;font-weight: bold;color: #515151;"><?php echo ($mostHotal[0]['h_name']); ?></p>
                                                    </span>
                          <span class="bt3" style="float: left;height:70px;width: 150px;border: 4px solid white;margin-right: 20px;margin-bottom: 10px;color: white;border-radius: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;销量最差的菜
                                                    <p style="text-align: center;font-size: 16px;font-weight: bold;color: #515151;"><?php echo ($lastDish[0][menu_name]); ?></p>
                                                    </span>
                        </div>

                        <div>
                          <span class="bt4" style="float: left;height:70px;width: 150px;border: 4px solid white;margin-right: 20px;margin-left: 35px;color: white;border-radius: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;比上月销售额增长
                                                    <p style="text-align: center;font-size: 16px;font-weight: bold;color: #515151;">13%</p></span>
                          <span class="bt5" style="float: left;height:70px;width: 150px;border: 4px solid white;margin-right: 20px;color: white;border-radius: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;销量最差的分店
                                                   <p style="text-align: center;font-size: 16px;font-weight: bold;color: #515151;"><?php echo ($lastHotal[0][h_name]); ?></p></span>
                          <span class="bt6" style="float: left;height:70px;width: 150px;border: 4px solid white;margin-right: 20px;color: white;border-radius: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;销量锐增的菜品
                                                   <p style="text-align: center;font-size: 16px;font-weight: bold;color: #515151;">羊肉串</p></span>
                        </div>

                      </div>


                    </div>
                  </div>

                </div>
              </div>

              <div id="accordion" class="accordion-style1 panel-group col-sm-5" style="position: relative;top: 0px;left: 0px;
                               width: 1120px; ">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseOne">
                                                <i class="ace-icon fa fa-angle-down bigger-110"
                                                   data-icon-hide="ace-icon fa fa-angle-down"
                                                   data-icon-show="ace-icon fa fa-angle-right"></i>
                                                &nbsp;销售统计信息
                                            </a>
                                        </h4>
                  </div>
                  <div style="clear: both;"></div>
                  <div class="panel-collapse collapse in" id="collapseOne">
                    <div id="officialnews" class="panel-body">
                      <table style="width: 1050px;height:200px; ">
                        <thead>
                          <tr style="background-color: rgb(248,248,248);">
                            <td>店名：</td>
                            <td id="month1">一月份</td>
                            <td id="month2">二月份</td>
                            <td id="month3">三月份</td>
                            <td id="month4">四月份</td>
                            <td id="month5">五月份</td>
                            <td id="month6">六月份</td>
                            <td id="month7">七月份</td>
                            <td id="month8">八月份</td>
                            <td id="month9">九月份</td>
                            <td id="month10">十月份</td>
                            <td id="month11">十一月份</td>
                            <td id="month12">十二月份</td>
                            <td id="he">合计</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(is_array($orgInfo)): foreach($orgInfo as $key=>$v): ?><tr style="background: #dbdbdb;border:4px solid white;">
                              <td><?php echo ($v["h_name"]); ?></td>
                              <td><?php echo ($v["month01"]); ?></td>
                              <td><?php echo ($v["month02"]); ?></td>
                              <td><?php echo ($v["month03"]); ?></td>
                              <td><?php echo ($v["month04"]); ?></td>
                              <td><?php echo ($v["month05"]); ?></td>
                              <td><?php echo ($v["month06"]); ?></td>
                              <td><?php echo ($v["month07"]); ?></td>
                              <td><?php echo ($v["month08"]); ?></td>
                              <td><?php echo ($v["month09"]); ?></td>
                              <td><?php echo ($v["month10"]); ?></td>
                              <td><?php echo ($v["month11"]); ?></td>
                              <td><?php echo ($v["month12"]); ?></td>
                              <td><?php echo ($v["total"]); ?></td>
                            </tr><?php endforeach; endif; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div id="Facebook-info" class="accordion-style1 panel-group col-sm-4" style="position: absolute;left: 650px;top:0px;width: 485px;">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse"
                                               data-parent="#Facebook-info" href="#Facebook">
                                                <i class="ace-icon fa fa-angle-down bigger-110"
                                                   data-icon-hide="ace-icon fa fa-angle-down"
                                                   data-icon-show="ace-icon fa fa-angle-right"></i>
                                                &nbsp;菜品销售比例图
                                            </a>
                                        </h4>
                  </div>

                  <div class="panel-collapse collapse in" id="Facebook">
                    <div class="panel-body">
                      <div style="text-align:center;clear:both;padding:0px;margin: 0px;">
                      </div>
                      <div style="margin:0 auto;">
                        <script type="text/javascript" src="/cloud/Public/Admin/js/Statistics/jquery-1.11.2.js"></script>
                        <script type="text/javascript" src="/cloud/Public/Admin/js/Statistics/jsapi.js"></script>
                        <script type="text/javascript" src="/cloud/Public/Admin/js/Statistics/corechart.js"></script>
                        <script type="text/javascript" src="/cloud/Public/Admin/js/Statistics/jquery.gvChart-1.0.1.min.js"></script>
                        <script type="text/javascript" src="/cloud/Public/Admin/js/Statistics/jquery.ba-resize.min.js"></script>

                        <script type="text/javascript">
                          gvChartInit();
                          $(document).ready(function() {
                            $('#myTable5').gvChart({
                              chartType: 'PieChart',
                              gvSettings: {
                                vAxis: {
                                  title: 'No of players'
                                },
                                hAxis: {
                                  title: 'Month'
                                },
                                width: 430,
                                height: 290
                              }
                            });
                          });
                        </script>
                        <table id='myTable5'>

                          <thead>
                            <tr>
                              <th></th>
                              <th><?php echo ($mostDish[0][menu_name]); ?></th>
                              <th><?php echo ($mostDish[1][menu_name]); ?></th>
                              <th><?php echo ($mostDish[2][menu_name]); ?></th>
                              <th><?php echo ($mostDish[3][menu_name]); ?></th>
                              <th><?php echo ($mostDish[4][menu_name]); ?></th>
                              <th><?php echo ($mostDish[5][menu_name]); ?></th>
                              <th>其它</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th></th>
                              <td><?php echo ($mostDish[0][nums]); ?></td>
                              <td><?php echo ($mostDish[1][nums]); ?></td>
                              <td><?php echo ($mostDish[2][nums]); ?></td>
                              <td><?php echo ($mostDish[3][nums]); ?></td>
                              <td><?php echo ($mostDish[4][nums]); ?></td>
                              <td><?php echo ($mostDish[5][nums]); ?></td>
                              <td><?php echo ($extra[0][nums]); ?></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
            <!-- PAGE CONTENT ENDS -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.page-content -->
    </div>
  </div>
  <!-- /.main-content -->

      <div class="footer">
        <div class="footer-inner">
            <!-- #section:basics/footer -->
            <div class="footer-content">
                            <span class="bigger-120">
                                <small>Copyright &copy; <a href="http://www.baidu.com" target="_blank"><?php echo (C("footer")); ?></a> All Rights Reserved.</small>
                            </span>
            </div>

            <!-- /section:basics/footer -->
        </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>

  </div>
  <!-- /.main-container -->

  <!-- basic scripts -->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='/cloud/Public/Admin/js/jquery.js'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='/cloud/Public/Admin/js/jquery1x.js'>" + "<" + "/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='/cloud/Public/Admin/js/jquery.mobile.custom.js'>" + "<" + "/script>");
</script>
<script src="/cloud/Public/Admin/js/bootstrap.js"></script>

<!-- page specific plugin scripts -->
<script charset="utf-8" src="/cloud/Public/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/cloud/Public/kindeditor/lang/zh_CN.js"></script>
<script src="/cloud/Public/Admin/js/bootbox.js"></script>
<!-- ace scripts -->
<script src="/cloud/Public/Admin/js/ace/elements.scroller.js"></script>
<script src="/cloud/Public/Admin/js/ace/elements.colorpicker.js"></script>
<script src="/cloud/Public/Admin/js/ace/elements.fileinput.js"></script>
<script src="/cloud/Public/Admin/js/ace/elements.typeahead.js"></script>
<script src="/cloud/Public/Admin/js/ace/elements.wysiwyg.js"></script>
<script src="/cloud/Public/Admin/js/ace/elements.spinner.js"></script>
<script src="/cloud/Public/Admin/js/ace/elements.treeview.js"></script>
<script src="/cloud/Public/Admin/js/ace/elements.wizard.js"></script>
<script src="/cloud/Public/Admin/js/ace/elements.aside.js"></script>
<script src="/cloud/Public/Admin/js/ace/ace.js"></script>
<script src="/cloud/Public/Admin/js/ace/ace.ajax-content.js"></script>
<script src="/cloud/Public/Admin/js/ace/ace.touch-drag.js"></script>
<script src="/cloud/Public/Admin/js/ace/ace.sidebar.js"></script>
<script src="/cloud/Public/Admin/js/ace/ace.sidebar-scroll-1.js"></script>
<script src="/cloud/Public/Admin/js/ace/ace.submenu-hover.js"></script>
<script src="/cloud/Public/Admin/js/ace/ace.widget-box.js"></script>
<script src="/cloud/Public/Admin/js/ace/ace.settings.js"></script>
<script src="/cloud/Public/Admin/js/ace/ace.settings-rtl.js"></script>
<script src="/cloud/Public/Admin/js/ace/ace.settings-skin.js"></script>
<script src="/cloud/Public/Admin/js/ace/ace.widget-on-reload.js"></script>
<script src="/cloud/Public/Admin/js/ace/ace.searchbox-autocomplete.js"></script>
<script src="/cloud/Public/Admin/js/jquery-ui.js"></script>
  <!-- inline scripts related to this page -->

<!--   <script type="text/javascript">
    $(function() {

      $("#officialnews ul").html('<div class="ace-icon fa fa-spinner fa-spin orange"></div>');
      $.ajax({
        type: 'GET',
        url: '<?php echo (C("NEWS_URL")); ?>?callback=?',
        success: function(data) {
          $("#officialnews ul").html("");
          $.each(data.news, function(i, news) {
            $("#officialnews ul").append("<li>" + news.pre + "<a href=\"" + news.url + "\" title=\"" + news.title + "\" target=\"_blank\">" + news.title + "</a>" + news.time + "</li>");
          });
        },
        error: function() {
          $("#officialnews ul").html("");
        },
        dataType: 'json'
      });

      $("#update").click(function() {

        $("#upmsg").html("");
        $("#upmsg").addClass("ace-icon fa fa-refresh fa-spin blue");
        $.ajax({
          type: 'GET',
          url: '<?php echo (C("UPDATE_URL")); ?>?v=<?php echo (C("Version")); ?>&callback=?',
          success: function(json) {
            if (json.result == 'no') {
              $("#upmsg").html("目前还没有适合您当前版本的更新！").removeClass();
            } else if (json.result == 'yes') {
              $("#upmsg").html("检查到新版本 " + json.ver + "，请前往“系统设置”->“<a  href=\"<?php echo U('Update/update');?>\">在线升级</a>”").removeClass();
            }
          },
          error: function() {
            $("#upmsg").html("悲剧了，网络故障，请稍后再试！").removeClass();
          },
          dataType: 'json'
        });

      });
    })
    $(function() {
      $(".btn-info.submit").click(function() {
        var content = $("#content").val();
        if (content == '') {
          bootbox.dialog({
            title: '友情提示：',
            message: "反馈内容必须填写。",
            buttons: {
              "success": {
                "label": "确定",
                "className": "btn-danger"
              }
            }
          });
          return;
        }

        $("#form").submit();
      });
    });
  </script> -->
</body>

</html>