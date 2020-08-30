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
        // エレメント設定
        // employeeコントローラーの中で共通
        $this->set('footer', ['copyright'=>'2020MIS研修']);
    }

    /**
     * Index method
     * 従業員一覧
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {   
        // index特有のエレメント設定
        $this->set('header', ['subtitle'=>'従業員一覧']);

        // 従業員検索
        if ($this->request->is('post')) {
            $find = $this->request->getData('Employee.name');
            $employee = $this->Employee->find()->where(['name like' => '%' . $find . '%'])->contain(['position_name']);
        } else {
            $employee = $this->Employee->find('all')->contain(['position_name']);
        }

        // 役職名がDBから取得できていない場合、空のオブジェクトを作成
        foreach ($employee as $emp) {
            // if (is_null($emp->position_name)) {
            //     $emp['position_name'] =  (object) ['position_name' => ''];
            // }

            $emp->position_name ?  null : $emp['position_name'] = (object) ['position_name' => ''];

        }
        $this->set('employee',$employee);
    }

    /**
     * Add method
     * 従業員新規登録
     */
    public function add()
    {
        // add特有のエレメント設定
        $this->set('header', ['subtitle'=>'従業員登録']);

        // 役職名リスト
        $table = $this->loadModel('PositionName');
        $posi_list = $table->find('list' , ['valueField' => 'position_name']);
        $this->set('list', $posi_list);
    }

    /**
     * regist method
     * 従業員新規登録処理
     */
    public function regist() {
        if ($this->request->is('post')){
            $new_data = $this->request->getData('Employee');
            $entity = $this->Employee->newEntity($new_data);
            $this->Employee->save($entity);
        }

        // 一覧画面に戻す
        return $this->redirect(['action'=>'index']);

    }

}
