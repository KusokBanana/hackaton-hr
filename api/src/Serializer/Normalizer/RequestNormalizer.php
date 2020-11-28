<?php

namespace App\Serializer\Normalizer;

use App\Entity\Request;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class RequestNormalizer implements NormalizerInterface, CacheableSupportsMethodInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    public function normalize($request, string $format = null, array $context = []): array
    {
        /* @var $request Request */

        return [
            'id' => $request->getId(),
            'created_at' => $this->normalizer->normalize($request->getCreatedAt(), $format, $context),
            'title' => $request->getTitle(),
            'description' => $request->getDescription(),
            'department' => $request->getDepartment(),
            'completed' => $request->getCompleted(),
        ];
    }

    public function supportsNormalization($data, string $format = null): bool
    {
        return $data instanceof Request;
    }

    public function hasCacheableSupportsMethod(): bool
    {
        return true;
    }
}
