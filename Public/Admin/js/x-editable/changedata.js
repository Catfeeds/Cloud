/*
	获取查询的数据，并且执行ajax访问后台，拿到数据，修改柱状图。

*/

function displaydata()
{
	var sometime = document.getElementById('sometime').checked;
	var sometimes = document.getElementById('sometimes').checked;
	var h_id = document.getElementById('h_id').value;
	var times = document.getElementById('times').value;
	var timee = document.getElementById('timee').value;
	var recent = document.getElementById('recent-time').value;
	console.log(h_id);
	console.log(sometime);
	console.log(sometimes);
	console.log(times);
	console.log(recent);
	
	if(times!="" && timee!=""){
		var find={times:times,timee:timee};
	}
	else{
		var find=recent;
	}
	
	//获取查询的时间。
	$.ajax({
            type: "post",
            dataType: "json",
            data: {h_id:h_id,
            	find:find
            },
            url: "searchHotel",
            success:function(data) {
                console.log(data);
                var myChart = echarts.init(document.getElementById('main'));
                var option = {
                    title: {
                    text: '测试销量前五的菜品的数量及金额',
                    left:'center',
                    top:0,
                    textStyle: {
                        fontWeight: 'normal',
                        color: "#000",
                        fontSize: 20
                    }
                },
 
                tooltip : {
                trigger: 'axis'
                },
                legend: {
                    left:20,
                    top:30,
                    itemGap: 16,
                    itemWidth: 18,
                    itemHeight: 10,
                    data:['数量','金额']
                },
                toolbox: {
                    show : true,
                    feature : {
                        dataView : {show: true, readOnly: false},
                        magicType : {show: true, type: ['line', 'bar']},
                        restore : {show: true},
                        saveAsImage : {show: true}
                    }
                },
                calculable : true,
                xAxis : [
                    {
                        type : 'category',
                        data : [data[0].menu_name,data[1].menu_name,data[2].menu_name,data[3].menu_name,data[4].menu_name]
                    }
                ],
                yAxis : [
                    {
                        type : 'value'
                    }
                ],
                series : [
                    {
                        name:'数量',
                        type:'bar',
                        data:[data[0].total, data[1].total, data[2].total, data[3].total, data[4].total],
                        markPoint : {
                            data : [
                                {type : 'max', name: '最大值'},
                                {type : 'min', name: '最小值'}
                            ]
                        },
                        markLine : {
                            data : [
                                {type : 'average', name: '平均值'}
                            ]
                        }
                    },
                    {
                        name:'金额',
                        type:'bar',
                        data:[data[0].sum, data[1].sum, data[2].sum, data[3].sum, data[4].sum],
                       
                        markLine : {
                            data : [
                                {type : 'average', name : '平均值'}
                            ]
                        }
                    }
                ]
            };
                myChart.setOption(option);
            },
            error:function()
            {
                alert(111);
            }
        });
}
