<?php

namespace Tests\Feature;

use App\Models\Marca;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MarcaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_carro_creation()
{
   
    $user = User::factory()->create();

    
    $this->actingAs($user);

   
    $marca = Marca::factory()->create();

    
    $response = $this->post('/carros/novo', [
        'modelo' => 'Carro Teste',
        'placa' => 'ABC-1234',
        'marca_id' => $marca->id,
        'ano' => 2022,
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('carros', ['modelo' => 'Carro Teste']);
}


    public function test_marca_edit()
{

    $user = User::factory()->create();

    $marca = Marca::factory()->create();

    $response = $this->actingAs($user)->get("/marcas/editar/{$marca->id}");
    $response->assertStatus(200);

  
}


}
