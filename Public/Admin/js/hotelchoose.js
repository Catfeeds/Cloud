var Global_selectedHotelId = {};
var Global_selectedOrgId = {};
var Global_checkedCounts = 0;
var all_checked = '';
var orgAllChoose = true;
var is_click = false;
$(document).ready(function() {
    $.ajax({
        type: 'GET',
        url: "getAllOrg",
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                Global_selectedOrgId[data[i].id] = data[i].id;
            }
            getOrgId();
            orgIds = $("#storeOrgId").val();
            // console.log("getAllorg中orgIds:" + orgIds);
        },
        error: function(data) {
            console.log("选择失败！");
        }
    });
});
//提交按钮
$("#confirmAdsAdd").click(function() {

    var issubmit = document.getElementById("is_submit");
    issubmit.value = "1";
    adsSubmit();
    $("#addInforForm").attr("action", "add");
});
//保存按钮
$("#confirmAdsSave").click(function() {
    var issubmit = document.getElementById("is_submit");
    issubmit.value = "0";
    $('#is_submit').value('0');
    $("#addInforForm").attr("action", "add");
});
//取消选择机构
$('#cancelBtn1').click(function() {
    cancelChoose();
});
//取消选择餐厅
$('#cancelBtn3').click(function() {
    //清空选择
    $('#slHotelShowList').html('');
    //退选所有复选框
    $("#hotelShowList input[type=checkbox]").each(function() {
        $(this).prop('checked', false);
    });
    Global_selectedOrgId = {};
    Global_selectedHotelId = {};
    Global_checkedCounts = 0;
    all_checked = false;
    cancelChoose();
});
//选择机构
$('#orgChooseBtn').click(function() {
    is_click = true;
    cancelChoose();
    $('#storeOrgId').html('');
    //右边两个取消
    //cancelChooseHotel();
    if ($('#psnorg').is(':checked')) {
        if ($('#orgDisplayChoose').hasClass('displayChoose')) {
            cancelChoose();
            orgChoose();
            checkIsSlAllOrg();
        } else {
            var orgDisplayChoose = $('#orgDisplayChoose');
            orgDisplayChoose.addClass('displayChoose');
            $('#orgAllChoose').prop('checked', false);
            orgChoose();
            checkIsSlAllOrg();
        }
    } else {
        //隐藏选项
        cancelChoose();
        getAllOrg();
    }

});
//选完机构按钮
$('#confirmOrgChoose').click(function() {
    cancelChoose();
    //统计orgId
    getOrgId();
});
//选完地区和机构后确定(查询餐厅)
$("#chooseHotelBtn").click(function() {
    //折叠连锁机构选择
    orgDisplayChoose.classList.remove('displayChoose');
    orgDisplayChoose.style.display = 'none';
    hotelChoose();
    checkIsSlAll();
});
//选完餐厅后确定
$('#confirmBtn').click(function() {
    confirmHotelChoose();
    //关闭两个弹窗
    cancelChoose();
});
//省市区变化
$('#province').change(function() {
    if ($('#hotelDisplayChoose').css('display') != 'none') {
        hotelChoose();
    }
});
$('#city').change(function() {
    if ($('#hotelDisplayChoose').css('display') != 'none') {
        hotelChoose();
    }
});
$('#district').change(function() {
    if ($('#hotelDisplayChoose').css('display') != 'none') {
        hotelChoose();
    }
});


//已选餐厅回显
//后台传回选择历史
//编辑页面
function checkIsHotelEmpty() {
    var idlist = $("#selectedHotelId").attr("value");
    // console.log(idlist);
    if (idlist) {
        var list = idlist.split(",");
        for (var i = 0; i < list.length; i++) {
            Global_selectedHotelId[list[i]] = list[i];
        }
    }
}

/**
 * 功能：展示所有机构
 * 流程：
 * 1.展示div(#hotelDisplayChoose)并添加样式
 * 
 * 2.在表格中多选框展示机构名称(id包含在input的id中)
 * */
