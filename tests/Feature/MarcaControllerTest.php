<?php

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


public function test_marca_update()
{
    // Crie um usuário para autenticar
    $user = User::factory()->create();
    $this->actingAs($user);

    // Crie uma marca para atualizar
    $marca = Marca::factory()->create();

    // Envie uma solicitação de atualização para o controlador
    $response = $this->put("/marcas/editar/{$marca->id}", [
        'nome' => 'Nova Marca',
    ]);

    // Verifique se a atualização foi bem-sucedida
    $response->assertStatus(302);
    $this->assertDatabaseHas('marcas', [
        'id' => $marca->id,
        'nome' => 'Nova Marca',
    ]);
}

public function test_marca_delete()
{
    // Crie um usuário para autenticar
    $user = User::factory()->create();
    $this->actingAs($user);

    // Crie uma marca para excluir
    $marca = Marca::factory()->create();

    // Envie uma solicitação de exclusão para o controlador
    $response = $this->get("/marcas/delete/{$marca->id}");

    // Verifique se a marca foi excluída com sucesso
    $response->assertStatus(302);
    $this->assertDatabaseMissing('marcas', ['id' => $marca->id]);
}
}