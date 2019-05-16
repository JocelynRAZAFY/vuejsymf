<?php
/**
 * Created by PhpStorm.
 * User: jocelyn
 * Date: 5/1/19
 * Time: 12:58 AM
 */

namespace App\Services;


use App\Entity\User;
use App\Manager\BaseManager;
use Gos\Bundle\WebSocketBundle\Topic\TopicInterface;
use Gos\Bundle\WebSocketBundle\Client\ClientManipulatorInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Wamp\Topic;
use Gos\Bundle\WebSocketBundle\Router\WampRequest;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class AcmeTopic implements TopicInterface
{
    protected $clientManipulator;

    private $users = [];

    private $tools;

    private $container;

    private $tokenStorage;
    /**
     * @param ClientManipulatorInterface $clientManipulator
     */
    public function __construct(
        ClientManipulatorInterface $clientManipulator,
        ToolsService $tools,ContainerInterface $container,
        TokenStorageInterface $tokenStorage)
    {
        $this->clientManipulator = $clientManipulator;
        $this->tools = $tools;
        $this->container = $container;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * This will receive any Subscription requests for this topic.
     *
     * @param ConnectionInterface $connection
     * @param Topic $topic
     * @param WampRequest $request
     * @return void
     */
    public function onSubscribe(ConnectionInterface $connection, Topic $topic, WampRequest $request)
    {

//        $user = $this->clientManipulator->getClient($connection);
//        $token = $this->container->get('security.token_storage')->getToken();
//        $user = $this->tokenStorage->getToken()->getUser();
        $token = $this->tokenStorage->getToken()->getUser();

        if($token){
            $res = 'Jocelyn '.$token;
        }else{
            $res = 'Onjamalala';
        }

//        $user = $this->tools->getUser();
        $topic->broadcast(['msg' => $res]);
//        if (gettype($user) == "object" && get_class($user) == User::class) {
//            $userId = $user->getId();
//            $userInfo = ['id' => $userId, 'username' => $user->getUsername()];
//            $this->users[$userId] = $userInfo;
//            $topic->broadcast(['msg' => array_values($this->users)]);
//        }else{
//            $topic->broadcast(['msg' => $connection->resourceId . " has joined " . $topic->getId()]);
//        }
        //this will broadcast the message to ALL subscribers of this topic.

    }

    /**
     * This will receive any UnSubscription requests for this topic.
     *
     * @param ConnectionInterface $connection
     * @param Topic $topic
     * @param WampRequest $request
     * @return void
     */
    public function onUnSubscribe(ConnectionInterface $connection, Topic $topic, WampRequest $request)
    {
        //this will broadcast the message to ALL subscribers of this topic.
        $topic->broadcast(['msg' => $connection->resourceId . " has left " . $topic->getId()]);
    }


    /**
     * This will receive any Publish requests for this topic.
     *
     * @param ConnectionInterface $connection
     * @param Topic $topic
     * @param WampRequest $request
     * @param $event
     * @param array $exclude
     * @param array $eligible
     * @return mixed|void
     */
    public function onPublish(ConnectionInterface $connection, Topic $topic, WampRequest $request, $event, array $exclude, array $eligible)
    {
        /*
        	$topic->getId() will contain the FULL requested uri, so you can proceed based on that

            if ($topic->getId() === 'acme/channel/shout')
     	       //shout something to all subs.
        */

        $topic->broadcast([
            'msg' => $event,
        ]);
    }

    /**
     * Like RPC is will use to prefix the channel
     * @return string
     */
    public function getName()
    {
        return 'acme.topic';
    }

}