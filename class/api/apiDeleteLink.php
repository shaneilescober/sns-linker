<?php 
class apiDeleteLink extends Controller_Api
{
	protected function get($aArgs){
		$connection = new modelSnsLinker();
		$ids = substr($aArgs['data'], 0, -1);
		
		$bDelete = $connection->deleteLinks($ids);
		if($bDelete === true){
			return true;
		}else{
			return false;
		}
		
	}
}