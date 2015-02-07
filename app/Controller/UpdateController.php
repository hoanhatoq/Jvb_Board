<?php
 class UpdateController extends AppController {
 	public $helpers = array('Html', 'Form');   
    public $uses = array('User');

    public function index() {
        $data = $this->User->find('all');
        $this->set("user_tbl",$data);
    }
    public function updateUser($user_id){
    	// get info User
		$user_info = $this->User->findByUserId($user_id);
		if (!$user_info) {
			throw new NotFoundException(__('The User is not exist'));
		}

		if ($this->request->is(array('post','put'))) {
			// update successful
			$updateFlg = $this->User->save($this->request->data);
			if ($updateFlg) {
				$this->Session->setFlash(__('Your User ' .$user_info['User']['username']. ' has been updated.'));
				return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
			}
			else {
				$this->Session->setFlash(__('Unable to update the ' .$user_info['User']['username']. ' User.'));
			}
		}

		if (!$this->request->data) {
			$this->request->data = $user_info;
		}
			// get info team
			$infoTeam = $this->User->getTeams();
			$newTeams = array();
		foreach($infoTeam as $team){
			// put Team.id --> Team.name
		    $newTeams[$team['Team']['team_id']] = $team['Team']['name'];
		}							
			$this->set('newTeams', $newTeams);
			// get info role
			$inforRole = $this->User->getRole();
			$newRole = array();
		foreach($inforRole as $role){
			$newRole[$role['Team']['role_id']] = $role['Team']['value'];
		}	
			$this->set('newRole', $newRole);
				
	}
	public function delete($user_id) {
		if ($this->request->is('get')) {
		    throw new MethodNotAllowedException();
		}
		if ($this->User->delete($user_id)) {
		    $this->Session->setFlash(__('The User has been deleted.'));
		    return $this->redirect(array('action' => 'index'));
    	}
    }
 }