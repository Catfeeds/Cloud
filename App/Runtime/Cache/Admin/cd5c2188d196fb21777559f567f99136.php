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
                    <script type="text/javascript" src="/cloud/Public/Admin/js/changedata.js"></script>

                    <div style="width: auto;height: auto;">
                        <!-- /section:settings.box -->

                        <!-- left -->

                        <div class="lcontentpage" style="border: 1px solid #8DB6CD;width: 640px;height:210px;float: left;margin: 10px;position: relative;margin-top: 23px;">
                            <div style="height: 30px;position:absolute;top: 0px;width: 100%;background-color:#8DB6CD;line-height: 30px;padding-left: 10px;color:white; ">
                                >&nbsp;<?php echo ($h_name); ?> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                <input type="button" value="返回" name="" onclick="window.history.back(); " style="height: 20px;width: 40px;margin-top: 7px;line-height: 17px;border: 1px solid white;background-color: transparent;border-radius: 8px;">
                            </div>
                            <div style="position: absolute;top: 40px;margin-left: 25px;">
                                <form action="" method="post">
                                    &nbsp;&nbsp;查询某日菜品的销量：
                                    <select name="resname" onchange="" id="sel_1">
            <option value="0" selected="selected">------请选择菜品------</option>
            <?php if(is_array($detail)): foreach($detail as $key=>$v): ?><!-- <option value="Name:<?php echo ($v["menu_name"]); ?> Num:<?php echo ($v["num"]); ?>"><?php echo ($v["menu_name"]); ?></option> -->
              <option id="sel_2"  value="<?php echo ($v["id"]); ?>"><?php echo ($v["menu_name"]); ?></option><?php endforeach; endif; ?>
        </select>
                                    <input type="date" name="" id="time" autofocus="true" required="true" style="width: 170px;height: 30px;margin-left: 10px;">
                                    <input type="button" id="timesubmit" value="查询" onclick="test()" style="margin-left: 10px;width:60px; ">

                                    <br /> 
                                    <hr/>
                                    &nbsp;&nbsp;查询某段时间菜品的销量：
                                    <input type="date" name="" id="times" autofocus="true" required="true" style="width: 150px;height: 30px;margin-left: 5px;">
                                    <input type="date" name="" id="timee" autofocus="true" required="true" style="width: 150px;height: 30px;margin-left: 5px;">
                                   <input type="button" id="" value="查询" onclick="displaydata()" style="margin-left: 10px;width:60px; ">
                                   <br />
                                    <!--<select id="recent-time" style="margin-left: 10px;">
			                            <option value="a">最近一周</option>
			                            <option value="b">最近一个月</option>
			                            <option value="c">最近三个月</option>
			                            <option value="d">最近半年</option>
		                                </select>-->
		                            
                            </form>
                            <div style="margin: 5px auto 0;width: 70%;">
                                <button class="timebutton" id="week" value="a" onclick="aweek()" style="width: 20%;height: 28px;padding: 2px 5px 2px 5px; margin-top: 6px; background: #e0eeee;border-radius: 5px;border: 1px solid #e0eeee;margin-right: 10px;">最近一周</button>
                                <button class="timebutton" id="1month" value="b" onclick="onemonth()" style="width: 20%;height: 28px;padding: 2px 5px 2px 5px; margin-top: 6px; background: #e0eeee;border-radius: 5px;border: 1px solid #e0eeee; margin-right: 10px;">最近一个月</button>
                                <button class="timebutton" id="3month" value="c" onclick="threemonth()" style="width: 20%;height: 28px;padding: 2px 5px 2px 5px; margin-top: 6px; background: #e0eeee;border-radius: 5px;border: 1px solid #e0eeee; margin-right: 10px;">最近三个月</button>
                                <button class="timebutton" id="6month" value="d" onclick="sixmonth()" style="width: 20%;height: 28px;padding: 2px 5px 2px 5px; margin-top: 6px; background: #e0eeee;border-radius: 5px;border: 1px solid #e0eeee; margin-right: 10px;">最近六个月</button>
                            </div>
                            </div>
                            <div>



                                <div style="display: block;width: 120px;height: 29px;background-color:#8DB6CD;border: 2px solid #E0EEEE; border-radius: 10px;text-align: center;margin-left: 480px;position: absolute;top: 0px;line-height: 30px;"><a href="<?php echo U('displayBox');?>" style="color: white;">总体销售详情</a></div>
                            </div>

                        </div>

                        <!-- 柱状图表部分 -->
                        <div style="width: 635px;height: 455px;border:1px solid white;position: relative;top: 240px;margin-left: 10px;">



                            <div id="main" style="width: 620px;height: 450px;position: absolute;top: 40px;margin-left: 10px;">
                            </div>
                            <script type="text/javascript" src="/cloud/Public/Admin/js/echarts.min.js"></script>
                            <script type="text/javascript">
                                var myChart = echarts.init(document.getElementById('main'));
                                var option = {

                                    title: {
                                        text: '销量前五的菜品的数量及金额',
                                        left: 'center',
                                        top: 0,
                                        textStyle: {
                                            fontWeight: 'normal',
                                            color: "#000",
                                            fontSize: 20
                                        }
                                    },

                                    tooltip: {
                                        trigger: 'axis'
                                    },
                                    legend: {
                                        left: 20,
                                        top: 30,
                                        itemGap: 16,
                                        itemWidth: 18,
                                        itemHeight: 10,
                                        data: ['数量', '金额']
                                    },
                                    toolbox: {
                                        show: true,
                                        feature: {
                                            dataView: {
                                                show: true,
                                                readOnly: false
                                            },
                                            magicType: {
                                                show: true,
                                                type: ['line', 'bar']
                                            },
                                            restore: {
                                                show: true
                                            },
                                            saveAsImage: {
                                                show: true
                                            }
                                        }
                                    },
                                    calculable: true,
                                    xAxis: [{
                                        type: 'category',
                                        data: ['<?php echo ($detail["0"]["menu_name"]); ?>', '<?php echo ($detail["1"]["menu_name"]); ?>', '<?php echo ($detail["2"]["menu_name"]); ?>', '<?php echo ($detail["3"]["menu_name"]); ?>', '<?php echo ($detail["4"]["menu_name"]); ?>'],
                                        position:'bottom',
                                        axisLabel:{
                                            interval:0,
                                            rotate:-30,
                                        }
                                    }],
                                    yAxis: [{
                                        type: 'value'
                                    }],
                                    series: [{
                                        name: '数量',
                                        type: 'bar',
                                        data: ['<?php echo ($detail["0"]["num"]); ?>','<?php echo ($detail["1"]["num"]); ?>','<?php echo ($detail["2"]["num"]); ?>','<?php echo ($detail["3"]["num"]); ?>','<?php echo ($detail["4"]["num"]); ?>'],
                                        markPoint: {
                                            data: [{
                                                type: 'max',
                                                name: '最大值'
                                            }, {
                                                type: 'min',
                                                name: '最小值'
                                            }]
                                        },
                                        markLine: {
                                            data: [{
                                                type: 'average',
                                                name: '平均值'
                                            }]
                                        }
                                    }, {
                                        name: '金额',
                                        type: 'bar',
                                        data: ['<?php echo ($detail["0"]["total"]); ?>','<?php echo ($detail["1"]["total"]); ?>','<?php echo ($detail["2"]["total"]); ?>','<?php echo ($detail["3"]["total"]); ?>','<?php echo ($detail["4"]["total"]); ?>'],

                                        markLine: {
                                            data: [{
                                                type: 'average',
                                                name: '平均值'
                                            }]
                                        }
                                    }]
                                };
                                myChart.setOption(option);
                            </script>
                            <!-- <script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jQuery.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jqplot.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jqplot/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jqplot/examples/syntaxhighlighter/scripts/shCore.min.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jqplot/examples/syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jqplot/examples/syntaxhighlighter/scripts/shBrushXml.min.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jqplot/plugins/jqplot.logAxisRenderer.min.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jqplot/plugins/jqplot.canvasAxisLabelrenderer.min.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jqplot/plugins/jqplot.dateAxisRenderer.min.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jqplot/plugins/jqplot.barRenderer.min.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jqplot/plugins/jqplot.pointLabels.min.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jqplot/plugins/jqplot.dateaxisRenderer.min.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/jqplot/plugins/jqplot.dateaxisRenderer.min.js"></script>
