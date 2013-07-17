jQuery(document).ready(function(){
	var iCount = parseInt($("#pg_snslinkadv_DisplayCount").val());
	var ActualCount = parseInt($("#pg_snslinkadv_ActualCount").val());
		
		if(iCount > ActualCount){
			var IconCounter = ActualCount;
		}else{
			var IconCounter = iCount;
		}
		$(".jCarouselLite_pg_snslinkadv").jCarouselLite({
			btnNext: ".pg_snslinkadv_next",
			btnPrev: ".pg_snslinkadv_prev",
			visible: IconCounter
		});
		
});