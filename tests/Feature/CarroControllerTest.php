<?php

namespace Tests\Feature;

use App\Models\Carro;
use App\Models\Marca;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarroControllerTest extends TestCase
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

    public function test_carro_edit()
{
    
    $user = User::factory()->create();

   
    $this->actingAs($user);

  
    $carro = Carro::factory()->create();

 
    $response = $this->get("/carros/editar/{$carro->id}");

    $response->assertStatus(200);

   
}


    
}
