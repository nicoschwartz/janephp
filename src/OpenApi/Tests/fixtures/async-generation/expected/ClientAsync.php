<?php

namespace Jane\OpenApi\Tests\Expected;

class ClientAsync extends \Jane\OpenApiRuntime\Client\AmpArtaxClient
{
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Jane\OpenApi\Tests\Expected\Exception\GetTestBadRequestException
     * @throws \Jane\OpenApi\Tests\Expected\Exception\GetTestNotFoundException
     *
     * @return \Amp\Promise<null|\Jane\OpenApi\Tests\Expected\Model\Schema|\Amp\Artax\Response>
     */
    public function getTest(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeArtaxEndpoint(new \Jane\OpenApi\Tests\Expected\Endpoint\GetTest(), $fetch);
    }
    /**
     * 
     *
     * @param int $id id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Jane\OpenApi\Tests\Expected\Exception\GetTestByIdBadRequestException
     * @throws \Jane\OpenApi\Tests\Expected\Exception\GetTestByIdNotFoundException
     *
     * @return \Amp\Promise<null|\Jane\OpenApi\Tests\Expected\Model\TestIdGetResponse200|\Amp\Artax\Response>
     */
    public function getTestById(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeArtaxEndpoint(new \Jane\OpenApi\Tests\Expected\Endpoint\GetTestById($id), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Amp\Promise<null|\Jane\OpenApi\Tests\Expected\Model\Schema[]|\Amp\Artax\Response>
     */
    public function getTestList(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeArtaxEndpoint(new \Jane\OpenApi\Tests\Expected\Endpoint\GetTestList(), $fetch);
    }
    public static function create($httpClient = null)
    {
        if (null === $httpClient) {
            $httpClient = new \Amp\Artax\DefaultClient();
        }
        $serializer = new \Symfony\Component\Serializer\Serializer(\Jane\OpenApi\Tests\Expected\Normalizer\NormalizerFactory::create(), array(new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode())));
        return new static($httpClient, $serializer);
    }
}