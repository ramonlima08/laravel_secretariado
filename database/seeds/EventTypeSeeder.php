<?php

use Illuminate\Database\Seeder;
use App\Models\EventType;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1 =  EventType::updateOrCreate([
            'name' => 'Ligou',
            'note' => 'Ligou para o escritório',
        ]);

        $type2 =  EventType::updateOrCreate([
            'name' => 'Agendamento',
            'note' => 'Agendamento de atendimento',
        ]);

    }
}
