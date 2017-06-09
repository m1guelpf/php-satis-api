<?php

namespace M1guelpf\SatisAPI;

use GuzzleHttp\Client;

class Satis
{
    /** @var \GuzzleHttp\Client */
    protected $client;

    /** @var string */
    protected $baseUrl;

    /** @var array */
    protected $headers;

    /**
     * @param string             $baseUrl
     * @param array              $headers
     */
    public function __construct($baseUrl = null, array $headers = [])
    {
        $this->client = new Client();

        $this->baseUrl = $baseUrl;

        $this->headers = isset($headers['User-Agent']) ? array_merge($headers, ['User-Agent' => 'm1guelpf/php-satis-api']) : $headers;
    }

    /**
     * @param string $baseUrl
     *
     * @return self
     */
    public function instance($baseUrl)
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * @return \GuzzleHttp\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param \GuzzleHttp\Client $client
     *
     * @return self
     */
    public function setClient($client)
    {
        if ($client instanceof Client) {
            $this->client = $client;
        }

        return $this;
    }

    /**
     * @param array $headers
     *
     * @return self
     */
    public function headers($headers)
    {
      $this->headers = isset($headers['User-Agent']) ? array_merge($headers, ['User-Agent' => 'm1guelpf/php-satis-api']) : $headers;

      return $this;
    }

    /**
     * @return array
     */
    public function getPackages()
    {
        return $this->get('/packages.json')['packages'];
    }

    /**
     * @return array
     */
    public function getComposer()
    {
        return $this->get('/packages.json');
    }

    /**
     * @return array
     */
    public function getIncludes()
    {
        return $this->get('/packages.json')['includes'];
    }

    /**
     * @return array
     */
    public function getCustom($url, $params)
    {
        return $this->get($url, $params);
    }

    /**
     * @param string $resource
     * @param array  $query
     *
     * @return array
     */
    protected function get($resource, array $query = [])
    {
        $data['headers'] = $this->headers;
        $data['query'] = $query;
        $results = $this->client
            ->get("{$this->baseUrl}{$resource}", $data)
            ->getBody()
            ->getContents();

        return json_decode($results, true);
    }
}
