<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use QCloud_WeApp_SDK\Mysql\Mysql as DB;
    
class Problem extends CI_Controller {
    public function index($page=0) {
        DB::getInstance();
      
        $suff = 'limit ' . $page . ',15';
        $rows = DB::select('list_of_problems', ['id,problem,hot,updateTime'],'','',$suff);
        $data= array('problemList'=>$rows,'page'=>$page);
        
        $this->load->view('problem',$data);
    }
    public function hotProblem() {
        
        DB::getInstance();
        $rows = DB::select('list_of_problems', ['id,problem,hot'],'','','order by rand() limit 10');
        $this->json([
                    'code' => 1,
                    'data' => $rows
                    ]);
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
