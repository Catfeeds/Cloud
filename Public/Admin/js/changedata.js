/*
	获取查询的数据，并且执行ajax访问后台，拿到数据，修改柱状图。

*/
var val;

function displaydata() {
    var h_id = document.getElementById('h_id').value;
    var times = document.getElementById('times').value;
    var timee = document.getElementById('timee').value;
    console.log(h_id);
    console.log(times);
    console.log(timee);
    
    var find='e';
    val=find;
//  var find = {times:times,timee:timee};
    

    //获取查询的时间。
    $.ajax({
        type: "post",
        dataType: "json",
        data: {
            h_id: h_id,
            times: times,
            timee: timee,
            find: find
        },
        url: "searchHotel",
        success: function(data) {

            console.log(data);
            //更新到右边的销售详情表
            $('#saleDetail').html('');
            //动态创建元素
            console.log(data.detail.length);
            for (var i = 0; i < data.detail.length; i++) {
                var tr = $('<tr></tr>');
                var menu_name = $('<td>' + data.detail[i].menu_name + '</td>');
                var num = $('<td>' + data.detail[i].num + '</td>');
                var price = $('<td>' + data.detail[i].price + '</td>');
                var total = $('<td>' + data.detail[i].total + '</td>');
                tr.append(menu_name).append(num).append(price).append(total);
                $('#saleDetail').append(tr);
            }

            var myChart = echarts.init(document.getElementById('main'));
            var option = {
                title: {
                    text: '测试销量前五的菜品的数量及金额',
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
                        dataView: { show: true, readOnly: false },
                        magicType: { show: true, type: ['line', 'bar'] },
                        restore: { show: true },
                        saveAsImage: { show: true }
                    }
                },
                calculable: true,
                xAxis: [{
                    type: 'category',
                    data: [data.five[0].menu_name, data.five[1].menu_name, data.five[2].menu_name, data.five[3].menu_name, data.five[4].menu_name]
                }],
                yAxis: [{
                    type: 'value'
                }],
                series: [{
                        name: '数量',
                        type: 'bar',
                        data: [data.five[0].num, data.five[1].num, data.five[2].num, data.five[3].num, data.five[4].num],
                        markPoint: {
                            data: [
                                { type: 'max', name: '最大值' },
                                { type: 'min', name: '最小值' }
                            ]
                        },
                        markLine: {
                            data: [
                                { type: 'average', name: '平均值' }
                            ]
                        }
                    },
                    {
                        name: '金额',
                        type: 'bar',
                        data: [data.five[0].total, data.five[1].total, data.five[2].total, data.five[3].total, data.five[4].total],

                        markLine: {
                            data: [
                                { type: 'average', name: '平均值' }
                            ]
                        }
                    }
                ]
            };
            myChart.setOption(option);
        },
        error: function() {
            alert(111);
        }
    });
}

function aweek(){
	var h_id = document.getElementById('h_id').value;
//	var week=document.getElementById('week').value;
	
	var find='a';
	val=find;
	
	 $.ajax({
        type: "post",
        dataType: "json",
        data: {
            h_id: h_id,
            find: find
        },
        url: "searchHotel",
        success: function(data) {

            console.log(data);
            //更新到右边的销售详情表
            $('#saleDetail').html('');
            //动态创建元素
            console.log(data.detail.length);
            for (var i = 0; i < data.detail.length; i++) {
                var tr = $('<tr></tr>');
                var menu_name = $('<td>' + data.detail[i].menu_name + '</td>');
                var num = $('<td>' + data.detail[i].num + '</td>');
                var price = $('<td>' + data.detail[i].price + '</td>');
                var total = $('<td>' + data.detail[i].total + '</td>');
                tr.append(menu_name).append(num).append(price).append(total);
                $('#saleDetail').append(tr);
            }

            var myChart = echarts.init(document.getElementById('main'));
            var option = {
                title: {
                    text: '最近一周销量前五的菜品的数量及金额',
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
                        dataView: { show: true, readOnly: false },
                        magicType: { show: true, type: ['line', 'bar'] },
                        restore: { show: true },
                        saveAsImage: { show: true }
                    }
                },
                calculable: true,
                xAxis: [{
                    type: 'category',
                    data: [data.five[0].menu_name, data.five[1].menu_name, data.five[2].menu_name, data.five[3].menu_name, data.five[4].menu_name]
                }],
                yAxis: [{
                    type: 'value'
                }],
                series: [{
                        name: '数量',
                        type: 'bar',
                        data: [data.five[0].num, data.five[1].num, data.five[2].num, data.five[3].num, data.five[4].num],
                        markPoint: {
                            data: [
                                { type: 'max', name: '最大值' },
                                { type: 'min', name: '最小值' }
                            ]
                        },
                        markLine: {
                            data: [
                                { type: 'average', name: '平均值' }
                            ]
                        }
                    },
                    {
                        name: '金额',
                        type: 'bar',
                        data: [data.five[0].total, data.five[1].total, data.five[2].total, data.five[3].total, data.five[4].total],

                        markLine: {
                            data: [
                                { type: 'average', name: '平均值' }
                            ]
                        }
                    }
                ]
            };
            myChart.setOption(option);
        },
        error: function() {
            alert(111);
        }
    });
}

