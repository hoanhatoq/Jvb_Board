<?php

/**
 * @author Duy Linh, Mạnh Linh
 *
 */

class User extends AppModel{
	
	/**
	 * Tên bảng trong cơ sở dữ liệu
	 */
	public $useTable = 'user_tbl';

	/**
	 * Tên khóa chính của bảng
	 */
	public $primaryKey = 'user_id';

	/**
	 * Điều kiện kiểm tra dữ liệu
	 */
	public $validate = array(
		'username' => array(
                'rule1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Hãy nhập vào username !'
                ),
                'rule2' => array(
                    'rule' => array('maxLength',16),
                    'message' => 'Username phải có độ dài không quá 16 ký tự !'
                )
        ),
		'password' => array(
			'rule1' => array(
				'rule' => 'notEmpty',
				'message' => 'Hãy nhập vào mật khẩu !'
			),
			'rule2' => array(
				'rule' => array('between',8,16),
				'message' => 'Mật khẩu phải có độ dài từ 8 đến 16 ký tự !'
			)
		),
		'email_add' =>  array(
			'email' => array('rule' => 'email',
				'required' => true,'message' => 'email da ton tai'),'unique' => array(
				'rule' => 'isUnique'), 
 		),
		
		'slogan' => array(
			'rule' => array('between', 0, 50),
			'message' => 'Slogan không quá 50 ký tự'
		),
	);

	/**
	 * Định nghĩa quan hệ belongsTo giữa bảng User, bảng Role và bảng Team
	 */
	public $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',			
		),
		'Team' => array(
			'className' => 'Team',
			'foreignKey' => 'team_id',			
		),
	); 

	
	/**
	 * Hash mật khẩu của user trước khi tạo mới hay cập nhật mật khẩu
	 * 
	 * @param $option tùy chọn trước khi tạo mới cập nhật mật khẩu
	 *
	 */
	public function beforeSave($options = array()){
		if(isset($this->data['User']['password'])){
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
	}
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

	public function isUserNameExist($userName){
		$sql = "Select username from user_tbl Where username='$userName' ";
		$this->query($sql);
		if($this->getNumRows()==0){
			return false;
		}else{
			return true;
		}
	}


	public function isEmailAddExist($email_add){
		$sql = "Select email_add from user_tbl Where email_add='$email_add' ";
		$this->query($sql);
		if($this->getNumRows()==0){
			return false;
		}else{
			return true;
		}
	}

    
}

?>