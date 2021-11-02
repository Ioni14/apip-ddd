<?php

namespace Infrastructure\Panda\ApiPlatform\Transformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use Application\Panda\Query\GetPandaOutput;
use Domain\Panda\Model\Panda;

class GetPandaOutputTransformer implements DataTransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function transform($object, string $to, array $context = []): GetPandaOutput
    {
        if (!$object instanceof Panda) {
            throw new \InvalidArgumentException('$object must be a Panda object.');
        }

        return GetPandaOutput::fromPanda($object);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return GetPandaOutput::class === $to && $data instanceof Panda;
    }
}
