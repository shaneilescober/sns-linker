<div id="pg_snslinkadv_setup">
<!-- message box -->			
			<div id="sdk_message_box"></div>		
			<!-- // message box -->
		<p style="font-size:12px">Plugin ID : Snslinkadv</p><br />	
			
			<p class="require"><span class="neccesary">*</span> Required</p>
			<!-- input area -->			
	<form name = "snslinker_form">
			<input type = hidden name = "seq" value = "<?php echo $seq; ?>" />
			<table border="1" cellspacing="0" class="table_input_vr">
			<colgroup>
				<col width="115px" />
				<col width="*" />
			</colgroup>
			<tr>
				<th><label for="show_html_value">Count of Image</label></th>
				<td class="move">
					<select title="select rows" class="rows" id="show_html_value" name="count_image">
						<option value = "1" <?php if ($count_img == 1) echo 'selected="selected"'; ?>>1</option>
						<option value = "2" <?php if ($count_img == 2) echo 'selected="selected"'; ?>>2</option>
						<option value = "3" <?php if ($count_img == 3) echo 'selected="selected"'; ?>>3</option>
						<option value = "4" <?php if ($count_img == 4) echo 'selected="selected"'; ?>>4</option>
						<option value = "5" <?php if ($count_img == 5) echo 'selected="selected"'; ?>>5</option>
					</select>
				</td>
			</tr>
			<tr>
				<th><label for="show_html_value">Title</label></th>
				<td>
					<span class="neccesary">*</span> <input id="text" type="text" maxlength="20"  name="global_title" class="_validate fix" validate="required" fw-filter = "isFill" value = "<?php echo $title; ?>"/>
				</td>
			</tr>
			<tr>
				<th>Description</th>
				<td class="move">
					<textarea rows="4" cols="4" id="global_content" class="_validate fix" maxlength="100" filter="fill[100]" name = "global_desc" value = "<?php echo $content; ?>"><?php echo $content; ?></textarea>
				</td>
			</tr>
		
			</table>
			
			<div class="tbl_lb_wide_btn">
				<a href="#" class="btn_apply" title="Save changes"  id="save-global">Save</a>
				<a href="#" class="add_link" title="Reset to default" onclick="PLUGIN_Snslinkadv_Setup.def()">Reset to Default</a>
			</div>
			
	</form>
</div>





