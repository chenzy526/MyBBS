<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class ExportController extends Controller {
    
	// 数据导出
// 	public function answerExport()
// 	{
// 		import('Orag.Excel.ArrayToExcel');
	
// 		$excel = new ArrayToExcel();
	
// 		$xlsName = 'Score';
// 		$xlsCell = array(
// 				array('studentNo', '学号'),
// 				array('studentName', '姓名'),
// 				array('studentClass', '班级'),
// 				array('testName', '试卷名'),
// 				array('score', '分数'),
// 				array('submitTime', '提交时间')
// 		);
// 		$xlsData = M('answer')->select();
// // 		->	join('exam_test ON exam_test.testId = exam_answer.testId')
// // 		->	join('exam_student ON exam_student.studentNo = exam_answer.studentNo')
// // 		->	field(array(
// // 				'exam_student.studentNo',
// // 				'exam_student.studentName',
// // 				'exam_student.studentClass',
// // 				'exam_answer.score',
// // 				'exam_answer.submitTime',
// // 				'exam_test.testName'
// // 		))
// // 		->	order('convert(exam_student.studentClass USING gb2312),exam_student.studentClass')
// 		$excel->exportExcel($xlsName, $xlsCell, $xlsData);
// 	}
	
	//导出资源列表
	public function export($data=array(),$title=array(),$filename='report'){
		header("Content-type:application/octet-stream");
		//header("Accept-Ranges:bytes");
		header("Content-type:application/vnd.ms-excel");
		header("Content-Disposition:filename=资源申请表.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		$db = M('resources');
		//$this->resoucelist = $db->select();
		$data = $db->select();
		//$this->display('Export/resouce');
		$title['id'] = 'ID';
		$title['username'] = '用户名';
		$title['plateform'] = '平台';
		$title['district_id'] = '区服';
		$title['game_name'] = '游戏帐号';
		$title['game'] = '游戏名称';
		$title['leader'] = '带团帐号';
		$title['game_role'] = '游戏角色';
		$title['profession'] = '职业';
		$title['Lngot'] = '元宝数量';
		$title['prop'] = '道具';
		$title['apply_time'] = '申请时间';
		$title['reasons'] = '申请原因';
		if (!empty($title)){
			foreach ($title as $k => $v) {
				$title[$k]=iconv("UTF-8", "GB2312",$v);
			}
			$title= implode("\t", $title);
			echo "$title\n";
		}
		if (!empty($data)){
		foreach($data as $key=>$val){
		foreach ($val as $ck => $cv) {
			$data[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
			}
			$data[$key]=implode("\t", $data[$key]);
		
			}
			echo implode("\n",$data);
		}
	}
	//导出内充列表
	public function ncexport($data=array(),$title=array(),$filename='report'){
		//header("Content-type:application/octet-stream");
		//header("Accept-Ranges:bytes");
		header("Content-type:application/vnd.ms-excel");
		header("Content-Disposition:filename=内冲申请表.xls");
		//header("Pragma: no-cache");
		//header("Expires: 0");
		$db = M('recharge');
		$data = $db->select();
		$title['id'] = 'ID';
		$title['username'] = '用户名';
		$title['plateform'] = '平台';
		$title['district_id'] = '区服';
		$title['game_name'] = '游戏帐号';
		$title['game'] = '游戏名称';
		$title['game_role'] = '游戏角色';
		$title['profession'] = '职业';
		$title['money'] = '申请金额';
		$title['leader'] = '带团帐号';
		$title['apptime'] = '申请时间';
		$title['type'] = '类型';
		if (!empty($title)){
			foreach ($title as $k => $v) {
				$title[$k]=iconv("UTF-8", "GB2312",$v);
			}
			$title= implode("\t", $title);
			echo "$title\n";
		}
		if (!empty($data)){
			foreach($data as $key=>$val){
			foreach ($val as $ck => $cv) {
				$data[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
				}
				$data[$key]=implode("\t", $data[$key]);
			
				}
			echo implode("\n",$data);
			}
		}
		//导出进服人员列表
		public function jfexport($data=array(),$title=array(),$filename='report'){
			//header("Content-type:application/octet-stream");
			//header("Accept-Ranges:bytes");
			header("Content-type:application/vnd.ms-excel");
			header("Content-Disposition:filename=进服人员表.xls");
			$db = M('enterserver');
			$data = $db->select();
			$title['id'] = 'ID';
			$title['username'] = '用户名';
			$title['plateform'] = '平台';
			$title['district_id'] = '区服';
			$title['game'] = '游戏名称';
			$title['entertime'] = '进入游戏时间';
			$title['accessman'] = '考核人';
			$title['remarks'] = '备注';
			$title['leader_gamename'] = '带团帐号';	
			$title['apptime'] = '申请时间';
			if (!empty($title)){
				foreach ($title as $k => $v) {
					$title[$k]=iconv("UTF-8", "GB2312",$v);
				}
				$title= implode("\t", $title);
				echo "$title\n";
			}
			if (!empty($data)){
				foreach($data as $key=>$val){
				foreach ($val as $ck => $cv) {
					$data[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
					}
					$data[$key]=implode("\t", $data[$key]);
								
					}
					echo implode("\n",$data);
					}
			}
			
			
}































