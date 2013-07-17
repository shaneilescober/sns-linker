<?php 
class adminPageSnsLinkerList extends Controller_Admin
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		$connection = new modelSnsLinker();
		
		if($aArgs['rows'] == null){
			$iRows = 10;
		}else{
			$iRows = $aArgs['rows'];
		}
		
		
		
		$iPage = $aArgs['page'] ? $aArgs['page'] : 1;
		
		$aOption['limit'] = $iRows;
		$aOption['offset'] = $iRows * ($iPage - 1);
		$aOption['search_key'] = $aArgs['search_key'];
		
		if($aArgs['search_key'] == null){
			$a = $connection->getList($aOption);
		}else{
			$a = $connection->search($aOption);
		}
		
		
		foreach($a as $key=>$val){
			$aData[$key]['idx'] = $val['idx'];
			$aData[$key]['ps_title'] = $val['ps_title'];
			$aData[$key]['ps_image'] = $val['ps_image'];
			$aData[$key]['ps_regdate'] = $val['ps_regdate'];
			$aData[$key]['ps_link_address'] = $val['ps_link_address'];
		}
		
		
		//PAGINATION
		$connection = new modelSnsLinker();
		$iResultCount = $connection->getResultsCount();
		$i = 0;
		
		$page = $aArgs['page'];
		if($page == null){
			$page = 1;
		}
		if($page == 1){
			$counter = $iResultCount;
		}
		else{
			$counter = (((ceil($iResultCount / $iRows)) - $page) + 1) * $iRows - ($iRows - ceil($iResultCount % $iRows));
		}
		
		//PAGINATION
		
		$this->importJS('setup');
		$this->importCss('plugin');
		
		$this->assign("page",$iRows);
		$this->assign('sPagination', usbuilder()->pagination($iResultCount, $iRows));
		$this->assign("iTotal", $iResultCount);
		$this->assign("counter",$counter);
		$this->assign('aData', $aData);
		$this->view(__CLASS__);
	}
}