<?php

namespace Tests\Feature;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AdminCreateTest extends TestCase
{
    public function test_create_routes_use_admin_actions(): void
    {
        foreach ([
            'area.admin',
            'trainingcenter.admin',
            'computer.admin',
            'course.admin',
            'teacher.admin',
            'apprentice.admin',
            'programa.admin',
            'oferta.admin',
            'ficha.admin',
            'ambiente.admin',
            'noticia.admin',
        ] as $routeName) {
            $this->assertSame('admin', app('router')->getRoutes()->getByName($routeName)->getActionMethod());
        }
    }

    public function test_successful_admin_create_redirects_to_index(): void
    {
        Http::fake([
            rtrim(env('URL_SERVER_API'), '/').'/courses' => Http::response([], 201),
        ]);

        $response = $this->post(route('course.admin'), [
            'name' => 'Curso de prueba',
            'code' => 'TEST-01',
            'area_id' => 1,
            'training_center_id' => 1,
        ]);

        $response->assertRedirect(route('course.index'))
            ->assertSessionHas('status');

        Http::assertSent(fn (Request $request) => $request->method() === 'POST'
            && $request->url() === rtrim(env('URL_SERVER_API'), '/').'/courses');
    }

    public function test_failed_admin_create_returns_to_form_with_api_error(): void
    {
        Http::fake([
            rtrim(env('URL_SERVER_API'), '/').'/courses' => Http::response([], 404),
        ]);

        $response = $this->from(route('course.create'))->post(route('course.admin'), [
            'name' => 'Curso de prueba',
            'code' => 'TEST-01',
            'area_id' => 1,
            'training_center_id' => 1,
        ]);

        $response->assertRedirect(route('course.create'))
            ->assertSessionHas('api_error');
    }
}