function orgChoose() {
    // var orgDisplayChoose = $('#orgDisplayChoose');
    // orgDisplayChoose.addClass('displayChoose');
    // $('#orgAllChoose').attr('checked', false);
    var orgShowList = document.getElementById('orgShow').getElementsByTagName('ul')[0];
    orgShowList.innerHTML = "";
    $.ajax({
        type: 'POST',
        url: "getAllOrg",
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                var li = document.createElement('li');
                var label = document.createElement('label');
                label.classList.add('checkbox-inline');
                var input = document.createElement('input');
                input.setAttribute('type', 'checkbox');
                input.setAttribute('id', data[i].id);
                input.setAttribute('value', 'option1');
                if (Global_selectedOrgId[data[i].id]) {
                    input.checked = true;
                }
                input.classList.add('click_checkbox');
                var span = document.createElement('span');
                span.innerHTML = data[i].org_name;
                label.appendChild(input);
                label.appendChild(span);
                li.appendChild(label);
                orgShowList.appendChild(li);
            }
            $("#orgShowList input[type=checkbox]").each(function() {
                $(this).on('click', function() {
                    if ($(this).is(':checked')) {
                        checkIsSlAllOrg();
                        Global_selectedOrgId[$(this).attr('id')] = $(this).attr('id').replace(/,/gi, '');
                        //console.log("选中的id的JSON：" + $(this).attr('id') + ":" + Global_selectedOrgId[$(this).attr('id')]);
                    } else if (!$(this).is(':checked')) {
                        orgAllChoose = false;
                        $('#orgAllChoose').prop('checked', false);
                        //console.log("取消选中的id的JSON：" + $(this).attr('id') + ":" + Global_selectedOrgId[$(this).attr('id')]);
                        delete Global_selectedOrgId[$(this).attr('id')];
                    }

                });
            });
        },
        error: function(data) {
            console.log("选择失败！");
        }
    });
}
/**/

/**
 * 功能：展示匹配地区和机构的餐厅
 * 流程：
 * 1.向后台提交地区参数并获取到匹配餐厅数据（只需要获取id和店名）
 * 2.展示div(#hotelDisplayChoose)并添加样式
 * 3.在表格中展示餐厅名称(id包含在input的id中)
 * */
function hotelChoose() {
    checkIsHotelEmpty();

    var hotelDisplayChoose = $('#hotelDisplayChoose');
    hotelDisplayChoose.addClass('displayChoose');
    $('#hotelAllChoose').attr('checked', false);
    //右边已选餐厅展示
    $('#selectedHotel').addClass('displayChoose');

    var hotelShowList = document.getElementById('hotelShow').getElementsByTagName('ul')[0];
    hotelShowList.innerHTML = "";


    var province = document.getElementById('province').value;
    var city = document.getElementById('city').value;
    var district = document.getElementById('district').value;
    //统计机构ID
    if (is_click == false) {
        // console.log('情况：默认下的全部');
        // console.log('默认下:' + orgIds);
    } else {
        getOrgId();
    }
    // console.log(province + "||" + city + "||" + district);
    var orgIds = $('#storeOrgId').val();
    // console.log('分情况之后:' + orgIds);
    $.ajax({
        type: 'POST',
        url: "getHotel",
        // url: "getMatchedHotel",
        dataType: 'json',
        data: {
            "orgIds": orgIds,
            "province": province,
            "city": city,
            "district": district
        },
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                var li = document.createElement('li');
                var label = document.createElement('label');
                label.classList.add('checkbox-inline');
                var input = document.createElement('input');
                input.setAttribute('type', 'checkbox');
                input.setAttribute('id', data[i].id);
                input.setAttribute('value', 'option1');
                if (Global_selectedHotelId[data[i].id]) {
                    input.checked = true;
                    chosenHotelList(data[i].id, data[i].h_name);
                }
                input.classList.add('click_checkbox');
                var span = document.createElement('span');
                span.innerHTML = data[i].h_name;
                label.appendChild(input);
                label.appendChild(span);
                li.appendChild(label);
                hotelShowList.appendChild(li);
            }
            $("#hotelShowList input[type=checkbox]").each(function() {
                $(this).on('click', function() {
                    if ($(this).is(':checked')) {
                        $(this).prop('checked', true);
                        //检查是否全部选中
                        checkIsSlAll();
                        Global_selectedHotelId[$(this).attr('id')] = $(this).attr('id').replace(/,/gi, '');
                        // console.log("选中的id的JSON：" + $(this).attr('id') + ":" + Global_selectedHotelId[$(this).attr('id')]);
                        // console.log("选中个数：" + Global_checkedCounts);
                        //动态添加
                        var slhotelId = $(this).attr('id');
                        var slhotelName = $(this).parents('label').find('span').text();

                        chosenHotelList(slhotelId, slhotelName);
                    } else if (!$(this).is(':checked')) {
                        //取消全选选中
                        all_checked = false;
                        $('#hotelAllChoose').prop('checked', false);
                        delete Global_selectedHotelId[$(this).attr('id')];
                        // Global_checkedCounts--;
                        // console.log("取消选中的id的JSON：" + $(this).attr('id') + ":" + Global_selectedHotelId[$(this).attr('id')]);
                        // console.log("选中个数：" + Global_checkedCounts);
                        //从右边ul(slHotelShowList)中remove li
                        var span = $('#sl' + $(this).attr('id')).parent().parent().remove();
                        Global_checkedCounts--;
                        $('#slhotelNum').val(Global_checkedCounts);
                    }
                });
            });
        },
        error: function(data) {
            console.log("选择失败！");
        }
    });
}


