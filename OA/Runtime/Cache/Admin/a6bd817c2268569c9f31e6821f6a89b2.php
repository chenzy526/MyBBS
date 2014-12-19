<?php if (!defined('THINK_PATH')) exit();?>
		
								<table class="table table-bordered table-striped" border=1 >
													
										<tr  style="border:1px solid #ccc" >
											<th>申请人</th>
											<th>带团人员</th>
											<th>道具</th>
											<th>元宝数量</th>
											<th>平台</th>
											<th>区服</th>
											<th>游戏帐号</th>
											<th>角色名</th>
											<th>申请时间</th>
											<th>申请原因</th>
										</tr>	
								
								<?php if(is_array($resoucelist)): foreach($resoucelist as $key=>$v): ?><tr  style="border:1px solid #ccc" >
											<td ><?php echo ($v["username"]); ?></td>
											<td ><?php echo ($v["leader"]); ?></td>
											<td ><?php echo ($v["prop"]); ?></td>
											<td ><?php echo ($v["lngot"]); ?></td>
											<td ><?php echo ($v["plateform"]); ?></td>
											<td ><?php echo ($v["district_id"]); ?></td>
											<td ><?php echo ($v["account_id"]); ?></td>
											<td ><?php echo ($v["game_role"]); ?></td>
											<td ><a href="#"><?php echo ($v["apply_time"]); ?></a></td>
											<td ><?php echo ($v["reasons"]); ?></td>
										</tr><?php endforeach; endif; ?>
								</table>