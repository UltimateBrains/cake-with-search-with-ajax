<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Batches Controller
 *
 * @property \App\Model\Table\BatchesTable $Batches
 *
 * @method \App\Model\Entity\Batch[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BatchesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Subjects', 'Standards', 'Teachers']
        ];
        $batches = $this->paginate($this->Batches);

        $this->set(compact('batches'));
    }

    /**
     * View method
     *
     * @param string|null $id Batch id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $batch = $this->Batches->get($id, [
            'contain' => ['Subjects', 'Standards', 'Teachers', 'Students']
        ]);

        $this->set('batch', $batch);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $batch = $this->Batches->newEntity();
        if ($this->request->is('post')) {
            $batch = $this->Batches->patchEntity($batch, $this->request->getData());
           echo $batch;
            if ($this->Batches->save($batch)) {
                $this->Flash->success(__('The batch has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The batch could not be saved. Please, try again.'));
        }
        $subjects = $this->Batches->Subjects->find('list', ['limit' => 200]);
        $standards = $this->Batches->Standards->find('list', ['limit' => 200]);
        $teachers = $this->Batches->Teachers->find('list', ['limit' => 200]);
        $students = $this->Batches->Students->find('list', ['limit' => 200]);
        $this->set(compact('batch', 'subjects', 'standards', 'teachers', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Batch id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $batch = $this->Batches->get($id, [
            'contain' => ['Students']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $batch = $this->Batches->patchEntity($batch, $this->request->getData());
            if ($this->Batches->save($batch)) {
                $this->Flash->success(__('The batch has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The batch could not be saved. Please, try again.'));
        }
        $subjects = $this->Batches->Subjects->find('list', ['limit' => 200]);
        $standards = $this->Batches->Standards->find('list', ['limit' => 200]);
        $teachers = $this->Batches->Teachers->find('list', ['limit' => 200]);
        $students = $this->Batches->Students->find('list', ['limit' => 200]);
        $this->set(compact('batch', 'subjects', 'standards', 'teachers', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Batch id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $batch = $this->Batches->get($id);
        if ($this->Batches->delete($batch)) {
            $this->Flash->success(__('The batch has been deleted.'));
        } else {
            $this->Flash->error(__('The batch could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
