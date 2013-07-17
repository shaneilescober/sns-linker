<?php 
class adminPageSnsLinkerAddLink extends Controller_Admin
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		$this->importJS('setup');
		$this->importCss('plugin');
		
		$this->saveLink($aArgs);
		$this->view(__CLASS__);
	}
	
	protected function saveLink($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		usbuilder()->validator(array('form' => 'save'));
		
		$connection = new modelSnsLinker();
		$sFormScript = usbuilder()->getFormAction('save', 'adminExecSnsLinkerAddLink');
		$this->writeJs($sFormScript);
		
		$this->view(__CLASS__);
	}
}