//add 确定判断
function adsSubmit() {

	//获取参数 封装到dataJson中
	var adname = document.getElementById("adname").value;
	console.log("%s", adname);
	var starttime = document.getElementById("starttime").value;
	var endtime = document.getElementById("endtime").value;
	var adtext = document.getElementById("adtext").value;
	var adremark = document.getElementById("adremark").value;
	var adfile = document.getElementById("file").value;
	var adhref = document.getElementById("adhref").value;
	var adtitle = document.getElementById("adtitle").value;
	var adintro = document.getElementById("adintro").value;
	var activity = document.getElementById("activity").value;
	var phone = document.getElementById("phone").value;
	var adtype = document.getElementById("adtype").value;
	var vehicle = document.getElementById("vehicle").value;
	var detail = document.getElementById("detail").value;
	var province = document.getElementById("province").value;
	var city = document.getElementById("city").value;
	var district = document.getElementById("district").value;

	//标定错误提示div:/adhrefres/activityres
	var adnameres = document.getElementById("adnameres").innerHTML;
	var timeres = document.getElementById("timeres").innerHTML;
	var adtextres = document.getElementById("adtextres").innerHTML;
	var fileres = document.getElementById("fileres").innerHTML;
	var adtitleres = document.getElementById("adtitleres").innerHTML;
	var adintrores = document.getElementById("adintrores").innerHTML;
	var phoneres = document.getElementById("phoneres").innerHTML;

	if(adname == "" || starttime == "" || endtime == "" || adfile == "" || adhref == "" || adtitle == "" || adintro == "" || activity == "" || phone == "") {
		alert("请输入内容");
	} else if(adnameres != "" || timeres != "" || adtextres != "" || fileres != "" || adtitleres != "" || adintrores != "" || phoneres != "") {
		alert("请输入正确内容");
	} else {
		var confirmAdsAdd = document.getElementById('confirmAdsAdd');
		confirmAdsAdd.setAttribute('type', 'submit');
	}

}

//字段输入判断

function adnametest() {
	var content = document.getElementById("adname").value;
	var len = content.length;
	if(len == 0) {
		document.getElementById("adnameres").innerHTML = "请输入内容";
	} else if(len > 20) {
		document.getElementById("adnameres").innerHTML = "输入内容超过20字符";
	}
}

function timetest() {
	var stime = document.getElementById("starttime").value;
	var etime = document.getElementById("endtime").value;
	if(stime > etime) {
		document.getElementById("timeres").innerHTML = "请输入正确的时间";
	} else {
		document.getElementById("timeres").innerHTML = "";
	}
}

function texttest() {
	var content = document.getElementById("adtext").value;
	var len = content.length;
	if(len == 0) {
		document.getElementById("adtextres").innerHTML = "请输入内容";
	} else if(len > 20) {
		document.getElementById("adtextres").innerHTML = "输入内容超过20字符";
	}
}

function filetest() {
	var ima = document.getElementById("file").files[0];
	var imasize = ima.size;
	if(imasize > 30 * 1024) {
		document.getElementById("fileres").innerHTML = "请输入小于30KB的图片";
	} else {
		document.getElementById("fileres").innerHTML = "";
	}
}

function adtitletest() {
	var content = document.getElementById("adtitle").value;
	var len = content.length;
	if(len == 0) {
		document.getElementById("adtitle").innerHTML = "请输入内容";
	} else if(len > 20) {
		document.getElementById("adtitleres").innerHTML = "输入内容超过20字符";
	}
}

function adintrotest() {
	var content = document.getElementById("adintro").value;
	var len = content.length;
	if(len == 0) {
		document.getElementById("adintrores").innerHTML = "请输入内容";
	} else if(len > 20) {
		document.getElementById("adintrores").innerHTML = "输入内容超过20字符";
	}
}

function phonetest() {
	var usertel = document.getElementById("phone").value;
	var tel = /^1[358]\d{9}$/;
	if(tel.test(usertel) == false)
		document.getElementById("phoneres").innerHTML = "电话输入错误";
	else
		document.getElementById("phoneres").innerHTML = "";
}

//					function hrefTest() {
//						var href = document.getElementById("adhref").value;
//						console.log("%s", href);
//						var regUrl = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
//						var res = regUrl.test(href);
//						console.log("%s", res);
//						if(res == true) {
//							alert("yes");
//						} else if(res == false) {
//							alert("false");
//						}
//					}

function AJ() {
	var obj;
	if(window.XMLHttpRequest) obj = new XMLHttpRequest();
	else if(window.ActiveXObject) {
		try {
			obj = new ActiveXObject('MSXML2.XMLHTTP.3.0');
		} catch(er) {
			try {
				obj = new ActiveXObject("Microsoft.XMLHTTP");
			} catch(er) {
				obj = false;
			}
		}
	}
	return obj;
}

function isThere() {
	var RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	var adhref = document.getElementById("adhref").value;
	var adhrefres= document.getElementById("adhrefres");
	console.log("%s", adhref);
	console.log("%s", RegExp.test(adhref));
	if(RegExp.test(adhref) == true) {

		var req = new AJ(); // XMLHttpRequest object
		try {
			req.open("HEAD", adhref, false);
			req.send(null);
			if(req.status == 200) {
				adhrefres.innerHTML="";
//				alert("yes");
			} else {
				adhrefres.innerHTML="请输入正确链接";
//				alert("false");
			}
		} catch(er) {
			adhrefres.innerHTML="请输入正确链接";
//			alert("false");
		}
	} else {
		adhrefres.innerHTML="请输入正确链接";
//		alert("false");
	}
}