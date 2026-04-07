<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-primary"><?= __('Mis Tareas Multilingües') ?></h3>
        <?= $this->Html->link(__('Ver Plantas'), ['controller' => 'Plantas', 'action' => 'index'], ['class' => 'btn btn-outline-primary me-2']) ?>
        <?= $this->Html->link(__('Nueva Tarea'), ['action' => 'add'], ['class' => 'btn btn-success shadow-sm']) ?>
    </div>

    <div class="card shadow-sm border-0 mb-4 bg-light">
        <div class="card-body">
            <?= $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3']) ?>
            <div class="col-md-5">
                <?= $this->Form->control('q', [
                    'label' => false, 
                    'placeholder' => __('Buscar por título...'), 
                    'class' => 'form-control',
                    'value' => $this->request->getQuery('q')
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= $this->Form->select('estado', [
                    'Pendiente' => __('Pendiente'), 
                    'Completada' => __('Completada')
                ], [
                    'empty' => __('Todos los estados'), 
                    'class' => 'form-select',
                    'value' => $this->request->getQuery('estado')
                ]) ?>
            </div>
            <div class="col-md-3">
                <?= $this->Form->button(__('Filtrar'), ['class' => 'btn btn-primary w-100']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>

    <div class="card shadow border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th><?= __('Título') ?></th>
                        <th><?= __('Estado') ?></th>
                        <th><?= __('Fecha Límite') ?></th>
                        <th class="text-center"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($tareas) > 0): ?>
                        <?php foreach ($tareas as $tarea): ?>
                        <tr>
                            <td class="fw-bold"><?= h($tarea->titulo) ?></td>
                            <td>
                                <?php $badgeClass = ($tarea->estado == 'Completada') ? 'bg-success' : 'bg-warning text-dark'; ?>
                                <span class="badge <?= $badgeClass ?>"><?= h($tarea->estado) ?></span>
                            </td>
                            <td><?= h($tarea->fecha_limite) ?></td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $tarea->id], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tarea->id], ['class' => 'btn btn-sm btn-outline-warning']) ?>
                                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $tarea->id], [
                                        'confirm' => __('¿Estás seguro de eliminar la tarea: {0}?', $tarea->titulo),
                                        'class' => 'btn btn-sm btn-outline-danger'
                                    ]) ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                <?= __('No se encontraron tareas con estos criterios.') ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>