function onemonth(){
	var h_id = document.getElementById('h_id').value;
//	var week=document.getElementById('week').value;
	
	var find='b';
	val=find;
	
	 $.ajax({
        type: "post",
        dataType: "json",
        data: {
            h_id: h_id,
            find: find
        },
        url: "searchHotel",
        success: function(data) {

            console.log(data);
            //更新到右边的销售详情表
            $('#saleDetail').html('');
            //动态创建元素
            console.log(data.detail.length);
            for (var i = 0; i < data.detail.length; i++) {
                var tr = $('<tr></tr>');
                var menu_name = $('<td>' + data.detail[i].menu_name + '</td>');
                var num = $('<td>' + data.detail[i].num + '</td>');
                var price = $('<td>' + data.detail[i].price + '</td>');
                var total = $('<td>' + data.detail[i].total + '</td>');
                tr.append(menu_name).append(num).append(price).append(total);
                $('#saleDetail').append(tr);
            }

            var myChart = echarts.init(document.getElementById('main'));
            var option = {
                title: {
                    text: '最近一个月销量前五的菜品的数量及金额',
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
                        dataView: { show: true, readOnly: false },
                        magicType: { show: true, type: ['line', 'bar'] },
                        restore: { show: true },
                        saveAsImage: { show: true }
                    }
                },
                calculable: true,
                xAxis: [{
                    type: 'category',
                    data: [data.five[0].menu_name, data.five[1].menu_name, data.five[2].menu_name, data.five[3].menu_name, data.five[4].menu_name]
                }],
                yAxis: [{
                    type: 'value'
                }],
                series: [{
                        name: '数量',
                        type: 'bar',
                        data: [data.five[0].num, data.five[1].num, data.five[2].num, data.five[3].num, data.five[4].num],
                        markPoint: {
                            data: [
                                { type: 'max', name: '最大值' },
                                { type: 'min', name: '最小值' }
                            ]
                        },
                        markLine: {
                            data: [
                                { type: 'average', name: '平均值' }
                            ]
                        }
                    },
                    {
                        name: '金额',
                        type: 'bar',
                        data: [data.five[0].total, data.five[1].total, data.five[2].total, data.five[3].total, data.five[4].total],

                        markLine: {
                            data: [
                                { type: 'average', name: '平均值' }
                            ]
                        }
                    }
                ]
            };
            myChart.setOption(option);
        },
        error: function() {
            alert(111);
        }
    });
}

