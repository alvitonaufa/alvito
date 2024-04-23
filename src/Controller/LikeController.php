<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Like Controller
 *
 * @property \App\Model\Table\LikeTable $Like
 */
class LikeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Like->find()
            ->contain(['Foto', 'User']);
        $like = $this->paginate($query);

        $this->set(compact('like'));
    }

    /**
     * View method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $like = $this->Like->get($id, contain: ['Foto', 'User']);
        $this->set(compact('like'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $like = $this->Like->newEmptyEntity();
        if ($this->request->is('post')) {
            $like = $this->Like->patchEntity($like, $this->request->getData());
            if ($this->Like->save($like)) {
                $this->Flash->success(__('The like has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The like could not be saved. Please, try again.'));
        }
        $foto = $this->Like->Foto->find('list', limit: 200)->all();
        $user = $this->Like->User->find('list', limit: 200)->all();
        $this->set(compact('like', 'foto', 'user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $like = $this->Like->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $like = $this->Like->patchEntity($like, $this->request->getData());
            if ($this->Like->save($like)) {
                $this->Flash->success(__('The like has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The like could not be saved. Please, try again.'));
        }
        $foto = $this->Like->Foto->find('list', limit: 200)->all();
        $user = $this->Like->User->find('list', limit: 200)->all();
        $this->set(compact('like', 'foto', 'user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $like = $this->Like->get($id);
        if ($this->Like->delete($like)) {
            $this->Flash->success(__('The like has been deleted.'));
        } else {
            $this->Flash->error(__('The like could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
