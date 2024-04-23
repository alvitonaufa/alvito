<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Komentar Controller
 *
 * @property \App\Model\Table\KomentarTable $Komentar
 */
class KomentarController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Komentar->find()
            ->contain(['Foto', 'User']);
        $komentar = $this->paginate($query);

        $this->set(compact('komentar'));
    }

    /**
     * View method
     *
     * @param string|null $id Komentar id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $komentar = $this->Komentar->get($id, contain: ['Foto', 'User']);
        $this->set(compact('komentar'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $komentar = $this->Komentar->newEmptyEntity();
        if ($this->request->is('post')) {
            $komentar = $this->Komentar->patchEntity($komentar, $this->request->getData());
            if ($this->Komentar->save($komentar)) {
                $this->Flash->success(__('The komentar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The komentar could not be saved. Please, try again.'));
        }
        $foto = $this->Komentar->Foto->find('list', limit: 200)->all();
        $user = $this->Komentar->User->find('list', limit: 200)->all();
        $this->set(compact('komentar', 'foto', 'user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Komentar id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $komentar = $this->Komentar->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $komentar = $this->Komentar->patchEntity($komentar, $this->request->getData());
            if ($this->Komentar->save($komentar)) {
                $this->Flash->success(__('The komentar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The komentar could not be saved. Please, try again.'));
        }
        $foto = $this->Komentar->Foto->find('list', limit: 200)->all();
        $user = $this->Komentar->User->find('list', limit: 200)->all();
        $this->set(compact('komentar', 'foto', 'user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Komentar id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $komentar = $this->Komentar->get($id);
        if ($this->Komentar->delete($komentar)) {
            $this->Flash->success(__('The komentar has been deleted.'));
        } else {
            $this->Flash->error(__('The komentar could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
