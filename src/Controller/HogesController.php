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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
		error_log(print_r($this->getRequest(), true));
		$this->log(env('DATABASE_URL', "not set"));
        $this->log("hoge");
		$hoges = $this->paginate($this->Hoges);

        $this->set(compact('hoges'));

		// $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env("LINE_BOT_ACCESS_TOKEN"));
		// $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => env("LINE_BOT_SECRET")]);

		// $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
		// $bot->pushMessage($to, $textmessagebuilder);
    }

    /**
     * View method
     *
     * @param string|null $id Hoge id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hoge = $this->Hoges->get($id, [
            'contain' => [],
        ]);

        $this->set('hoge', $hoge);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hoge = $this->Hoges->newEmptyEntity();
        if ($this->request->is('post')) {
            $hoge = $this->Hoges->patchEntity($hoge, $this->request->getData());
            if ($this->Hoges->save($hoge)) {
                $this->Flash->success(__('The hoge has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hoge could not be saved. Please, try again.'));
        }
        $this->set(compact('hoge'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hoge id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hoge = $this->Hoges->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hoge = $this->Hoges->patchEntity($hoge, $this->request->getData());
            if ($this->Hoges->save($hoge)) {
                $this->Flash->success(__('The hoge has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hoge could not be saved. Please, try again.'));
        }
        $this->set(compact('hoge'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hoge id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hoge = $this->Hoges->get($id);
        if ($this->Hoges->delete($hoge)) {
            $this->Flash->success(__('The hoge has been deleted.'));
        } else {
            $this->Flash->error(__('The hoge could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
