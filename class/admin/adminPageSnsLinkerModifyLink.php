<?php 
class adminPageSnsLinkerModifyLink extends Controller_Admin
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		$connection = new modelSnsLinker();
		$data = $aArgs['idx'];
		
		$getData = $connection->getData($data);
		
		$this->assign('idx', $getData['idx']);
		$this->assign('title', $getData['ps_title']);
		$this->assign('date', $getData['ps_regdate']);
		$this->assign('link', $getData['ps_link_address']);
		$this->assign('image', $getData['ps_image']);
		
		$this->importJS('setup');
		$this->importCss('plugin');
		
		$this->saveModified($aArgs);
		$this->view(__CLASS__);
	}
	
	protected function saveModified($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		$sFormScript = usbuilder()->getFormAction('saveModified', 'adminExecSnsLinkerModifyLink');
		$this->writeJs($sFormScript);
		
		$this->view(__CLASS__);
	}
}
