<?php
 class GetuserController extends AppController {
 	public $helpers = array('Html', 'Form');
        
    public $uses = array('User');
    public function index() {
             $data = $this->User->find('all');
       		 $this->set("user_tbl",$data);
        }

    public function getUser($user_id=NULL) {	

		        if (!$user_id) {
		            throw new NotFoundException(__('Invalid to get_____________User'));
		        }

		   		$user = $this->User->findByUserId($user_id); 
		        if (!$user) {
		            throw new NotFoundException(__('Invalid to getUser____________________________________'));
		        }

		    	$this->set('user',$user);
    	}
    	public function updateUser($user_id = null) {

				    if (!$user_id) {
				        throw new NotFoundException(__('Invalid updateUser'));
				    }

				$post = $this->User->findByUserId($user_id);

				    if (!$post) {
				        throw new NotFoundException(__('Invalid____________updateUser'));
				    }

				    if ($this->request->is(array('post','put'))) {
				    	$chk = $this->User->save($this->request->data);
				    	echo '<pre>';
				    	print_r($this->request->data);
				    	echo '</pre>';
				        if ($chk) {
				            $this->Session->setFlash(__('Your User has been updated.'));
				            return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
				        }else {
						$this->Session->setFlash(__('Unable to update your _____________________updateUser.'));
						}
				    }

				    if (!$this->request->data) {
				        $this->request->data = $post;
				    }
				$tTeams = $this->User->getTeams();
				$teams = array();
			foreach($tTeams as $team){

				$teams[$team['Team']['team_id']] = $team['Team']['name'];
			}	
						
				$this->set('teams', $teams);
				$tTeams1 = $this->User->getRole();
				$teams1 = array();
			foreach($tTeams1 as $team){

				$teams1[$team['Team']['role_id']] = $team['Team']['value'];
			}	
				$this->set('teams1', $teams1);

					
		}
 }