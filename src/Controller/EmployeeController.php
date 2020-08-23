<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Error\Debugger;
use Cake\Log\Log;

/**
 * Employee Controller
 *
 *
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeeController extends AppController
{
    public function initialize()
    {
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // $this->autoLayout=false;
        // エレメント設定
        $this->set('header', ['subtitle'=>'employeeヘッダーです']);
        $this->set('footer', ['copyright'=>'employee フッターです']);
        
        // 検索
        if ($this->request->is('post')) {
            $find = $this->request->data['Employee']['name'];
            $employee = $this->Employee->find()->where(['name like' => '%' . $find . '%'])->contain(['position_name']);
        } else {
            $employee = $this->Employee->find('all')->contain(['position_name']);
        }

        // 役職名がDBから取得できていない場合、空のオブジェクトを取得
        foreach ($employee as $emp) {
            if (is_null($emp->position_name)) {
                $emp['position_name'] =  (object) ['position_name' => ''];
            }
        }
        $this->set('employee',$employee);
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employee->get($id, [
            'contain' => [],
        ]);

        $this->set('employee', $employee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employee->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employee->patchEntity($employee, $this->request->getData());
            if ($this->Employee->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $this->set(compact('employee'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employee->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employee->patchEntity($employee, $this->request->getData());
            if ($this->Employee->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $this->set(compact('employee'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employee->get($id);
        if ($this->Employee->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
