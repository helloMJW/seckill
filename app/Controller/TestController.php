<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use Hyperf\Amqp\Producer;
use App\Amqp\Producer\DemoProducer;
use Hyperf\Utils\ApplicationContext;

class TestController extends AbstractController
{
    

    public function index()
    {
        $this->amqp();
    }


    public function amqp()
    {
        $data = [
            'id' => 1,
            'data' => [
                'title' => '标题',
                'content' => '内容123内容123'
            ],
        ];

        $message = new DemoProducer($data);
        $producer = ApplicationContext::getContainer()->get(Producer::class);
        $result = $producer->produce($message);
    }
}
