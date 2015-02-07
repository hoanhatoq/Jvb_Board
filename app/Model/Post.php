<?php 
App::uses('AppModel', 'Model');

class Post extends AppModel {
    public $primaryKey ='user_id';
    public $useTable = 'user_tbl';


    public $validate = array(
        'id' => array(
            'rule' => 'notEmpty'
            ),
        'username' => array(
            'rule' => 'notEmpty'
            ),
        'password'=>array(
            'rule'=>'notEmpty'
            ),
        'slogan'=>array(
            'rule'=>'notEmpty'
            ),
        'email_add'=>array(
            'rule'=>'notEmpty'
            ),
        'nickname'=>array(
            'rule'=>'notEmpty'
            ),
        'fullname'=>array(
            'rule'=>'notEmpty'
            ),            
        );

    public function getTeams(){              
		$db = $this->getDataSource();       
		$qry = 'SELECT Team.team_id, Team.name  FROM  team_tbl  AS Team WHERE 1';
		$res = $db->query($qry);				
		return $res;
	}
    public function getRole(){
        $db = $this->getDataSource();       
        $qry = 'SELECT Team.role_id, Team.value FROM role_mst AS Team WHERE 1';
        $res1 = $db->query($qry);                
        return $res1;
    } 
    
} 