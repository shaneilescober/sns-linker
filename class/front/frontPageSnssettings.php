<?php 
class frontPageSnssettings extends Controller_Front
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		$aOption['seq'] = $this->getSequence();
		$settings = common()->modelContents()->getSettings($aOption['seq']);
		$list = common()->modelContents()->getResultsCount($aOption['seq']);
		
		$this->importJS('carousel');
		$this->importJS('snsFront');
		
		$this->assign('iCount', $list['total']);
		$this->assign('displayCount', $settings['pss_count']);
		
	}
}