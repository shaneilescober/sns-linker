<?php 
class adminExecSnsLinker extends Controller_AdminExec
{
	public function run($aArgs)
	{
		//includes builder library
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		//checks if there is already an existing data for the sequence
		$checkDB = common()->modelContents()->check($aArgs['seq']);
		//gets data from $aArgs and assigning them to another variable
		$aData['seq'] = $aArgs['seq'];
		$aData['count_image'] = $aArgs['count_image'];
		$aData['global_title'] = $aArgs['global_title'];
		$aData['global_desc'] = $aArgs['global_desc'];
		
		//inserts or updates data in database depending on the sequence
		if($checkDB['cData'] === "0"){
			$bInsert = common()->modelContents()->insertSetting($aData);
			if($bInsert === true){
				usbuilder()->message($sMessage, $sType = 'sucess');
				usbuilder()->message('Saved succesfully');
			}else{
				usbuilder()->message('Oops. Something went wrong.', 'warning');
			}
		}else{
			$bUpdate = common()->modelContents()->updateSetting($aData);
			if($bUpdate === true){
				usbuilder()->message($sMessage, $sType = 'sucess');
				usbuilder()->message('Saved succesfully');
			}else{
				usbuilder()->message('Oops. Something went wrong.', 'warning');
			}
		} 
		
		//redirects to adminPageSnsLinker
		$sUrl = usbuilder()->getUrl('adminPageSnsLinker', $mSeq = true);
		usbuilder()->jsMove($sUrl);
		//usbuilder()->vd($aArgs['seq']);
	}
}