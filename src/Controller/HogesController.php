<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Hoges Controller
 *
 * @property \App\Model\Table\HogesTable $Hoges
 * @method \App\Model\Entity\Hoge[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HogesController extends AppController
{
    public function initialize(): void{
        parent::initialize();
        $this->loadComponent("LineBot");
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
		$json=$this->LineBot->fetch();
		return $this->response = $this->response->withStatus(200);
    }

    public function view($id = null)
    {
        $hoge = $this->Hoges->get($id, [
            'contain' => [],
        ]);

        $this->set('hoge', $hoge);
    }

}