function threemonth(){
	var h_id = document.getElementById('h_id').value;
//	var week=document.getElementById('week').value;
	
	var find='c';
	val=find;
	
	 $.ajax({
        type: "post",
        dataType: "json",
        data: {
            h_id: h_id,
            find: find
        },
        url: "searchHotel",
        success: function(data) {

            console.log(data);
            //更新到右边的销售详情表
            $('#saleDetail').html('');
            //动态创建元素
            console.log(data.detail.length);
            for (var i = 0; i < data.detail.length; i++) {
                var tr = $('<tr></tr>');
                var menu_name = $('<td>' + data.detail[i].menu_name + '</td>');
                var num = $('<td>' + data.detail[i].num + '</td>');
                var price = $('<td>' + data.detail[i].price + '</td>');
                var total = $('<td>' + data.detail[i].total + '</td>');
                tr.append(menu_name).append(num).append(price).append(total);
                $('#saleDetail').append(tr);
            }

            var myChart = echarts.init(document.getElementById('main'));
            var option = {
                title: {
                    text: '最近三个月销量前五的菜品的数量及金额',
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
                        dataView: { show: true, readOnly: false },
                        magicType: { show: true, type: ['line', 'bar'] },
                        restore: { show: true },
                        saveAsImage: { show: true }
                    }
                },
                calculable: true,
                xAxis: [{
                    type: 'category',
                    data: [data.five[0].menu_name, data.five[1].menu_name, data.five[2].menu_name, data.five[3].menu_name, data.five[4].menu_name]
                }],
                yAxis: [{
                    type: 'value'
                }],
                series: [{
                        name: '数量',
                        type: 'bar',
                        data: [data.five[0].num, data.five[1].num, data.five[2].num, data.five[3].num, data.five[4].num],
                        markPoint: {
                            data: [
                                { type: 'max', name: '最大值' },
                                { type: 'min', name: '最小值' }
                            ]
                        },
                        markLine: {
                            data: [
                                { type: 'average', name: '平均值' }
                            ]
                        }
                    },
                    {
                        name: '金额',
                        type: 'bar',
                        data: [data.five[0].total, data.five[1].total, data.five[2].total, data.five[3].total, data.five[4].total],

                        markLine: {
                            data: [
                                { type: 'average', name: '平均值' }
                            ]
                        }
                    }
                ]
            };
            myChart.setOption(option);
        },
        error: function() {
            alert(111);
        }
    });
}

function sixmonth(){
	var h_id = document.getElementById('h_id').value;
//	var week=document.getElementById('week').value;
	
	var find='d';
	val=find;
	
	 $.ajax({
        type: "post",
        dataType: "json",
        data: {
            h_id: h_id,
            find: find
        },
        url: "searchHotel",
        success: function(data) {

            console.log(data);
            //更新到右边的销售详情表
            $('#saleDetail').html('');
            //动态创建元素
            console.log(data.detail.length);
            for (var i = 0; i < data.detail.length; i++) {
                var tr = $('<tr></tr>');
                var menu_name = $('<td>' + data.detail[i].menu_name + '</td>');
                var num = $('<td>' + data.detail[i].num + '</td>');
                var price = $('<td>' + data.detail[i].price + '</td>');
                var total = $('<td>' + data.detail[i].total + '</td>');
                tr.append(menu_name).append(num).append(price).append(total);
                $('#saleDetail').append(tr);
            }

            var myChart = echarts.init(document.getElementById('main'));
            var option = {
                title: {
                    text: '最近六个月销量前五的菜品的数量及金额',
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
                        dataView: { show: true, readOnly: false },
                        magicType: { show: true, type: ['line', 'bar'] },
                        restore: { show: true },
                        saveAsImage: { show: true }
                    }
                },
                calculable: true,
                xAxis: [{
                    type: 'category',
                    data: [data.five[0].menu_name, data.five[1].menu_name, data.five[2].menu_name, data.five[3].menu_name, data.five[4].menu_name]
                }],
                yAxis: [{
                    type: 'value'
                }],
                series: [{
                        name: '数量',
                        type: 'bar',
                        data: [data.five[0].num, data.five[1].num, data.five[2].num, data.five[3].num, data.five[4].num],
                        markPoint: {
                            data: [
                                { type: 'max', name: '最大值' },
                                { type: 'min', name: '最小值' }
                            ]
                        },
                        markLine: {
                            data: [
                                { type: 'average', name: '平均值' }
                            ]
                        }
                    },
                    {
                        name: '金额',
                        type: 'bar',
                        data: [data.five[0].total, data.five[1].total, data.five[2].total, data.five[3].total, data.five[4].total],

                        markLine: {
                            data: [
                                { type: 'average', name: '平均值' }
                            ]
                        }
                    }
                ]
            };
            myChart.setOption(option);
        },
        error: function() {
            alert(111);
        }
    });
}


