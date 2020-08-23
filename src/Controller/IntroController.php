<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Intro Controller
 *
 *
 * @method \App\Model\Entity\Intro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IntroController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->autoLayout(false);
    }

}
