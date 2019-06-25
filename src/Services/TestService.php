<?php
/**
 * Created by PhpStorm.
 * User: dave
 * Date: 24/06/19
 * Time: 13:25
 */

namespace App\Services;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use Symfony\Component\HttpKernel\KernelInterface;

class TestService implements ConsumerInterface
{
    private $kernel;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    public function execute(AMQPMessage $msg)
    {
        $response = json_decode($msg->body, true);
        $dir = $this->kernel->getProjectDir().'/public/upload/';
        if(!is_dir($dir)){
            mkdir($dir,0777,true);
        }
        $filename = $dir.'test.txt';

        file_put_contents($filename,$response);
    }
}