<?php 
class adminExecSnsLinkerAddLink extends Controller_AdminExec
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		$connection = new modelSnsLinker();
		$aData['title'] = $aArgs['title'];
		$aData['date'] = date('Y-m-d h:i:s');
		$aData['link'] = $aArgs['link'];
		$aData['sel_image'] = $aArgs['sel_image'];
		
		$bInsert = $connection->insertLink($aData);
		if($bInsert === true){
			usbuilder()->message($sMessage, $sType = 'sucess');
			usbuilder()->message('Saved succesfully');
		}else{
			usbuilder()->message($sMessage, $sType = 'warning');
			usbuilder()->message('Oops. Something went wrong.');
		}
		
		$sUrl = usbuilder()->getUrl('adminPageSnsLinkerList');
		usbuilder()->jsMove($sUrl);
		//usbuilder()->vd($aArgs);
	}
}