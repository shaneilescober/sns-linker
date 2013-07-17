<div id = "add_setup_container">
	<form id = "saveModified" name = "saveModified">
		<h3>Modify Link</h3>
		<p class = "require">
			<span class = "neccesary">*</span>
			Required		
		</p>
		<table class = "table_input_vr" cellspacing = "0" border = "1">
			<colgroup>
				<col width = "115px">
				<col width = "*">
			</colgroup>
			<tbody>
				<td><input name = "idx" type = "hidden" value = "<?php echo $idx; ?>"></td>
				<tr>
					<th>Title</th>
					<td>
						<span class = "neccesary">*</span>
						<input id = "titulo" class = "fix" type = "text" validate = "required" maxlength = "20" name = "title" value = "<?php echo $title; ?>" fw-filter="isFill">
					</td>
				</tr>
				<tr>
					<th>Link Address</th>
					<td>
						<span class = "neccesary">*</span>
						<input id="linkadd" class="input_keyword fix" type="text" name="link" title="" validate="required|url" value="<?php echo $link; ?>" maxlength="255" fw-filter="isFill&isUrl">
					</td>
				</tr>
				<tr>
					<th>Link Image</th>
					<td>
						<span class = "neccesary">&nbsp;</span>
						<input type = "radio" name = "imgUpload" value = "selectImg" style = "width:15px" checked>
						<span>Select from Image List</span>
						<input type = "radio" name = "imgUpload" value = "uploadImg" style = "width:15px; margin-left:50px">
						<span>Upload Image</span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<div id = "selectedImg_container"><img src = "<?php echo $image; ?>" /></div>
						<a id = "selectImg" class = "btn_nor_01 btn_nor_02 btn_width_addlink" href = "#" style = "width:150px" onclick = "PLUGIN_Snslinkadv_Setup.show_popUp_img()">Select Image</a>
						<input type = hidden name = "sel_image" id = "sel_image" value = "<?php echo $image; ?>">
					</td>
				</tr>
			</tbody>
		</table>
		
		<div class = "tbl_lb_wide_btn">
			<input id="save-modify" class="btn_apply" type="button" value="Save" onclick = "">
			<a id="list-setup" class="add_link" title="Return to SNS Linker" href="<?php echo usbuilder()->getUrl('adminPageSnsLinkerList'); ?>">Return to SNS Linker</a>
		</div>
	</form>
</div>

<div id='sdk_snslinker_selectImg_contents' style='display:none'>
	<div class="admin_popup_contents">
		<div id = "imgPreview"></div>
		<div id = "imgList">
			<img src = "/_sdk/img/snslinkwidget/google_logo.jpg" width = "80" height = "60" id = 'google' onclick = "PLUGIN_Snslinkadv_Setup.selectImg('google')"><br /><br />
			<img src = "/_sdk/img/snslinkwidget/4shared_logo.jpg" width = "80" height = "60" id = '4shared' onclick = "PLUGIN_Snslinkadv_Setup.selectImg('4shared')"><br /><br />
			<img src = "/_sdk/img/snslinkwidget/9gag_logo.jpg" width = "80" height = "60" id = '9gag' onclick = "PLUGIN_Snslinkadv_Setup.selectImg('9gag')"><br /><br />
			<img src = "/_sdk/img/snslinkwidget/bing_logo.jpg" width = "80" height = "60" id = 'bing' onclick = "PLUGIN_Snslinkadv_Setup.selectImg('bing')"><br /><br />
			<img src = "/_sdk/img/snslinkwidget/blogger_logo.jpg" width = "80" height = "60" id = 'blogger' onclick = "PLUGIN_Snslinkadv_Setup.selectImg('blogger')"><br /><br />
			<img src = "/_sdk/img/snslinkwidget/facebook_logo.jpg" width = "80" height = "60" id = 'facebook' onclick = "PLUGIN_Snslinkadv_Setup.selectImg('facebook')"><br /><br />
			<img src = "/_sdk/img/snslinkwidget/flickr_logo.jpg" width = "80" height = "60" id = 'flickr' onclick = "PLUGIN_Snslinkadv_Setup.selectImg('flickr')"><br /><br />
			<img src = "/_sdk/img/snslinkwidget/formspring_logo.jpg" width = "80" height = "60" id = 'formspring' onclick = "PLUGIN_Snslinkadv_Setup.selectImg('formspring')"><br /><br />
			<img src = "/_sdk/img/snslinkwidget/omgpop_logo.jpg" width = "80" height = "60" id = 'omgpop' onclick = "PLUGIN_Snslinkadv_Setup.selectImg('omgpop')"><br /><br />
			<img src = "/_sdk/img/snslinkwidget/tumblr_logo.jpg" width = "80" height = "60" id = 'tumblr' onclick = "PLUGIN_Snslinkadv_Setup.selectImg('tumblr')"><br /><br />
			<img src = "/_sdk/img/snslinkwidget/twitter_logo.jpg" width = "80" height = "60" id = 'twitter' onclick = "PLUGIN_Snslinkadv_Setup.selectImg('twitter')"><br /><br />
			<img src = "/_sdk/img/snslinkwidget/wikipedia_logo.jpg" width = "80" height = "60" id = 'wikipedia' onclick = "PLUGIN_Snslinkadv_Setup.selectImg('wikipedia')"><br /><br />
			<img src = "/_sdk/img/snslinkwidget/yahoo_logo.jpg" width = "80" height = "60" id = 'yahoo' onclick = "PLUGIN_Snslinkadv_Setup.selectImg('yahoo')"><br /><br />
			<img src = "/_sdk/img/snslinkwidget/youtube_logo.jpg" width = "80" height = "60" id = 'youtube' onclick = "PLUGIN_Snslinkadv_Setup.selectImg('youtube')"><br /><br />
		</div>
		<a id = "saveImg" class = "btn_nor_01 btn_nor_02 btn_width_addlink" href = "#" style = "width:150px" onclick = "PLUGIN_Snslinkadv_Setup.imageChoice()">Select Image</a>
	</div>
</div>