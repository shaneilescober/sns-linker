<?php 
class frontPageSnslinker extends Controller_Front
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		$aOption['seq'] = $this->getSequence();
		$icons = common()->modelContents()->getIconImg($aOption['seq']);
		$iResultCount = common()->modelContents()->getResultsCount($aOption['seq']);
		
		$this->importJS('carousel');
		$this->importJS('snsFront');
		$this->loopFetch($icons);
		
		if ($iResultCount['total'] == 0) $this->fetchClear();
	}
}