<script type="text/javascript" src="/cloud/Public/Admin/js/zhu/m_jqplot.js"></script>
<link rel="stylesheet" type="text/css" href="/cloud/Public/Admin/js/jqplot/jquery.jqplot.min.css">
<link rel="stylesheet" type="text/css" href="/cloud/Public/Admin/js/jqplot/examples/syntaxhighlighter/styles/shCoreDefault.min.css">
<link rel="stylesheet" type="text/css" href="/cloud/Public/Admin/js/jqplot/examples/syntaxhighlighter/styles/shThemejqplotPlot.min.css">

<script type="text/javascript">
    var data = [[24,15,36,27,38,29],[73,46,58,61,41]];
    var data_max = 100; //Y轴最大刻度
    var line_title = ["销量","销售额"]; //曲线名称
    var y_label = "数值"; //Y轴标题
    var x_label = "菜名"; //X轴标题
    var x = ["红烧肉","羊肉串","水煮鱼","拍黄瓜","金针菇炒蛋"]; //定义X轴刻度值
    var title = "这是标题"; //统计图标标题
    j.jqplot.diagram.base("chart2", data, line_title, "这是销量前五菜品的销量和销售额", x, x_label, y_label, data_max, 2);
</script> -->


                        </div>
                        <script type="text/javascript">
                            	
                            function test() {
                                
                                var h_id = document.getElementById('h_id').value;
                                var menu_id=document.getElementById('sel_1').value;
                                var menu_name=document.getElementById('sel_2').innerHTML;
                                var time=document.getElementById('time').value;
                                console.log(h_id);
                                console.log(menu_name);
                                console.log(menu_id);
                                console.log(time);
                                 $.ajax({
                                    type: "post",
                                    dataType: "json",
                                    data: {
                                        h_id: h_id,
                                        menu_id:menu_id,
                                        time:time
                                    },
                                    url: "displaySingle",
                                    success: function(data) {
                                        console.log(data);
                                        var msg = " ";
                                        msg += menu_name;
                                        msg += "　" + time;
                                        msg += "\n销售量为:";
                                        msg += data[0].num;
                                        msg += "\n销售额为:";
                                        msg += data[0].total;
                                        alert(msg);
                                     },
                                     error: function() {
                                            alert(111);
                                        }
                          });
                     }
                        </script>
                    </div>
                </div>



                <!-- right -->

                <div class="rcontentpage" style="border:1px solid rgb(74,157,99); width: 500px;height: 680px;margin-left: 690px;position: relative;margin-top: -455px;">
                    <div style="height: 30px;position:absolute;top: 0px;width: 100%;background-color: rgb(77,159,103);line-height: 30px;padding-left: 10px;color:white; ">
                        >&nbsp;销售详情
                    </div>
                    <div style="overflow: scroll;height:635px;position: absolute;top: 30px; ">
                        <table style="border: 1px solid gray;margin: 15px;width: 465px;height: 590px;">
                            <thead>
                                <tr style="background-color: rgb(248,248,248);border : 1px solid white;">
                                    <td>菜品</td>
                                    <td class="numtd">数量&nbsp;<span class="triangle-up"></span>
                                    	<div class="numsort">
                                    		<ul>
                                    			<li onclick="numsorttop()">销量从高到低</li>
                                    			<li onclick="numsortlow()">销量从低到高</li>
                                    		</ul>
                                    	</div>
                                    </td>
                                    <td>单价</td>
                                    <td class="numtd">总销售额&nbsp;<span class="triangle-up"></span>
                                    	<div class="pricesort">
                                    		<ul>
                                    			<li onclick="pricesorttop()">总销售额从高到低</li>
                                    			<li onclick="pricesortlow()">总销售额从低到高</li>
                                    		</ul>
                                    	</div>
                                    </td>
                                </tr>
                            </thead>
                            <tbody id='saleDetail'>
                                <?php if(is_array($detail)): foreach($detail as $key=>$v): ?><tr>
                                        <td><?php echo ($v["menu_name"]); ?></td>
                                        <td><?php echo ($v["num"]); ?></td>
                                        <td><?php echo ($v["price"]); ?></td>
                                        <td><?php echo ($v["total"]); ?></td>
                                    </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                        <input type="text" id="h_id" value="<?php echo ($h_id); ?>" style="display: none;">
                    </div>

                </div>




            </div>
            <!-- bottom -->






        </div>



        <!--  <div class="rcontentpage">
                        <div class="rtopcontent">>&nbsp;&nbsp;统计图表</div>
                            <div class="autocontent">


                            </div> 
                        </div>
                    </div>
             
                -->




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
</body>

</html>