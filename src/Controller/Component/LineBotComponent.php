<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * LineBot component
 */
class LineBotComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public $httpClient,$bot;

    public function __construct(){
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env("LINE_BOT_ACCESS_TOKEN"));
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => env("LINE_BOT_SECRET")]);
    }

    public function fetch(){
		try{
            $json=file_get_contents("php://input");
            error_log("READ DATA");
            error_log($json);
            error_log(print_r(json_decode($json, true), true));
            return json_decode($json, true);
        }catch(Exception $e){
            error_log($e->getMessage());
            throw $e;
        }
    }
}
