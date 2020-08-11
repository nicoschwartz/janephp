<?php

namespace Github\Endpoint;

class PullsGetReview extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    protected $owner;
    protected $repo;
    protected $pull_number;
    protected $review_id;
    /**
     * 
     *
     * @param string $owner 
     * @param string $repo 
     * @param int $pullNumber 
     * @param int $reviewId review_id parameter
     */
    public function __construct(string $owner, string $repo, int $pullNumber, int $reviewId)
    {
        $this->owner = $owner;
        $this->repo = $repo;
        $this->pull_number = $pullNumber;
        $this->review_id = $reviewId;
    }
    use \Jane\OpenApiRuntime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{owner}', '{repo}', '{pull_number}', '{review_id}'), array($this->owner, $this->repo, $this->pull_number, $this->review_id), '/repos/{owner}/{repo}/pulls/{pull_number}/reviews/{review_id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Github\Exception\PullsGetReviewNotFoundException
     *
     * @return null|\Github\Model\PullRequestReview
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'Github\\Model\\PullRequestReview', 'json');
        }
        if (404 === $status && mb_strpos($contentType, 'application/json') !== false) {
            throw new \Github\Exception\PullsGetReviewNotFoundException($serializer->deserialize($body, 'Github\\Model\\BasicError', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}