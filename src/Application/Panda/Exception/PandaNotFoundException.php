<?php

namespace Application\Panda\Exception;

use Domain\Panda\Model\PandaId;

class PandaNotFoundException extends \RuntimeException
{
    public int $id;

    public function __construct(int $id, $message = '', $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->id = $id;
    }

    public static function fromId(PandaId $id, ?string $message = null): self
    {
        return new self($id->getId(), $message ?? "Panda {$id->getId()} not found.");
    }
}