function numsorttop() {
    var h_id = document.getElementById('h_id').value;
    var times = document.getElementById('times').value;
    var timee = document.getElementById('timee').value;
    var k = 'a';
    var find=val;
    console.log(find);

    $.ajax({
        type: "post",
        dataType: "json",
        data: {
            h_id: h_id,
            times:times,
            timee:timee,
            k:k,
            find: find
        },
        url: "searchHotel",
        success: function(data) {

            console.log(data);
            //更新到右边的销售详情表
            $('#saleDetail').html('');
            //动态创建元素
            console.log(data.detail.length);
            for(var i = 0; i < data.detail.length; i++) {
                var tr = $('<tr></tr>');
                var menu_name = $('<td>' + data.detail[i].menu_name + '</td>');
                var num = $('<td>' + data.detail[i].num + '</td>');
                var price = $('<td>' + data.detail[i].price + '</td>');
                var total = $('<td>' + data.detail[i].total + '</td>');
                tr.append(menu_name).append(num).append(price).append(total);
                $('#saleDetail').append(tr);
            }
        }
    });
}

function numsortlow() {
    var h_id = document.getElementById('h_id').value;
    var times = document.getElementById('times').value;
    var timee = document.getElementById('timee').value;
    var k = 'b';
    var find=val;
    console.log(find);
    
    $.ajax({
        type: "post",
        dataType: "json",
        data: {
            h_id: h_id,
            times:times,
            timee:timee,
            k:k,
            find: find
        },
        url: "searchHotel",
        success: function(data) {

            console.log(data);
            //更新到右边的销售详情表
            $('#saleDetail').html('');
            //动态创建元素
            console.log(data.detail.length);
            for(var i = 0; i < data.detail.length; i++) {
                var tr = $('<tr></tr>');
                var menu_name = $('<td>' + data.detail[i].menu_name + '</td>');
                var num = $('<td>' + data.detail[i].num + '</td>');
                var price = $('<td>' + data.detail[i].price + '</td>');
                var total = $('<td>' + data.detail[i].total + '</td>');
                tr.append(menu_name).append(num).append(price).append(total);
                $('#saleDetail').append(tr);
            }
        }
    });
}

function pricesorttop() {
    var h_id = document.getElementById('h_id').value;
    var times = document.getElementById('times').value;
    var timee = document.getElementById('timee').value;
    var k = 'c';
    var find=val;
    console.log(find);
    
    
    $.ajax({
        type: "post",
        dataType: "json",
        data: {
            h_id: h_id,
            times:times,
            timee:timee,
            k:k,
            find: find
        },
        url: "searchHotel",
        success: function(data) {

            console.log(data);
            //更新到右边的销售详情表
            $('#saleDetail').html('');
            //动态创建元素
            console.log(data.detail.length);
            for(var i = 0; i < data.detail.length; i++) {
                var tr = $('<tr></tr>');
                var menu_name = $('<td>' + data.detail[i].menu_name + '</td>');
                var num = $('<td>' + data.detail[i].num + '</td>');
                var price = $('<td>' + data.detail[i].price + '</td>');
                var total = $('<td>' + data.detail[i].total + '</td>');
                tr.append(menu_name).append(num).append(price).append(total);
                $('#saleDetail').append(tr);
            }
        }
    });
}

function pricesortlow(){
    var h_id=document.getElementById('h_id').value;
    var times = document.getElementById('times').value;
    var timee = document.getElementById('timee').value;
    var k='d';
    var find=val;
    console.log(find);
    
    $.ajax({
        type: "post",
        dataType: "json",
        data: {
            h_id: h_id,
            times:times,
            timee:timee,
            k:k,
            find: find
        },
        url: "searchHotel",
        success: function(data) {

            console.log(data);
            //更新到右边的销售详情表
            $('#saleDetail').html('');
            //动态创建元素
            console.log(data.detail.length);
            for(var i = 0; i < data.detail.length; i++) {
                var tr = $('<tr></tr>');
                var menu_name = $('<td>' + data.detail[i].menu_name + '</td>');
                var num = $('<td>' + data.detail[i].num + '</td>');
                var price = $('<td>' + data.detail[i].price + '</td>');
                var total = $('<td>' + data.detail[i].total + '</td>');
                tr.append(menu_name).append(num).append(price).append(total);
                $('#saleDetail').append(tr);
            }
        }
    });
}