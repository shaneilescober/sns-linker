var page=1;
var storedImgId = 'google';
var src = '/_sdk/img/snslinkwidget/google_logo.jpg';
var img_in_container = '/_sdk/img/snslinkwidget/google_logo.jpg';
var show_rows = $('#per_select').val();
var iAction = 0;

$(document).ready(function(){
	//Default 
	oValidator.setFieldErrorMsg('linkadd', 'isUrl', 'Invalid URL.');
	$('#' + storedImgId).css('border', '3px solid #77C2D7');
	$("#imgPreview").html("<img src = '" + src + "'/>");

	if(iAction == 1){
		$("#selectedImg_container").html("<img src = '" + img_in_container + "'/>");
		$('#sel_image').val(img_in_container);
	}
	
	
	//Gets value of how many number of rows user wants to see at once
	$("#per_select").change(function(){
		show_rows = $('#per_select').val();
		window.location.href = usbuilder.getUrl('adminPageSnsLinkerList') + '&rows=' + show_rows;
	});
	
	//save add or modify
	$("#save-setup").click(function(){ 	
		if(oValidator.formName.getMessage("save")){
			$('[name=save]').submit();
		}
	});
	
	$("#save-modify").click(function(){ 
		if(oValidator.formName.getMessage("saveModified")){
			$('[name=saveModified]').submit();
		}
	});

	//slide main setup
	$("#global-button").click(function(){
		$("#global-settings").slideToggle("slow");
	});
	
	//check all for delete
	$("#check_all").click(function(){
		var ifCheck = $("#check_all:checked").val();
		
		if(ifCheck == "on"){
			$("[name=aCbox]").attr("checked",true);
		}else{
			$("[name=aCbox]").attr("checked",false);
		}
	});
	
	//save main settings
	$("#save-global").click(function(){
		if(oValidator.formName.getMessage("snslinker_form")){
			$('[name=snslinker_form]').submit();
		}
	});
});

