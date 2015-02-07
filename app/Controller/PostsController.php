<?php
  class PostsController extends AppController {
	public $helpers = array('Html', 'Form');
	        
	public $uses = array('User');

	public function index() {
	            $data = $this->User->find('all');
	       		$this->set("user_tbl",$data);
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
		
	public function changePassword($user_id){

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
	}	
}