/**
 * 功能：提交后台所选餐厅
 * 流程：
 * 1.统计选定多选框的个数，写入(#hotelTotalNumber)中,即已选餐厅个数
 * 2.以上数据获取后，弹窗撤销类并隐藏
 * */
function confirmHotelChoose() {
    //1.
    var labels = document.getElementsByClassName('checkbox-inline');
    var hotelTotalNumber = document.getElementById('hotelTotalNumber');

    //2.
    var hotelDisplayChoose = document.getElementById('hotelDisplayChoose');
    hotelDisplayChoose.classList.remove('displayChoose');
    hotelDisplayChoose.style.display = 'none';

    $('#orgDisplayChoose').css('display', 'none');
    //统计餐厅Id
    //先清除旧数据
    getHotelId();
    // var storeHotelId=$('#storeHotelId').val();
    // console.log($("#storeHotelId").val().split(','));
    // if ($("#storeHotelId").val().split(',') == '')
    //     Global_checkedCounts = 0;
    // else Global_checkedCounts = $("#storeHotelId").val().split(',').length;
    // hotelTotalNumber.innerHTML = "已选餐厅数：" + Global_checkedCounts;
}


function cancelChoose() {
    $('#orgDisplayChoose').removeClass('displayChoose');
    $('#orgDisplayChoose').css('display', 'none');
    $('#hotelDisplayChoose').removeClass('displayChoose');
    $('#hotelDisplayChoose').css('display', 'none');
    $('#selectedHotel').removeClass('displayChoose');
    $('#selectedHotel').css('display', 'none');
}

function cancelChooseHotel() {
    $('#hotelDisplayChoose').removeClass('displayChoose');
    $('#hotelDisplayChoose').css('display', 'none');
    $('#selectedHotel').removeClass('displayChoose');
    $('#selectedHotel').css('display', 'none');
}



//统计hotelId
function getHotelId() {
    $("#storeHotelId").val('');
    for (key in Global_selectedHotelId) {
        if ($("#storeHotelId").val() == "") {
            var now = Global_selectedHotelId[key];
            $("#storeHotelId").val(now);
        } else {
            var yuan = $("#storeHotelId").val();
            var now1 = yuan + ',' + Global_selectedHotelId[key];
            $("#storeHotelId").val(now1);
        }
    }
}

//机构全选
$('#orgAllChoose').click(function() {
    if ($(this).is(':checked')) {
        orgAllChoose = true;
        //其他所有都选中
        $("#orgShowList label input[type=checkbox]").each(function() {
            $(this).prop('checked', true);
            //填充Global_selectedOrgId
            Global_selectedOrgId[$(this).attr('id')] = $(this).attr("id");
        });
    } else if (!$(this).is(':checked')) {
        orgAllChoose = false;
        $("#orgShowList label input[type=checkbox]").each(function() {
            $(this).prop('checked', false);
            //清空Global_Global_selectedOrgId
            delete Global_selectedOrgId[$(this).attr('id')];
        });
    }
});

//餐厅全选
$('#hotelAllChoose').on('click', function() {
    if ($(this).is(':checked')) {
        all_checked = true;
        //其他所有都选中
        $("#hotelShowList label input[type=checkbox]").each(function() {
            $(this).prop('checked', true);
            //添加到右边已选餐厅框
            var slhotelId = $(this).attr('id');
            var slhotelName = $(this).parents('label').find('span').text();
            Global_checkedCounts++;
            var num = Global_checkedCounts;
            var li = $('<li></li>');
            // var numspan = $("<span>" + num + ".&nbsp" + "</span>");
            var hotel = $("<span id='sl" + slhotelId + "'>" + slhotelName + "</span>");
            var button = $("<a class='delSlHotel'>删除</a>");
            button.click(function() {
                //调用删除函数
                show_confirm($(this));
                // slhotelDelete($(this));
            });
            var label = $("<label class='sl_hotel'></label>");
            // console.log("选中的hotel的id和名字" + slhotelId + "||" + slhotelName);
            // label.append(numspan);
            label.append(hotel);
            label.append(button);
            li.append(label);
            $('#slHotelShowList').append(li);
            //填充Global_selectedHotelId
            Global_selectedHotelId[$(this).attr('id')] = $(this).attr("id");
        });
    } else if (!$(this).is(':checked')) {
        $("#hotelShowList label input[type=checkbox]").each(function() {
            $(this).prop('checked', false);
            //移除全部
            $('#slHotelShowList').html('');
            Global_checkedCounts = 0;
            //清空Global_Global_selectedOrgId
            delete Global_selectedHotelId[$(this).attr('id')];
        });
    }
});

