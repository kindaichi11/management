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
        // $this->autoLayout=false;
        // エレメント設定
        $this->set('footer', ['copyright'=>'2020MIS研修']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {   
        // エレメント設定
        $this->set('header', ['subtitle'=>'従業員一覧']);

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
     * Add method
     *
     */
    public function add()
    {
        // エレメント設定
        $this->set('header', ['subtitle'=>'従業員登録']);
    }

    /**
     * regist method
     * 従業員新規登録
     * 
     */
    public function regist() {
        if ($this->request->is('post')){
            $data  = $this->request->data['Employee'];
            $entity = $this->Employee->newEntity($data);
            $this->Employee->save($entity);
        }
        return $this->redirect(['action'=>'index']);

    }

}
