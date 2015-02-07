<?php 
class InsertController extends AppController {
	public $helpers = array('Html', 'Form');     
    public $uses = array('User');
    public function index() {
        	$data = $this->User->find('all');
       		$this->set("user_tbl",$data);
    }
    public function insertUser() {
    	if ($this->request->is('post')) {
			$user_tbl = $this->request->data;
			$existUserNameFlg = $this->User->isUserNameExist($user_tbl['User']['username']);
			$existEmailAddFlg = $this->User->isEmailAddExist($user_tbl['User']['email_add']);
		  if ($existUserNameFlg){
				  $this->Session->setFlash(__('The username is already in use. Please enter a different username'));
		   }
		   else if ($existEmailAddFlg){
				   		$this->Session->setFlash(__('This email address is already in use. Please enter a different one'));
		   }
		   else{
				$this->User->create();
				if ($this->User->save($user_tbl)){
					$this->Session->setFlash(__('Your User has been saved.')); 
					return $this->redirect(array('controller' => 'posts','action' => 'index'));
				}
			}
  		}
			// get info team
			$infoTeam = $this->User->getTeams();
			$newTeam = array();
		foreach($infoTeam as $team){
			// put Team.id --> Team.name
		    $newTeam[$team['Team']['team_id']] = $team['Team']['name'];
		}							
			$this->set('newTeam', $newTeam);
			// get info role
			$inforRole = $this->User->getRole();
			$newRole = array();
		foreach($inforRole as $role){
			$newRole[$role['Team']['role_id']] = $role['Team']['value'];
		}	
			$this->set('newRole', $newRole);
				
	}
}