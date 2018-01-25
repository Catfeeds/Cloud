var Global_selectedHotelId = {};
var Global_checkedCounts = 0;
$("#confirmAdsAdd").click(function() {

    var issubmit=document.getElementById("is_submit");
    issubmit.value="1"
    //$("#addInforForm").attr("action", "add");
});
$("#confirmAdsSave").click(function() {
    var issubmit=document.getElementById("is_submit");
    issubmit.value="0";
    // $('#is_submit').value('0');
});
$('#province').change(function() {
    hotelChoose();
});
$('#city').change(function() {
    hotelChoose();
});
$('#district').change(function() {
    hotelChoose();
});

function is_chooseHotel() {
    //0.先清空
    var hotelDisplayChoose = $('#hotelDisplayChoose');
    hotelDisplayChoose.addClass('hotelDisplayChoose');
    hotelChoose();
}
/**
 * 功能：展示匹配地区的餐厅
 * 流程：
 * 1.向后台提交地区参数并获取到匹配餐厅数据（只需要获取id和店名）
 * 2.展示div(#hotelDisplayChoose)并添加样式
 * 3.在表格中展示餐厅名称(id包含在input的id中)
 * */
function hotelChoose() {
    var hotelShowList = document.getElementById('hotelShow').getElementsByTagName('ul')[0];
    var li = hotelShowList.getElementsByTagName('li');
    for (var i = 0; i < li.length; i++) {
        li[i].style.display = "none";
    }
    var province = document.getElementById('province').value;
    var city = document.getElementById('city').value;
    var district = document.getElementById('district').value;
   console.log(province + "||" + city + "||" + district);
    $.ajax({
        type: 'POST',
        url: "getMatchedHotel", //待添加
        dataType: 'json',
        data: {
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
                        Global_checkedCounts++;
                        Global_selectedHotelId[$(this).attr('id')] = $(this).attr('id').replace(/,/gi, '');
                        // console.log("选中的id的JSON：" + $(this).attr('id') + ":" + Global_selectedHotelId[$(this).attr('id')]);
                        // console.log("选中个数：" + Global_checkedCounts);

                    } else if (!$(this).is(':checked')) {
                        delete Global_selectedHotelId[$(this).attr('id')];
                        Global_checkedCounts--;
                        // console.log("取消选中的id的JSON：" + $(this).attr('id') + ":" + Global_selectedHotelId[$(this).attr('id')]);
                        // console.log("选中个数：" + Global_checkedCounts);
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
    hotelTotalNumber.innerHTML = "已选餐厅数：" + Global_checkedCounts;
    //2.
    var hotelDisplayChoose = document.getElementById('hotelDisplayChoose');
    hotelDisplayChoose.classList.remove('hotelDisplayChoose');
    hotelDisplayChoose.style.display = 'none';
    //先清除旧数据
    $("#storeHotelId").val('');
    for (key in Global_selectedHotelId) {
        if($("#storeHotelId").val()=="")
        {
            var now =  Global_selectedHotelId[key];
            $("#storeHotelId").val(now);
        }
        else
        {
        var yuan = $("#storeHotelId").val();
        var now1 = yuan + ',' + Global_selectedHotelId[key];
        $("#storeHotelId").val(now1);
        }
        
    }
}

function cancelHotelChooseBtn() {
    hotelDisplayChoose.classList.remove('hotelDisplayChoose');
    hotelDisplayChoose.style.display = 'none';
}