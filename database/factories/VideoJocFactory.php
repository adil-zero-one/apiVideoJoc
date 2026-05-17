<?php

namespace Database\Factories;

use App\Models\VideoJoc;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VideoJoc>
 */
class VideoJocFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //  $table->string('titol');
    //         $table->string('any_llancament');
    //         $table->string('compatibilitat');
    //     // small integer porque no necesito mucho numeros 32,767
    //         $table->smallInteger('duracioJoc');
    //         $table->boolean("disponibilitat");
    //         $table->smallInteger('valoracion');
    //         $table->smallInteger('tipus');
    public function definition(): array
    {
        return [
            // para el titulo del juego el mas cerca era este domain name 
            // https://fakerphp.org/formatters/internet/
            'titol' => $this->faker->domainWord(),
            'any_llancament' => $this->faker->numberBetween(1998, 2026),
            // usare el implode aqui para poder escoger mas de una comptabilidad,
            // si hago solamente randomelement cogera solamente una comptabilitat, pero yo necesito que coja 
            // depende cada juega si es compatible con ps5 solo o pc, ps5, xbox.. 
            // el implode aqui nos ayudara a convertir lo que returna el randomElements() como array
            // a un string separado con comas
            // (si entrais a ver la funcion randomelements retorna: 
            // ($array = ['a', 'b', 'c'], $count = 1, $allowDuplicates = false)
            // allowduplicates no hace falta porque faker ya evita duplicados automaticamente y solo acepta 2 parametros reales
            'compatibilitat' => implode(', ', $this->faker->randomElements(['Ps5', 'Xbox', 'Pc', 'Game Cube', 'Ps4'],
             $this->faker->numberBetween(1, 5))),
             'duracioJoc' => $this->faker->numberBetween(7, 365),
             'disponibilitat' => $this->faker->boolean(),
             //              ($nbMaxDecimals = null, $min = 0, $max = null)
             'valoracion' => $this->faker->randomFloat(1,0,5), // 1 decimal, min 0, max 5 => 4.7, 0.0, 5.0 valoraciones
             'tipus' => $this->faker->randomElement(['Accio','Accio-aventura','Jocs de rol (RPG)','Simulacio','Estrategia','Trencaclosques','Esports','Open World']),
             'preu' => $this->faker->randomFloat(2, 7, 99.99), // hasta 99€, empieza de 7€, con 2digitis hasta 99,99

        ];
    }
}
