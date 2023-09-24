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
    // Crie um usuário para autenticar
    $user = User::factory()->create();
    $this->actingAs($user);

    // Crie um carro para editar
    $carro = Carro::factory()->create();

    // Acesse a página de edição do carro
    $response = $this->get("/carros/editar/{$carro->id}");
    $response->assertStatus(200);
}

public function test_carro_update()
{
    // Crie um usuário para autenticar
    $user = User::factory()->create();
    $this->actingAs($user);

    // Crie um carro para atualizar
    $carro = Carro::factory()->create();

    // Envie uma solicitação de atualização para o controlador
    $response = $this->put("/carros/editar/{$carro->id}", [
        'modelo' => 'Novo Modelo',
        'placa' => 'XYZ-5678',
        'marca_id' => $carro->marca_id, // Mantenha a mesma marca
        'ano' => 2023,
    ]);

    // Verifique se a atualização foi bem-sucedida
    $response->assertStatus(302);
    $this->assertDatabaseHas('carros', [
        'id' => $carro->id,
        'modelo' => 'Novo Modelo',
        'placa' => 'XYZ-5678',
        'ano' => 2023,
    ]);
}

public function test_carro_delete()
{
    // Crie um usuário para autenticar
    $user = User::factory()->create();
    $this->actingAs($user);

    // Crie um carro para excluir
    $carro = Carro::factory()->create();

    // Envie uma solicitação de exclusão para o controlador
    $response = $this->get("/carros/delete/{$carro->id}");

    // Verifique se o carro foi excluído com sucesso
    $response->assertStatus(302);
    $this->assertDatabaseMissing('carros', ['id' => $carro->id]);
}
}