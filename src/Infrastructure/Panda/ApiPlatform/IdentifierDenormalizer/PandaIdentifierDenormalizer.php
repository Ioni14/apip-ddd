<?php

namespace Infrastructure\Panda\ApiPlatform\IdentifierDenormalizer;

use Domain\Panda\Model\PandaId;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class PandaIdentifierDenormalizer implements DenormalizerInterface
{
    public function denormalize($data, $type, $format = null, array $context = [])
    {
        if (!$data instanceof PandaId) {
            throw new \InvalidArgumentException('$data must be a PandaId object.');
        }

        return $data->getId();
    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === PandaId::class;
    }
}