var PLUGIN_Snslinkadv_Setup = {
	action: function(act) {
		var a = act;
		iAction = a;
	},
	
	//Popup for choosing images
	show_popUp_img: function(){
		sdk_popup.load('sdk_snslinker_selectImg').skin('admin').layer({
			'title' : 'Select an Image',
			'width' : 500,
			'classname': 'ly_set ly_editor'
		});
	},
	
	//Close popup of deleting a link
	close_popup: function(){
		sdk_popup.close('sdk_simplesample_delete_popup');
	},
	
	//Shows popup for confirmation before deleting link
	show_popUp: function(){
		sdk_popup.load('sdk_simplesample_delete_popup').skin('admin').layer({
			'title' : 'Delete',
			'width' : 250,
			'classname': 'ly_set ly_editor'
		});
	},
	
	//Shows borders and assigns preview of selected image
	selectImg: function(img){
		
		if(storedImgId != img){
			$('#' + storedImgId).css('border', 'none');
			$('#' + img).css('border', '3px solid #77C2D7');
			
			src = $('#' + img).attr("src");
			$("#imgPreview").html("<img src = '" + src + "'/>");
		}
		storedImgId = img;
		img_in_container = src;
	},
	
	//Deleting a link
	delete_list: function(){
		var val = "";
		var seq = $('[name=seq]').val();
		$(':checkbox:checked').each(function(i){
			val += $(this).val() + ",";
		});
		
		var sUrl = usbuilder.getUrl('apiDeleteLink');
		$.ajax({
			dataType: 'json',
			type: 'GET',
			data: "data=" + val,
			url: sUrl,
			success: function(info){
				if(info.Data === true){
					sdk_popup.close('sdk_simplesample_delete_popup');
					window.location.href = usbuilder.getUrl('adminPageSnsLinkerList') + '&seq=' + seq;
					$('.msg_suc_box').css('display', 'block');
				}
			}, error: function(e, xhr){
				alert("error");
			}
		});
	},
	
	//Saves selected image and closes popup
	imageChoice: function() {
		$("#selectedImg_container").html("<img src = '" + img_in_container + "'/>");
		sdk_popup.close('sdk_snslinker_selectImg');
		$('#sel_image').val(img_in_container);
	},
	
	def: function(){
		var default_count = 1;
		var default_title = "Snslinker";
		var default_desc = "Description here";
		var default_template = 1;
		
		$("[name='count_image']").val(default_count);
		$("[name='global_title']").val(default_title);
		$("#global_content").val(default_desc);
		$("#snslinkadv_template"+default_template).attr("checked","checked");
	},


	updateMain:function(result){
		
		var bSubmited = result;
			if(bSubmited === true){
				$(".msg_suc_box").show();//("fast",function() {
				//$(".msg_suc_box").delay(2000).slideUp("fast");
				//});
			
				
			}
			//else{
			//	alert("No change had been made");
			//}
	
	},
	
	search: function(){
			var sUrl = usbuilder.getUrl('apiSearch');
			var search_key = $("#search-key").val();
			var seq = $('[name=seq]').val();
			
			window.location.href = usbuilder.getUrl('adminPageSnsLinkerList') + '&seq=' + seq + '&search_key=' + search_key;
	},
	changeIframe : function(action, value, time){
		time = time != undefined ? time : 0;
		if (action == "auto"){
			setTimeout(function(){
				var selector = value && value != null ? $(value) : $("body").children(":first");
				var iframe = parent.document.getElementById('plugin_contents');
				documentHeight = Math.max(iframe.scrollHeight, iframe.clientHeight)
				parent.iframeHeight(parent.document.getElementById('plugin_contents'), (selector.height() - documentHeight));
			}, time);	
		}
		else {
			var body = document.body, html = document.documentElement;
			var documentHeight = Math.max(body.offsetHeight, html.clientHeight, html.offsetHeight);
			if (action == "add"){
				setTimeout(function(){
					parent.iframeHeight(parent.document.getElementById('plugin_contents'), ((documentHeight + parseInt(value)) - documentHeight)); 
				}, time);
			}
			else {
				setTimeout(function(){
					parent.iframeHeight(parent.document.getElementById('plugin_contents'), (documentHeight - (documentHeight + ((parseInt(value) * 2) - 10)))); 
				}, time);
			}
		}
	},
	callBackSearch: function(result){
		//PLUGIN_Snslinkadv_Setup.changeIframe("auto");
		if(result.delete_flag){
			if(result.delete_flag == 1){
			$("#popup").empty();
			$("#popup").append("<center>Item deleted.</center><br>")
			$("#popup").append('<center><input class="btn_apply" type="button" value="Ok" onclick="PLUGIN_Snslinkadv_Setup.close_popup();"/></center>');
				$("#popup").popUp({
					width: 300
					
					});
					
			}
		
		}
		
			
		var PLUGIN_URL = $("#PLUGIN_URL_IMG").val();
		var counter =1;
		
		$("#sorting-area").empty();
			$("#iTotal").empty();
			$("#paging").empty();
			
		$.each(result.data,function(key,val){
		
			var bImageFlag = val['ps_image_flag']
		
			//if(bImageFlag == 1){
			//	var dir = "upload";
			//}else{
			//	var dir = "images";
			//}
			
			var sDataString ="";
			sDataString +='<tr><td><input type="checkbox" name ="sns_checked[]" value="'+val['ps_idx']+'" /></td>';
			sDataString +='<td>'+((result.per_page * (result.pageReal-1))+counter)+'</td><td>'+val['ps_title']+'</td>';
			sDataString +='<td>'+val['ps_regdate']+'</td><td><img src="'+PLUGIN_URL+val['ps_image']+'" width="22px" height="22px"/></td>';
			sDataString +='<td>'+val['ps_link_address']+'</td>';
			sDataString +='<td><a href="#" onclick="PLUGIN_Snslinkadv_Setup.modify('+val['ps_idx']+')">Modify</a></td></tr>';
	
			$("#sorting-area").append(sDataString);
			counter++;
		PLUGIN_Snslinkadv_Setup.changeIframe("auto", "#plugin_container", 100);
		});
	
		var CountList = result.count;
		
		$("#paging").append(result.pagination);
		$("#iTotal").append(CountList);
		$(".msg_suc_box").hide();
		//
		
		$("#check_all").removeAttr("checked");
		
		if(CountList == 0){
		
		$("#sorting-area").append("<tr><td colspan='6'>(0) Results found</td></tr>")
		$("#iTotal").hide();
		PLUGIN_Snslinkadv_Setup.changeIframe("auto", "#plugin_container", 100);
		}
		
		//$("#hKeyword").val(CountList);
		//PLUGIN_Snslinkadv_Setup.changeIframe("auto");
	},
	
	
	//change tpl for modify
	modify: function(idx){
		var seq = $('[name=seq]').val();
		var id = idx;
		window.location.href = usbuilder.getUrl('adminPageSnsLinkerModifyLink') + '&seq=' + seq + '&idx=' + id;
	},
	
	display: function(page,per_page,process){
	
	var process = "";
	
	var PLUGIN_URL = $("#PLUGIN_URL").val();
	window.location.href = ''+PLUGIN_URL+'content.php?process='+process+'&paging='+page+'&per_page='+per_page+'&disable=""';
	
	},
	
	toogle : function(evt)
	{
		
		//var process = "toggle";
		var PLUGIN_URL = $("#PLUGIN_URL").val();
		
		var flag = 'SORT';
		var mode = $(evt).attr("id");
		var mode_name = $(evt).attr("class");
		//var iNum = $("#iNum").val();
		
		if(mode_name == 'title')
		{
			if(mode == 1){
				$("#list-title-down").show();
				$("#list-title-up").hide();
				var sort_field = 'ps_title';
				var sort = 'DESC';

				$("#list-reg-down").hide();
				$("#list-reg-up").show();
			}else{
				$("#list-title-down").hide();
				$("#list-title-up").show();
				var sort_field = 'ps_title';
				var sort = 'ASC';

				$("#list-reg-up").hide();
				$("#list-reg-down").show();
			}
		}else{
			if(mode == 1){
				$("#list-reg-down").hide();
				$("#list-reg-up").show();
				var sort_field = 'ps_regdate';
				var sort = 'ASC';

				$("#list-title-down").show();
				$("#list-title-up").hide();
			}else{
				$("#list-reg-up").hide();
				$("#list-reg-down").show();
				var sort_field = 'ps_regdate';
				var sort = 'DESC';

				$("#list-title-down").hide();
				$("#list-title-up").show();
			}
		}

		
	var rowCount = $("input:[name='rowCount']").val();
	var useridx = $("#User_idx").val();
	var per_page =$("#per_select").val();
	var hpageNum =$("#hpageNum").val();
	var totalRows = $("#rowCount").val();
	var startDate =$("#startDate").val();
	var endDate =$("#endDate").val();
	process = $("#hprocess").val();
	
	
	var PLUGIN_URL = $("#PLUGIN_URL").val();
	var pNode = $("#PLUGIN_Snslinkadv");
	var sUrl = PLUGIN_URL+"exec/execSort.php";
	
	var hKeyword = $("#hKeyword").val();
	
	var aData = new Array(useridx,page,per_page,sort,sort_field,hpageNum,hKeyword,startDate,endDate,process);
	
	var mData = { url: sUrl, Data: aData};
	PLUGIN.post(pNode, mData , 'custom' , 'json',  PLUGIN_Snslinkadv_Setup.callBackSearch);	
	},
	
	validatefile: function (file)
	{
	var extensions = new Array("jpg","jpeg","gif","png","bmp");
	var type = false;
	var length = file.length;
	var pos = file.lastIndexOf('.') + 1;
	var ext = file.substring(pos, length);
	var final_ext = ext.toLowerCase();
	for (i = 0; i < extensions.length; i++){
		if(extensions[i] == final_ext){
			type = true;
			break;
		}
	}
	return type;
},
isValidURL: function (url){
    var RegExp = /(ftp|http|https):\/\/[A-Za-z0-9\.-]{3,}\.[A-Za-z]{3}/;

    if(RegExp.test(url)){
        return true;
    }else{
        return false;
    }
},
	per_page: function(useridx,per_page){
	
	$("#sorting-area").empty();
		$("#iTotal").empty();
		$("#paging").empty();
		
			var PLUGIN_URL = $("#PLUGIN_URL").val();
			var pNode = $("#PLUGIN_Snslinkadv");
			var sUrl = PLUGIN_URL+"exec/execPerpage.php";

			var mData = { url: sUrl, useridx: useridx, per_page:per_page };
		
			PLUGIN.post(pNode, mData , 'custom' , 'json',  PLUGIN_Snslinkadv_Setup.callBackSearch)	



	},
	displayTog : function(page,per_page,rowCount,process,Keyword,startDate,endDate,SearchField){
	
	
	
	var sObject = {
		'paging': page,
		'process' : process,
		'searchField' : SearchField,
		'keyword':Keyword,
		'startDate' : startDate,
		'endDate': endDate,
		'per_page': per_page
		}
	
		var recursiveEncoded = $.param(sObject);
	
	
	var PLUGIN_URL = $("#PLUGIN_URL").val();
	window.location.href = ''+PLUGIN_URL+'content.php?'+recursiveEncoded;
	
	},

	
}

function implode (glue, pieces) {
    
    var i = '',
        retVal = '',
        tGlue = '';
    if (arguments.length === 1) {
        pieces = glue;
        glue = '';
    }
    if (typeof(pieces) === 'object') {
        if (Object.prototype.toString.call(pieces) === '[object Array]') {
            return pieces.join(glue);
        } else {
            for (i in pieces) {
                retVal += tGlue + pieces[i];
                tGlue = glue;
            }
            return retVal;
        }
    } else {
        return pieces;
    }
}




