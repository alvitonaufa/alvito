<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Foto Controller
 *
 * @property \App\Model\Table\FotoTable $Foto
 */
class FotoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Foto->find()
            ->contain(['Album', 'User']);
        $foto = $this->paginate($query);

        $this->set(compact('foto'));
    }

    /**
     * View method
     *
     * @param string|null $id Foto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $foto = $this->Foto->get($id, contain: ['Album', 'User', 'Komentar', 'Like']);
        $this->set(compact('foto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $foto = $this->Foto->newEmptyEntity();
        if ($this->request->is('post')) {
            $files = $this->request->getUploadedFiles();
            $files['foto']->getStream();
            $files['foto']->getSize();
            $files['foto']->getClientFileName();

            $myname = $this->request->getData()['foto']->getClientFileName();
            $myext = substr(strchr($myname, "."), 1);

            $mypath = "upload/".$myname.".".$myext;
            $foto = $this->Foto->patchEntity($foto, $this->request->getData());
            $foto->foto = $myname.".".$myext;
            $files['foto']->moveTo(WWW_ROOT.$mypath);
            if ($this->Foto->save($foto)) {
                $this->Flash->success(__('The foto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The foto could not be saved. Please, try again.'));
        }
        $album = $this->Foto->Album->find('list', limit: 200)->all();
        $user = $this->Foto->User->find('list', limit: 200)->all();
        $this->set(compact('foto', 'album', 'user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Foto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $foto = $this->Foto->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $foto = $this->Foto->patchEntity($foto, $this->request->getData());
            if ($this->Foto->save($foto)) {
                $this->Flash->success(__('The foto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The foto could not be saved. Please, try again.'));
        }
        $album = $this->Foto->Album->find('list', limit: 200)->all();
        $user = $this->Foto->User->find('list', limit: 200)->all();
        $this->set(compact('foto', 'album', 'user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Foto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $foto = $this->Foto->get($id);
        if ($this->Foto->delete($foto)) {
            $this->Flash->success(__('The foto has been deleted.'));
        } else {
            $this->Flash->error(__('The foto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
