<?php

namespace Tests\Feature\Article;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateArticleTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function can_create_articles(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->postJson(('/api/v1/articles/'), [
            'data' => [
                'type' => 'articles',
                'attributes' => [
                    'title' => 'Nuevo Articulo',
                    'slug' => 'Nuevo Articulo',
                    'content' => 'Contenido del Articulo'
                ]
            ]
        ]);

        $response->assertCreated();

        $article = Article::first();

        // $response->assertHeader(
        //     'Location',
        //     url('/api/v1/articles/', $article->getRouteKey())
        // );
        $response->assertExactJson([
            'data' => [
                'type' => 'articles',
                'id' => (string) $article->getRouteKey(),
                'attributes' => [
                    'title' => 'Nuevo Articulo',
                    'slug' => 'Nuevo Articulo',
                    'content' => 'Contenido del Articulo'
                ],
                'links' => [
                    'self' => url('/api/v1/articles', $article->getRouteKey())
                ]
            ]
        ]);
    }

}
