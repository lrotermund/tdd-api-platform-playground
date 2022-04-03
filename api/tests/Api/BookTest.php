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
            'reviews' => [
                'The book is well written and the quality of the printed version is top notch but even if that wasn\'t the case I still would rate this 5 stars due to the content alone. TDD is a methodology that it is well worth the try even if at the end of the day might not fit your use case, also this book helps me realize how most of the explanations regarding the emergent design in TDD is wrong and how important is the refactoring step in the red-green-refactor cycle.',
                'Exactly as described',
            ],
        ]]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertJsonContains([
            '@context' => '/contexts/Book',
            '@type' => 'Book',
            'isbn' => '9780321146533',
            'title' => 'Test Driven Development: By Example',
            'description' => 'Clean code that works--now. This is the seeming contradiction that lies behind much of the pain of programming. Test-driven development replies to this contradiction with a paradox--test the program before you write it.',
            'author' => 'Kent Beck',
            'publicationDate' => '8. November 2002',
            'reviews' => [
                'The book is well written and the quality of the printed version is top notch but even if that wasn\'t the case I still would rate this 5 stars due to the content alone. TDD is a methodology that it is well worth the try even if at the end of the day might not fit your use case, also this book helps me realize how most of the explanations regarding the emergent design in TDD is wrong and how important is the refactoring step in the red-green-refactor cycle.',
                'Exactly as described',
            ],
        ]);
    }
}
