<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary mb-0">
                    <i class="bi bi-person-circle"></i> <?= h($user->nombre) ?> <?= h($user->apellido) ?>
                </h2>
                <div class="btn-group shadow-sm">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>
                    <?= $this->Html->link(__('Lista de Usuarios'), ['action' => 'index'], ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                    <?= $this->Html->link(__('Nuevo'), ['action' => 'add'], ['class' => 'btn btn-outline-success btn-sm']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id], [
                        'confirm' => __('¿Seguro que deseas eliminar a {0}?', $user->nombre),
                        'class' => 'btn btn-outline-danger btn-sm'
                    ]) ?>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-light py-3">
                    <h5 class="card-title mb-0 text-muted"><?= __('Detalles del Perfil') ?></h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless align-middle mb-0">
                        <tr>
                            <th class="text-secondary" style="width: 30%;"><?= __('ID de Registro') ?></th>
                            <td class="fw-bold text-dark"># <?= $this->Number->format($user->id) ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary"><?= __('Nombre Completo') ?></th>
                            <td><?= h($user->nombre) ?> <?= h($user->apellido) ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary"><?= __('Correo Electrónico') ?></th>
                            <td><span class="badge bg-light text-primary border"><?= h($user->correo) ?></span></td>
                        </tr>
                        <tr>
                            <th class="text-secondary"><?= __('Idioma') ?></th>
                            <td>
                                <span class="badge rounded-pill bg-info text-dark">
                                    <?= h($user->language == 'es' ? 'Español' : h($user->language)) ?>
                                </span>
                            </td>
                        </tr>
                        <hr>
                        <tr>
                            <th class="text-secondary"><?= __('Fecha de Creación') ?></th>
                            <td class="small text-muted"><?= h($user->created) ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary"><?= __('Última Modificación') ?></th>
                            <td class="small text-muted"><?= h($user->modified) ?></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer bg-white border-top-0 py-3">
                    <?= $this->Html->link(__('← Regresar al listado'), ['action' => 'index'], ['class' => 'text-decoration-none small']) ?>
                </div>
            </div>

        </div>
    </div>
</div>