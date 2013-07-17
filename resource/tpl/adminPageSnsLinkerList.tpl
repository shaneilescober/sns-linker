<div id="sdk_message_box"></div>

<div class = "table_header_area">
	<ul class = "row_1">
		<li class = "search">
			<input id = "search-key" class = "input_text" type = "text" name = "search-key" title = "Subject, category or author">
			<a class = "btn_nor_01 btn_width_st1" onclick = "PLUGIN_Snslinkadv_Setup.search()" title = "Search Article" href = "#">Search</a>
		</li>
		<li class = "comment">
			<a class = "all selected" title = "Show all posts" href = "<?php echo usbuilder()->getUrl('adminPageSnsLinkerList'); ?>" >All(<span id = "iTotal"><?php echo $iTotal; ?></span>)</a>
		</li>
	</ul>
	
	<ul class = "row_2">
		<li>
			<a class = "btn_nor_01 btn_width_st1" title = "Delete selected action" onclick = "PLUGIN_Snslinkadv_Setup.show_popUp()" href = "#">Delete</a>
		</li>
		<li class = "show">
			<label for = "show_row">Show Rows</label>
			<select id = "per_select">
				<option value = "10" <?php if($page == 10){ echo "selected"; } ?>>10</option>
				<option value = "20" <?php if($page == 20){ echo "selected"; } ?>>20</option>
				<option value = "30" <?php if($page == 30){ echo "selected"; } ?>>30</option>
				<option value = "50" <?php if($page == 50){ echo "selected"; } ?>>50</option>
				<option value = "100" <?php if($page == 100){ echo "selected"; } ?>>100</option>
			</select>
		</li>
	</ul>
</div>

<table class = "table_hor_02" cellspacing = "0" cellpadding = "0" border = "1">
	<colgroup>
		<col width="44px">
		<col width="48px">
		<col>
		<col width="125px">
		<col width="170px">
		<col width="170px">
		<col width="170px">
	</colgroup>
	<thead>
		<tr>
			<th class = "col_01">
				<input id="check_all" type="checkbox">
			</th>
			<th class = "col_02">NO</th>
			<th id="list-title-up" class="col_03 col_select list_down">
				Title
				<input id="1" class="title" type="button" onclick="PLUGIN_Snslinkadv_Setup.toogle(this)">
			</th>
			<th id="list-title-down" class="col_03 col_select list_up" style="display: none;">
				Title
				<input id="0" class="title" type="button" onclick="PLUGIN_Snslinkadv_Setup.toogle(this)">
			</th>
			<th id="list-reg-down" class="col_04 col_select list_down">
				Registered Date
				<input id="1" type="button" onclick="PLUGIN_Snslinkadv_Setup.toogle(this)">
			</th>
			<th id="list-reg-up" class="col_04 col_select list_up" style="display: none;">
				Registered Date
				<input id="0" type="button" onclick="PLUGIN_Snslinkadv_Setup.toogle(this)">
			</th>
			<th class="col_05">Image</th>
			<th class="col_06">Link Address</th>
			<th class="col_05">Management</th>
		</tr>
	</thead>
	<tbody id = "sorting-area">
		<?php if($aData == null){?>
			<tr>
				<td colspan = "7">No results</td>
			</tr>
		<?php }else{?>
			<?php foreach($aData as $val){ ?>
				<tr>
					<td><input type = "checkbox" name = 'aCbox' value = "<?php echo $val['idx']; ?>"></td>
					<td id = "counter" value = "<?php echo $counter; ?>"><?php echo $counter; ?></td>
					<td id = "ps_title" value = "<?php echo $val['ps_title']; ?>"><?php echo $val['ps_title']; ?></td>
					<td id = "ps_regdate" value = "<?php echo $val['ps_regdate']; ?>"><?php echo $val['ps_regdate']; ?></td>
					<td id = "ps_image"><img src = "<?php echo $val['ps_image']; ?>" width = "32" height = "32"></td>
					<td id = "ps_link_address" value = "<?php echo $val['ps_link_address']; ?>"><?php echo $val['ps_link_address']; ?></td>
					<td><a href = "#" onclick = "PLUGIN_Snslinkadv_Setup.modify(<?php echo $val['idx']; ?>); PLUGIN_Snslinkadv_Setup.action(2)">Modify</a></td>
				</tr>
			<?php $counter--;
			 } ?>
		<?php }?>
		
	</tbody>
</table>

<div class = "table_display_set">
	<a class = "btn_nor_01 btn_width_st1 " onclick = "PLUGIN_Snslinkadv_Setup.show_popUp()" title="Delete selected action" href = "#">Delete</a>
</div>
<div class = "table_display_set" style = "float:right">
	<a id = "add_setup" class = "btn_nor_01 btn_nor_02 btn_width_addlink" href = "<?php echo usbuilder()->getUrl('adminPageSnsLinkerAddLink'); ?>" onclick = "javascript:PLUGIN_Snslinkadv_Setup.action(1)">Add New Link</a>
</div>

<div id='sdk_simplesample_delete_popup_contents' style='display:none'>
	<div class="admin_popup_contents">
		Are you sure you want to delete?
		<br />
		<br />
		<a class="btn_nor_01 btn_width_st1" href="#" style='cursor:pointer' title="Delete" onclick="PLUGIN_Snslinkadv_Setup.delete_list()"> Delete <a/>
	</div>
</div>

<?php echo $sPagination; ?>
