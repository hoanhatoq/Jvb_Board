<?php

App::uses('AppController', 'Controller');

class AddController extends AppController{

	public function index($id = null)
	{
		$id = $this->Auth->user('user_id');
		if (!$this->add->exists($id))
		{
			throw new NotFoundException(__('Invalid user'));
		}

		if ($this->request->is(array('post', 'put')))
		{
			if ($this->add->save($this->request->data))
			{
				$this->Session->setFlash(__('The add has been saved.'));
			}
			else
			{
				$this->Session->setFlash(__('The add could not be saved. Please, try again.'));
			}
		}
		else
		{
			$options = array('conditions' => array('add.' . $this->add->primaryKey => $id));
			$this->request->data = $this->add->find('first', $options);
		}
		$tTeams = $this->add->getTeams();
		$teams = array();
		foreach($tTeams as $team)
		{
			$teams[$team['Team']['team_id']] = $team['Team']['name'];
		}
		$selected = $this->add->getTeam($this->Auth->user('user_id'));
		$this->set('teams', $teams);
		$this->set('selected', $selected);
	}
}
