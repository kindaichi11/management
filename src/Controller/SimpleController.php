<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Simple Controller
 *
 *
 * @method \App\Model\Entity\Simple[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SimpleController extends AppController
{

    public function initialize()
    {
        // レイアウト使用
        $this->viewBuilder()->setLayout('simple');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

    }

}
