<?php

namespace Jane\OpenApi2\Tests\Expected\Endpoint;

class TestGetWithUppercasePathParameters extends \Jane\OpenApi2\Tests\Expected\Runtime\Client\BaseEndpoint implements \Jane\OpenApi2\Tests\Expected\Runtime\Client\Endpoint
{
    protected $TestParameter;
    /**
     * 
     *
     * @param string $testParameter 
     */
    public function __construct(string $testParameter)
    {
        $this->TestParameter = $testParameter;
    }
    use \Jane\OpenApi2\Tests\Expected\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{TestParameter}'), array($this->TestParameter), '/test-uppercase-path-parameters/{TestParameter}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}