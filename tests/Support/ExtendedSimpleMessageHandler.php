<?php

declare(strict_types=1);

namespace Yiisoft\Queue\AMQP\Tests\Support;

use Yiisoft\Queue\Message\MessageInterface;

/**
 * Accepts any values from the queue and writes to the file
 */
final class ExtendedSimpleMessageHandler
{
    /**
     * @readonly
     */
    private FileHelper $fileHelper;
    public function __construct(FileHelper $fileHelper)
    {
        $this->fileHelper = $fileHelper;
    }

    public function handle(MessageInterface $message): void
    {
        $data = $message->getData();
        if (null !== $data) {
            $this->fileHelper->put($data['file_name'], $data['payload']['time']);
        }
    }
}
