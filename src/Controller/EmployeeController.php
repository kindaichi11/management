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
        // レイアウト使用
        // $this->viewBuilder()->setLayout('hello');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // $this->autoLayout=false;
        // エレメント
        $this->set('header', ['subtitle'=>'ここはsubtitle']);
        $this->set('footer', ['copyright'=>'2020']);
        
        $employee = $this->Employee->find('all')->contain(['position_name']);
        // position_name(役職名)がDBから取れていない場合、配列自体が存在しないのでindexに表示できない
        // https://www.it-swarm.dev/ja/php/php%E3%81%A7%E3%81%AF%E3%80%81%E3%81%A9%E3%81%AE%E3%82%88%E3%81%86%E3%81%AB%E3%81%97%E3%81%A6%E3%82%AA%E3%83%96%E3%82%B8%E3%82%A7%E3%82%AF%E3%83%88%E8%A6%81%E7%B4%A0%E3%82%92%E9%85%8D%E5%88%97%E3%81%AB%E8%BF%BD%E5%8A%A0%E3%81%A7%E3%81%8D%E3%81%BE%E3%81%99%E3%81%8B%EF%BC%9F/1071320853/
        // 上記urlで解決したが調査必要

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
