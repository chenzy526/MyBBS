/**
 * Unicorn Admin Template
 * sojii -> sojii@gmail.com
**/
$(document).ready(function(){

    

	// === 查询模块获取相关游戏和区服 === //
	$(':input[name=site_id]').change(function(){
		$site_id = $(this).val();
			// alert($site_id);
        $.post(getGames,{site_id:$site_id},function(data){
		
			// window.top.location.reload();
			$(":input[name=game_id]").children('option').eq(0).attr('selected','selected').siblings().remove();
			$(':input[name=district_id]').children('option').eq(0).attr('selected','selected').siblings().remove();
			for(var x in data){
				$option = $('<option></option>').attr('value',data[x]['game_id']).text(data[x]['title']);
				$(':input[name=game_id]').append($option);
			}
		})
	});
	
	$(':input[name=game_id]').change(function(){
		$site_id = $(':input[name=site_id]').val();
		$game_id = $(this).val();
			// alert($site_id +','+ $game_id);
        $.post(getServers,{site_id:$site_id, game_id:$game_id},function(data){
			// window.top.location.reload();
			$(':input[name=district_id]').children('option').eq(0).attr('selected','selected').siblings().remove();
			for(var x in data){
				$option = $('<option></option>').attr('value',data[x]['district_id']).text(data[x]['title']);
				$(':input[name=district_id]').append($option);
			}
		})

	});

	
	$(":submit").click(function(){
		var sid = $(':input[name=site_id]').val();
		var gid = $(':input[name=game_id]').val();
		var did = $(':input[name=district_id]').val();
		// alert(did);

        if( ( did!="0" && did!="" && did!=undefined && did!=null && sid=="0") || ( gid!="0" && sid=="0") ){
        // if(  did && sid) {
           alert("请选择平台");
           return false;
        }
        // if(addr=='' || addr==undefined || addr==null){ alert('请选择收货地址');return; }
        if(did!="0" && did!="" && did!=undefined && did!=null && gid=="0"){
           alert("请选择游戏");
           return false;
        }
     });


// === 研发大区获取相关游戏和区服 === //
	$(':input[name=refer_sid]').change(function(){
		$site_id = $(this).val();
			// alert($site_id);
        $.post(getGames,{site_id:$site_id},function(data){
		
			// window.top.location.reload();
			$(":input[name=refer_gid]").children('option').eq(0).attr('selected','selected').siblings().remove();
			$(':input[name=refer_did]').children('option').eq(0).attr('selected','selected').siblings().remove();
			for(var x in data){
				$option = $('<option></option>').attr('value',data[x]['game_id']).text(data[x]['title']);
				$(':input[name=refer_gid]').append($option);
			}
		})
	});
	
	$(':input[name=refer_gid]').change(function(){
		$site_id = $(':input[name=refer_sid]').val();
		$game_id = $(this).val();
			// alert($site_id +','+ $game_id);
        $.post(getServers,{site_id:$site_id, game_id:$game_id},function(data){
			// window.top.location.reload();
			$(':input[name=refer_did]').children('option').eq(0).attr('selected','selected').siblings().remove();
			for(var x in data){
				$option = $('<option></option>').attr('value',data[x]['district_id']).text(data[x]['title']);
				$(':input[name=refer_did]').append($option);
			}
		})

	});

    
});
