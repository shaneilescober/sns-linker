<?php 
class adminExecSnsLinkerModifyLink extends Controller_AdminExec
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		usbuilder()->validator(array('form' => 'simplesample_add'));
		
		$connection = new modelSnsLinker();
		$aData['idx'] = $aArgs['idx']; 
		$aData['title'] = $aArgs['title'];
		$aData['date'] = date('Y-m-d h:i:s');
		$aData['link'] = $aArgs['link'];
		$aData['sel_image'] = $aArgs['sel_image'];
		
		$bUpdate = $connection->updateData($aData);
		
		if($bUpdate === true){
			usbuilder()->message($sMessage, $sType = 'sucess');
			usbuilder()->message('Link details have been successfully updated.');
		}else{
			usbuilder()->message($sMessage, $sType = 'warning');
			usbuilder()->message('Oops. Something went wrong.');
		}
		
		$sUrl = usbuilder()->getUrl('adminPageSnsLinkerList');
		usbuilder()->jsMove($sUrl);
	}
}