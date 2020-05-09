<?php
declare(strict_types=1);

namespace App\Controller;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

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
        $event=$this->LineBot->getEvent($json)[0];

        $message=$event["message"]["text"];
        $replyToken=$event["replyToken"];

        $this->log($replyToken);
        $this->log($message);

        $textMessageBuilder = new TextMessageBuilder($message." とは何事だ！責任者出てこい！");
		$this->LineBot->bot->replyMessage($replyToken,$textMessageBuilder);
        //$this->LineBot->bot->pushMessage($uid, $textMessageBuilder);

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
