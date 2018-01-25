var Global_chosedHotelArray = [];

function isGetHotel() {
    var hotelDisplayChoose = document.getElementById('hotelDisplayChoose');
    var liNum = hotelDisplayChoose.getElementsByTagName('li').length;
    if (liNum == 0) {
        hotelChoose();
    }
}
/**
 * 功能：展示匹配地区的餐厅
 * 流程：
 * 1.向后台提交地区参数并获取到匹配餐厅数据（只需要获取id和店名）
 * 2.展示div(#hotelDisplayChoose)并添加样式
 * 3.在表格中展示餐厅名称(id包含在input的id中)
 * */
function hotelChoose() {

    //1.
    var province = document.getElementById('province').value;
    var city = document.getElementById('city').value;
    var district = document.getElementById('district').value;
    //2.
    //弹窗：#hotelDisplayChoose
    var hotelDisplayChoose = document.getElementById('hotelDisplayChoose');
    hotelDisplayChoose.classList.add('hotelDisplayChoose');

    $.ajax({
        type: 'POST',
        url: 'getMatchedHotel', //待添加
        dataType: 'json',
        data: {
            province: province,
            city: city,
            district: district
        },
        success: function(data) {
            //3.
            //弹窗内的ul：#hotelShowList，循环添加li,三个一行
            var hotelShowList = document.getElementById('hotelShow').getElementsByTagName('ul')[0];
            for (var attr in data) {
                for (var i = 0; i < data[attr].length; i++) {
                    var li = document.createElement('li');
                    var label = document.createElement('label');
                    label.classList.add('checkbox-inline');
                    var input = document.createElement('input');
                    input.setAttribute('type', 'checkbox');
                    input.setAttribute('id', data[attr][i].id);
                    input.setAttribute('value', 'option1');
                    var span = document.createElement('span');
                    span.innerHTML = data[attr][i].h_name;
                    label.appendChild(input);
                    label.appendChild(span);
                    li.appendChild(label);
                    hotelShowList.appendChild(li);
                }
            }
        },
        error: function() {
            var data = {
                "2": [{
                    "id": "1",
                    "h_name": "肯德基"
                }, {
                    "id": "2",
                    "h_name": "麦当劳"
                }, {
                    "id": "3",
                    "h_name": "必胜客"
                }, {
                    "id": "4",
                    "h_name": "呷哺呷哺"
                }, {
                    "id": "5",
                    "h_name": "厘米鸡"
                }]
            };
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
    var checked_counts = 0;
    for (var i = 0; i < labels.length; i++) {
        var input = labels[i].getElementsByTagName('input')[0];
        if (input.checked == true) {
            checked_counts++;
            Global_chosedHotelArray.push(input.id);
        }
    }
    var hotelTotalNumber = document.getElementById('hotelTotalNumber');
    hotelTotalNumber.innerHTML = "已选餐厅数：" + checked_counts;
    //2.
    var hotelDisplayChoose = document.getElementById('hotelDisplayChoose');
    hotelDisplayChoose.classList.remove('hotelDisplayChoose');
    hotelDisplayChoose.style.display = 'none';

    console.log(Global_chosedHotelArray);

}

function cancelHotelChooseBtn() {
    hotelDisplayChoose.classList.remove('hotelDisplayChoose');
    hotelDisplayChoose.style.display = 'none';
}
/**
 * 方法名：adsSubmit
 * 所在文件：addinput.js
 * 功能：确定提交
 * 内容：part1:form中的name值，part2:匹配餐厅id数组Global_chosedHotelArray
 */
/**
 * 功能：确定保存
 * 内容：part1:form中的name值，part2:匹配餐厅id数组Global_chosedHotelArray以及标志位
 * 备注：不需验证
 */
    //不加验证
function adsSave() {
    console.log("保存");
    var data = {
        "chosedHotelArray": Global_chosedHotelArray,
        "is_submit": 0
        };
        $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'save',
        data: data,
        success: function(data) {
            console.log(data);
        console.log("保存成功");
        },
        error: function() {
        alert("咋的了呢？！");
        }
        });
}
        /**
        * 方法名：checkAction
        * 功能：动态改变form的action
        */
        function checkAction() {
        $("#confirmAdsAdd").click(function() {
        $("#addInforForm").attr("action", "{:U('add')}");
        adsSubmit();
        });
        $("#confirmAdsSave").click(function() {
        $("#addInforForm").attr("action", "{:U('save')}");
        adsSave();
        });
        }