function show_confirm(btn) {
    var result = confirm('是否删除！');
    if (result) {
        slhotelDelete(btn);
    } else {
        alert('不删除！');
    }
}
//从已选餐厅列表中删除
function slhotelDelete(btn) {
    //获取当前元素兄弟元素id和val
    var hotel = btn.prev();
    // console.log(btn.attr('class'));
    var h_id = hotel.attr('id').substring(2);
    // console.log(h_id);
    var h_name = hotel.val();
    //撤出
    hotel.parent().parent().remove();
    //还要取消左边框中的按钮
    $('#hotelShowList label input[id=' + h_id + ']').prop('checked', false);
    //并且置all_checked为false
    all_checked = false;
    //并且置全选框选中状态
    $('#hotelAllChoose').prop('checked', false);

}
//检测全选状态
function checkIsSlAll() {
    //是否所有
    // alert("进入检查");
    $("#hotelShowList input[type=checkbox]").each(function() {
        if (!$(this).is(':checked')) {
            console.log($(this).attr('id'));
            all_checked = false;
            return false;
        }
        all_checked = true;
    });

    // console.log("checkIsSlAll:" + all_checked);
    //全选
    if (all_checked) {
        $('#hotelAllChoose').prop('checked', true);
        console.log("全选选中");
    } else {
        $('#hotelAllChoose').prop('checked', false);
    }
}

function checkIsSlAllOrg() {
    //是否所有
    // alert("进入检查");
    $("#orgShowList input[type=checkbox]").each(function() {
        if (!$(this).is(':checked')) {
            console.log($(this).attr('id'));
            orgAllChoose = false;
            return false;
        }
        orgAllChoose = true;
    });

    // console.log("orgAllChoose:" + orgAllChoose);
    //全选
    if (orgAllChoose) {
        $('#orgAllChoose').prop('checked', true);
        console.log("全选选中");
    } else {
        $('#orgAllChoose').prop('checked', false);
    }
}


//统计orgId
function getOrgId() {
    $("#storeOrgId").val('');
    // console.log('在getOrgId中：');
    for (key in Global_selectedOrgId) {
        // console.log(Global_selectedOrgId[key]);
        if ($("#storeOrgId").val() == "") {
            var now = Global_selectedOrgId[key];
            $("#storeOrgId").val(now);
        } else {
            var yuan = $("#storeOrgId").val();
            var now1 = yuan + ',' + Global_selectedOrgId[key];
            $("#storeOrgId").val(now1);
        }
    }
    orgIds = $("#storeOrgId").val();
}

function getAllOrg() {
    $.ajax({
        type: 'GET',
        url: "getAllOrg",
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                Global_selectedOrgId[data[i].id] = data[i].id;
            }
            getOrgId();
            orgIds = $("#storeOrgId").val();
            console.log("getAllorg中orgIds:" + orgIds);
        },
        error: function(data) {
            console.log("选择失败！");
        }
    });
}

function chosenHotelList(id, name) {
    var slhotelId = id;
    var slhotelName = name;
    var li = $('<li></li>');
    // var numspan = $("<span>" + num + ".&nbsp" + "</span>");
    var hotel = $("<span id='sl" + slhotelId + "'>" + slhotelName + "</span>");

    var button = $("<a class='delSlHotel'>删除</a>");
    var in_label = $("<label class='sl_hotel'></label>");
    // console.log("选中的hotel的id和名字" + slhotelId + "||" + slhotelName);
    // label.append(numspan);
    button.click(function() {
        //调用删除函数
        // slhotelDelete($(this));
        show_confirm($(this));
    });
    in_label.append(hotel);
    in_label.append(button);
    li.append(in_label);
    $('#slHotelShowList').append(li);
}