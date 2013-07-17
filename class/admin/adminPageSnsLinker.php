<?php 
class adminPageSnsLinker extends Controller_Admin
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		//gets saved settings from database 
		$fetchData = common()->modelContents()->getSettings($aArgs['seq']);
		//assign values
		$this->assign('count_img', $fetchData['pss_count']);
		$this->assign('title', $fetchData['pss_title']);
		$this->assign('content', $fetchData['pss_content']);
		$this->assign('seq', $aArgs['seq']);
		
		$this->importJS('setup');
		$this->importCss('plugin');
		$this->saveSetting_1($aArgs);
		$this->view(__CLASS__);
		
	}
	
	public function saveSetting_1($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		//method for including a validator for the form
		usbuilder()->validator(array('form' => 'snslinker_form'));
		//sends values taken from the form to adminExecSnsLinker to process into the database
		$sFormScript = usbuilder()->getFormAction('snslinker_form', 'adminExecSnsLinker');
		$this->writeJs($sFormScript);
		
		$this->view(__CLASS__);
		
	}
}