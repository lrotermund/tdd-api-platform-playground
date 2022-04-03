<?php

namespace App\Tests\Api;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class BookTest extends ApiTestCase
{
    public function testCreateBookHappyPath()
    {
        $response = static::createClient()->request('POST', '/books', ['json' => [
            'isbn' => '9780321146533',
            'title' => 'Test Driven Development: By Example',
            'description' => 'Clean code that works--now. This is the seeming contradiction that lies behind much of the pain of programming. Test-driven development replies to this contradiction with a paradox--test the program before you write it.',
            'author' => 'Kent Beck',
            'publicationDate' => '8. November 2002',
        ]]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertJsonContains([
            '@context' => '/contexts/Book',
            '@type' => 'Book',
            'isbn' => '9780321146533',
            'title' => 'Test Driven Development: By Example',
            'description' => 'Clean code that works--now. This is the seeming contradiction that lies behind much of the pain of programming. Test-driven development replies to this contradiction with a paradox--test the program before you write it.',
            'author' => 'Kent Beck',
            'publicationDate' => '2002-11-08T00:00:00+00:00',
            'reviews' => [],
        ]);
    }
}
