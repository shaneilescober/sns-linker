<?php 
class frontPageTitledesc extends Controller_Front
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		$aOption['seq'] = $this->getSequence();
		$settings = common()->modelContents()->getSettings($aOption['seq']);
		
		$this->importJS('carousel');
		$this->importJS('snsFront');
		$this->assign('title', $settings['pss_title']);
		$this->assign('content', $settings['pss_content']);
	}
}