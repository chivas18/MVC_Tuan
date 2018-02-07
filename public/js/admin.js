function onDel() {
		if(confirm("Are you sure you want to do this?") == true){
			$(function(){
				$('a').attr('href');
			});
		}else{
			$(function(){
				$('a').attr('href','<?= $base_url ?>/users/list');
			});
		}
	}