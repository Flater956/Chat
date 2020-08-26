<?php
namespace WebSocketServer;
set_time_limit(0);

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

require_once 'vendor/autoload.php';

class Chat implements MessageComponentInterface {
    protected $clients;
    protected $users;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->users = [];
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
    }

    public function onMessage(ConnectionInterface $from, $data) {
        $data = json_decode($data);
        $type = $data->type;
        switch ($type){
            case 'chat':
               $this->chat($data,$type,$from);
                break;
            case 'socket':
                $this->socket($data,$type,$from);
                break;
            case 'disconnect':
                $this->disconnect($data,$type);
                break;

        }
    }

    public function usersHandler($userName){
        if (!empty($this->users)){
            foreach ($this->users as $key=>$user){
                if ($user == $userName){
                    unset($this->users[$key]);
                    break;
                }
            }
        }
    }

    public function chat($data,$type,$from){
        $chat_msg = $data->chat_msg;
        $userName = $data->userName;
        $response_from = 'Вы : '.$chat_msg;
        $response_to = $userName.': '.$chat_msg;
        $from->send(json_encode(array("type"=>$type,"msg"=>$response_from)));
        foreach ($this->clients as $client) {
            if ($from != $client) {
                $client->send(json_encode(array("type"=>$type,"msg"=>$response_to)));
            }
        }
    }

    public function disconnect($data,$type){
        $userName = $data->userName;
        $response_to = $userName.' вышел из чата';
        $this->usersHandler($userName);
        $this->users=array_values($this->users);
        foreach ($this->clients as $client){
            $client->send(json_encode(array("type"=>$type,"msg"=>$response_to,"users"=>$this->users)));
        }
    }

    public function socket($data,$type,$from){
        $userName = $data->userName;
        $this->usersHandler($userName);
        array_push($this->users,$userName);
        $this->users=array_values($this->users);
        $response_from = 'Вы присоединились к чату';
        $response_to = $userName.' присоединился к чату';
        $from->send(json_encode(array("type"=>$type,"msg"=>$response_from,"users"=>$this->users)));
        foreach ($this->clients as $client) {
            if ($from != $client) {
                $client->send(json_encode(array("type"=>$type,"msg"=>$response_to,"users"=>$this->users)));
            }
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Ошибка: {$e->getMessage()}\n";
        $conn->close();
    }
}
$server = IoServer::factory(
    new  HttpServer(new WsServer(new Chat())),
    8080
);
$server->run();
