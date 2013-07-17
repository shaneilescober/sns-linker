<?php 
class modelSnsLinker extends Model
{
	public function insertSetting($aData)
	{
		$sSql = "INSERT INTO snslinker_setting(
		seq, 
		pss_count,
		pss_title,
		pss_content
		) VALUES(
		{$aData['seq']}, 
		{$aData['count_image']},
		'{$aData['global_title']}',
		'{$aData['global_desc']}'
		)";
		
		$bInserted = $this->query($sSql);
		if($bInserted === false){
			return false;
		}else{
			return true;
		}
	}
	
	public function updateSetting($aData)
	{
		$sSql = "UPDATE snslinker_setting 
		SET 
		seq = {$aData['seq']}, 
		pss_count = {$aData['count_image']},
		pss_title = '{$aData['global_title']}',
		pss_content = '{$aData['global_desc']}'";
		
		$bUpdated = $this->query($sSql);
		if($bUpdated === false){
			return false;
		}else{
			return true;
		}
	}
	
	public function getResultsCount($sequence)
	{
		$sSql = "SELECT COUNT(idx) as total FROM snslinker_list WHERE seq = {$sequence}";
		$cResult = $this->query($sSql, row);
		return $cResult;
	}
	
	public function getList($aOption)
	{
		$sSql = "SELECT * FROM snslinker_list WHERE seq = {$aOption['seq']} ORDER BY idx DESC LIMIT {$aOption['limit']} offset {$aOption['offset']}";
		$aData = $this->query($sSql);
		return $aData;
	}
	
	public function insertLink($aData)
	{
		$sSql = "INSERT INTO snslinker_list (
		seq, 
		ps_title,
		ps_image,
		ps_regdate,
		ps_link_address
		) VALUES(
		{$aData['seq']}, 
		'{$aData['title']}',
		'{$aData['sel_image']}',
		'{$aData['date']}',
		CONCAT('http://','{$aData['link']}')
		)";
		
		$bInserted = $this->query($sSql);
		if($bInserted === false){
			return false;
		}else{
			return true;
		}
	}
	
	public function getData($id)
	{
		$sSql = "SELECT * FROM snslinker_list WHERE idx = {$id}";
		$fetchedData = $this->query($sSql, row);
		return $fetchedData;
	}
	
	public function updateData($aData)
	{
		$sSql = "UPDATE snslinker_list 
		SET 
		ps_title = '{$aData['title']}',
		ps_image = '{$aData['sel_image']}',
		ps_regdate = '{$aData['date']}',
		ps_link_address = CONCAT('http://', '{$aData['link']}') 
		WHERE idx = {$aData['idx']} AND seq = {$aData['seq']}";
		
		$bUpdated = $this->query($sSql);
		if($bUpdated === false){
			return false;
		}else{
			return true;
		}
	}
	
	public function getSettings($sequence)
	{
		$sSql = "SELECT * FROM snslinker_setting WHERE seq = {$sequence}";
		$data = $this->query($sSql, row);
		return $data;
	}
	
	public function check($sequence)
	{
		$sSql = "SELECT COUNT(idx) as cData FROM snslinker_setting WHERE seq = {$sequence}";
		$data = $this->query($sSql, row);
		return $data;
	}
	
	public function deleteLinks($ids)
	{
		$sSql = "DELETE FROM snslinker_list WHERE idx IN({$ids})";
		$bDeleted = $this->query($sSql);
		if($bDeleted === false){
			return false;
		}else{
			return true;
		}
	}
	
	public function search($aOption)
	{
		$sSql = "SELECT * FROM snslinker_list 
		WHERE 
		ps_title LIKE '%{$aOption['search_key']}%'
		OR
		ps_link_address LIKE '%{$aOption['search_key']}%'
		ORDER BY idx DESC LIMIT {$aOption['limit']} offset {$aOption['offset']}";
		
		$aSearched = $this->query($sSql);
		return $aSearched;
	}
	
	public function getIconImg($sequence)
	{
		$sSql = "SELECT ps_title, ps_image, ps_link_address FROM snslinker_list WHERE seq = {$sequence}";
		$aIcons = $this->query($sSql);
		return $aIcons;
	}
	
	function deleteContentsBySeq($aSeq)
	{
		$sSeqs = implode(',', $aSeq);
		$sQuery = "Delete from clockwidget_sequence where seq in($sSeqs)";
		$mResult = $this->query($sQuery);
		return $mResult;
	}
	
}