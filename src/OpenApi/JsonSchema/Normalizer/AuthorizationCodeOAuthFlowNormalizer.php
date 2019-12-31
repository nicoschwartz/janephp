<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Jane\OpenApi\JsonSchema\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class AuthorizationCodeOAuthFlowNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Jane\\OpenApi\\JsonSchema\\Model\\AuthorizationCodeOAuthFlow';
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Jane\OpenApi\JsonSchema\Model\AuthorizationCodeOAuthFlow;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['document-origin']);
        }
        if (isset($data->{'$recursiveRef'})) {
            return new Reference($data->{'$recursiveRef'}, $context['document-origin']);
        }
        $object = new \Jane\OpenApi\JsonSchema\Model\AuthorizationCodeOAuthFlow();
        $data = clone $data;
        if (property_exists($data, 'authorizationUrl') && $data->{'authorizationUrl'} !== null) {
            $object->setAuthorizationUrl($data->{'authorizationUrl'});
            unset($data->{'authorizationUrl'});
        }
        if (property_exists($data, 'tokenUrl') && $data->{'tokenUrl'} !== null) {
            $object->setTokenUrl($data->{'tokenUrl'});
            unset($data->{'tokenUrl'});
        }
        if (property_exists($data, 'refreshUrl') && $data->{'refreshUrl'} !== null) {
            $object->setRefreshUrl($data->{'refreshUrl'});
            unset($data->{'refreshUrl'});
        }
        if (property_exists($data, 'scopes') && $data->{'scopes'} !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'scopes'} as $key => $value) {
                $values[$key] = $value;
            }
            $object->setScopes($values);
            unset($data->{'scopes'});
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/^x-/', $key_1)) {
                $object[$key_1] = $value_1;
            }
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getAuthorizationUrl()) {
            $data->{'authorizationUrl'} = $object->getAuthorizationUrl();
        }
        if (null !== $object->getTokenUrl()) {
            $data->{'tokenUrl'} = $object->getTokenUrl();
        }
        if (null !== $object->getRefreshUrl()) {
            $data->{'refreshUrl'} = $object->getRefreshUrl();
        }
        if (null !== $object->getScopes()) {
            $values = new \stdClass();
            foreach ($object->getScopes() as $key => $value) {
                $values->{$key} = $value;
            }
            $data->{'scopes'} = $values;
        }
        foreach ($object as $key_1 => $value_1) {
            if (preg_match('/^x-/', $key_1)) {
                $data->{$key_1} = $value_1;
            }
        }

        return $data;
    }
}
