<?php

namespace App\Controller\Component;

use Cake\Controller\Component;


//Component criado minimizar o uso de linhas com chamadas para models
class CursosAlunosComponent extends Component
{
    public function getVoluntario()
    {
        return [
            2 => 'Não',
            1 => 'Sim',

        ];
    }
    public function getMinistrate()
    {
        return [
            2 => 'Não',
            1 => 'Sim',

        ];
    }
}
