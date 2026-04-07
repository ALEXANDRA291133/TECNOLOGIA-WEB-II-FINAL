<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TareasTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        // Configuración de la tabla en MariaDB [cite: 18, 31]
        $this->setTable('tareas');
        $this->setDisplayField('titulo');
        $this->setPrimaryKey('id');

        // Registro automático de fechas de creación y modificación [cite: 12]
        $this->addBehavior('Timestamp'); 

        // Relación: Cada tarea pertenece a un usuario [cite: 11, 36]
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('titulo', 'El título es obligatorio')
            ->notEmptyString('user_id');

        return $validator;
    }
}