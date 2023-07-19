<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

class JsonPlaceholderAPI
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com',
            'timeout' => 2.0,
        ]);
    }

    public function getUsers()
    {
        $response = $this->client->request('GET', '/users');
        return json_decode($response->getBody(), true);
    }

    public function getUserPosts($userId)
    {
        $response = $this->client->request('GET', "/posts?userId=$userId");
        return json_decode($response->getBody(), true);
    }

    public function getUserTodos($userId)
    {
        $response = $this->client->request('GET', "/todos?userId=$userId");
        return json_decode($response->getBody(), true);
    }

    public function getPost($postId)
    {
        $response = $this->client->request('GET', "/posts/$postId");
        return json_decode($response->getBody(), true);
    }

    public function addPost($userId, $title, $body)
    {
        $response = $this->client->request('POST', '/posts', [
            'form_params' => [
                'userId' => $userId,
                'title' => $title,
                'body' => $body
            ]
        ]);
        return json_decode($response->getBody(), true);
    }

    public function updatePost($postId, $title, $body)
    {
        $response = $this->client->request('PUT', "/posts/$postId", [
            'form_params' => [
                'title' => $title,
                'body' => $body
            ]
        ]);
        return json_decode($response->getBody(), true);
    }

    public function deletePost($postId)
    {
        $response = $this->client->request('DELETE', "/posts/$postId");
        return $response->getStatusCode() == 200;
    }
}

$api = new JsonPlaceholderAPI();