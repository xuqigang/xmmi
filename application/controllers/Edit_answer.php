<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use QCloud_WeApp_SDK\Mysql\Mysql as DB;
    
class Edit_answer extends CI_Controller {
    public function index($answerId=0) {
        $answerId = $_GET['answerId'];
        DB::getInstance();
        $condition = 'id = ' . $answerId;
        $allResult = DB::row('list_of_answers', ['id,answer,hot,updateTime,creatorId'],$condition,'','limit 1');
        $data= array('answer'=>$allResult);
        $this->load->view('edit_answer',$data);
        
    }
    public function saveAnswer() {
        $answerId = $_GET['answerId'];
        $hot = $_GET['hot'];
        $answer = $_GET['answer'];
        DB::getInstance();
        $rows = DB::update('list_of_answers', ['answer'=>$answer,'hot'=>$hot,'updateTime'=>date("Y-m-d H:i:s")],'id=' . $answerId,'','');
        if($rows > 0){
            $this->json([
                        'code' => 1,
                        'data' => date("Y-m-d H:i:s")
                        ]);
        } else {
            $this->json([
                        'code' => 0,
                        'data' => date("Y-m-d H:i:s"),
                        'msg' => '保存失败，请稍后重试'
                        ]);
        }
    }
    public function problemList($page=0) {
        $pageIndex = $_GET['page'];
        DB::getInstance();
        $suff = 'limit ' . strval($pageIndex * 15) . ',15';
        $rows = DB::select('list_of_problems', ['id,problem,hot,updateTime'],'','',$suff);
        $this->json([
                    'code' => 1,
                    'data' => $rows,
                    'suff' => $suff,
                    'page' => $pageIndex,
                    ]);
    }
    public function searchExcuse() {
        $keyword = $_GET['keyword'];
        DB::getInstance();
        $condition = "problem like '%";
        $condition .=htmlspecialchars($keyword,ENT_QUOTES);
        $condition .= "%'";
        $problems = DB::select('list_of_problems', ['id,problem,hot'],$condition);
        $problemCount = count($problems);
        $problemIds = array();
        for($i=0; $i < $problemCount; $i++){
            $problem = $problems[$i];
            $problemIds[]=$problem->id;
        }
        $comma_separated = implode(",", $problemIds);
        $sql = 'select r.id,answer,hot from (  (select * from list_of_relationship where problemId in (' ;
        $sql .= $comma_separated;
        $sql .= ') limit 5) r left join list_of_answers a on r.answerId = a.id )';
        
    
        $query = DB::raw($sql);
        $allResult = $query->fetchAll(PDO::FETCH_OBJ);
        $this->json([
                    'code' => 1,
                    'data' => $allResult
                    ]);
    }
    
           
}
?>
