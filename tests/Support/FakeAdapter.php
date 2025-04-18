<?php

declare(strict_types=1);

namespace Yiisoft\Queue\AMQP\Tests\Support;

use BackedEnum;
use LogicException;
use Yiisoft\Queue\Adapter\AdapterInterface;
use Yiisoft\Queue\AMQP\QueueProviderInterface;
use Yiisoft\Queue\Cli\LoopInterface;
use Yiisoft\Queue\JobStatus;
use Yiisoft\Queue\Message\MessageInterface;
use Yiisoft\Queue\Message\MessageSerializerInterface;

final class FakeAdapter implements AdapterInterface
{
    /**
     * @readonly
     */
    private QueueProviderInterface $queueProvider;
    /**
     * @readonly
     */
    private MessageSerializerInterface $serializer;
    /**
     * @readonly
     */
    private LoopInterface $loop;
    public function __construct(QueueProviderInterface $queueProvider, MessageSerializerInterface $serializer, LoopInterface $loop)
    {
        $this->queueProvider = $queueProvider;
        $this->serializer = $serializer;
        $this->loop = $loop;
    }

    public function runExisting(callable $handlerCallback): void
    {
        throw new LogicException('Method not implemented');
    }

    /**
     * @param int|string $id
     */
    public function status($id): JobStatus
    {
        throw new LogicException('Method not implemented');
    }

    public function push(MessageInterface $message): MessageInterface
    {
        throw new LogicException('Method not implemented');
    }

    public function subscribe(callable $handlerCallback): void
    {
        throw new LogicException('Method not implemented');
    }

    /**
     * @param \BackedEnum|string $channel
     */
    public function withChannel($channel): AdapterInterface
    {
        throw new LogicException('Method not implemented');
    }

    public function getChannel(): string
    {
        throw new LogicException('Method not implemented');
    }
}
