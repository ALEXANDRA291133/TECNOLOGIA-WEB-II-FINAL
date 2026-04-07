<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h2 class="text-primary mb-0 fs-4">
                    <i class="bi bi-person-plus"></i> <?= __('Nuevo Usuario') ?>
                </h2>
                <?= $this->Html->link(
                    '<i class="bi bi-arrow-left"></i> ' . __('Volver a la Lista'),
                    ['action' => 'index'],
                    ['class' => 'btn btn-outline-secondary btn-sm', 'escape' => false]
                ) ?>
            </div>

            <div class="card-body p-4">
                <?= $this->Form->create($user) ?>
                
                <p class="text-muted mb-4 small"><?= __('Información Personal') ?></p>

                <div class="row g-3">
                    <div class="col-md-6">
                        <?= $this->Form->control('nombre', [
                            'class' => 'form-control',
                            'label' => ['text' => __('Nombre'), 'class' => 'form-label'],
                            'placeholder' => __('Escriba el nombre')
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('apellido', [
                            'class' => 'form-control',
                            'label' => ['text' => __('Apellido'), 'class' => 'form-label'],
                            'placeholder' => __('Escriba el apellido')
                        ]) ?>
                    </div>

                    <div class="col-md-12">
                        <?= $this->Form->control('correo', [
                            'class' => 'form-control',
                            'type' => 'email',
                            'label' => ['text' => __('Correo Electrónico'), 'class' => 'form-label'],
                            'placeholder' => 'ejemplo@correo.com'
                        ]) ?>
                    </div>

                    <div class="col-md-6">
                        <?= $this->Form->control('telefono', [
                            'class' => 'form-control',
                            'label' => ['text' => __('Teléfono'), 'class' => 'form-label'],
                            'placeholder' => '+591 ...'
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('language', [
                            'class' => 'form-select',
                            'label' => ['text' => __('Idioma Preferido'), 'class' => 'form-label'],
                            'options' => ['es' => __('Español'), 'en' => __('Inglés')]
                        ]) ?>
                    </div>

                    <div class="col-md-12">
                        <?= $this->Form->control('password', [
                            'class' => 'form-control',
                            'label' => ['text' => __('Contraseña'), 'class' => 'form-label'],
                            'value' => '' // Evita que se autocomplete
                        ]) ?>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['class' => 'btn btn-light']) ?>
                    <?= $this->Form->button(__('Crear Usuario'), ['class' => 'btn btn-success px-4']) ?>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>