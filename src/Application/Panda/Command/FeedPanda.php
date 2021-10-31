<?php

namespace Application\Panda\Command;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;

#[ApiResource(
    collectionOperations: [
        'post' => ['path' => '/feed-panda', 'messenger' => true, 'output' => false, 'status' => 204],
    ],
    itemOperations: [],
)]
class FeedPanda
{
    public function __construct(
        #[ApiProperty(identifier: true)]
        public int $pandaId,
        public int $bambooLength
    ) {
    }
}
