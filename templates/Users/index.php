<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="text-primary mb-0"><?= __('Gestión de Usuarios') ?></h3>
        </div>
        <div>
            <?= $this->Html->link(__('Ver Plantas'), ['controller' => 'Plantas', 'action' => 'index'], ['class' => 'btn btn-outline-primary me-2']) ?>
            <?= $this->Html->link(__('Nuevo Usuario'), ['action' => 'add'], ['class' => 'btn btn-success me-2']) ?>
            <?= $this->Html->link(__('Cerrar Sesión'), ['action' => 'logout'], ['class' => 'btn btn-danger']) ?>
        </div>
    </div>

    <div class="card shadow border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                        <th><?= $this->Paginator->sort('nombre') ?></th>
                        <th><?= $this->Paginator->sort('correo') ?></th>
                        <th><?= $this->Paginator->sort('telefono', 'Teléfono') ?></th>
                        <th><?= $this->Paginator->sort('language', 'Idioma') ?></th>
                        <th class="actions text-center"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="fw-bold"><?= $this->Number->format($user->id) ?></td>
                        <td>
                            <?= h($user->nombre) ?> <?= h($user->apellido) ?>
                            <br>
                            <small class="text-muted">Creado: <?= h($user->created) ?></small>
                        </td>
                        <td><?= h($user->correo) ?></td>
                        <td><?= h($user->telefono) ?></td>
                        <td>
                            <span class="badge bg-light text-dark border">
                                <?= h($user->language) ?>
                            </span>
                        </td>
                        <td class="actions text-center">
                            <div class="btn-group" role="group">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-outline-warning']) ?>
                                <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $user->id], [
                                    'confirm' => __('¿Eliminar a {0}?', $user->nombre),
                                    'class' => 'btn btn-sm btn-outline-danger'
                                ]) ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm mb-0">
                <?= $this->Paginator->first('<<') ?>
                <?= $this->Paginator->prev('<') ?>
                <?= $this->Paginator->numbers(['class' => 'page-item']) ?>
                <?= $this->Paginator->next('>') ?>
                <?= $this->Paginator->last('>>') ?>
            </ul>
        </nav>
        <p class="text-muted small mb-0">
            <?= $this->Paginator->counter(__('Página {{page}} de {{pages}}')) ?>
        </p>
    </div>
</div>