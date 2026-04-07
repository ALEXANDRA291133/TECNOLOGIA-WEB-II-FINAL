<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

class PlantasTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('plantas');
        $this->setDisplayField('nombre_comun');
        $this->setPrimaryKey('id');
    }
}