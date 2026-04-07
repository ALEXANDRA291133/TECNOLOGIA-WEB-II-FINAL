<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-primary"><?= __('Listado de Plantas') ?></h3>
        <div>
            <?= $this->Html->link(__('Gestionar Usuarios'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'btn btn-outline-secondary me-2']) ?>
            <?= $this->Html->link(__('Cerrar Sesión'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'btn btn-danger']) ?>
        </div>
    </div>

    <div class="card shadow">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre Común</th>
                        <th>Nombre Científico</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th class="text-center"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($plantas as $planta): ?>
                    <tr>
                        <td class="fw-bold"><?= $this->Number->format($planta->id) ?></td>
                        <td><?= h($planta->nombre_comun) ?></td>
                        <td class="fst-italic"><?= h($planta->nombre_cientifico) ?></td>
                        <td><span class="badge bg-info text-dark"><?= h($planta->tipo) ?></span></td>
                        <td><?= h($planta->estado_conservacion) ?></td>
                        <td class="text-center">
                            <?= $this->Html->link(__('Ver'), ['action' => 'view', $planta->id], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $planta->id], ['class' => 'btn btn-sm btn-outline-warning']) ?>
                            <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $planta->id], [
                                'confirm' => __('¿Borrar {0}?', $planta->nombre_comun),
                                'class' => 'btn btn-sm btn-outline-danger'
                            ]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>