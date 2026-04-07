<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="text-primary"><?= __('Editar Usuario') ?></h3>
                <div>
                    <?= $this->Html->link(__('Volver a la Lista'), ['action' => 'index'], ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                    <?= $this->Form->postLink(
                        __('Eliminar Usuario'),
                        ['action' => 'delete', $user->id],
                        ['confirm' => __('¿Estás seguro de que quieres eliminar a {0}?', $user->nombre), 'class' => 'btn btn-outline-danger btn-sm']
                    ) ?>
                </div>
            </div>

            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <?= $this->Form->create($user) ?>
                    <fieldset class="border-0 p-0">
                        <legend class="mb-4 text-muted small"><?= __('Información Personal') ?></legend>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('nombre', ['class' => 'form-control', 'label' => ['class' => 'form-label']]) ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('apellido', ['class' => 'form-control', 'label' => ['class' => 'form-label']]) ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <?= $this->Form->control('correo', ['class' => 'form-control', 'label' => ['class' => 'form-label']]) ?>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('telefono', ['class' => 'form-control', 'label' => ['class' => 'form-label']]) ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('language', [
                                    'class' => 'form-select', 
                                    'label' => ['text' => 'Idioma', 'class' => 'form-label'],
                                    'options' => ['es' => 'Español', 'en' => 'Inglés']
                                ]) ?>
                            </div>
                        </div>

                        <div class="mb-4">
                            <?= $this->Form->control('password', [
                                'class' => 'form-control', 
                                'label' => ['text' => 'Nueva Contraseña (dejar en blanco para no cambiar)', 'class' => 'form-label'],
                                'value' => '', 
                                'required' => false
                            ]) ?>
                        </div>
                    </fieldset>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['class' => 'btn btn-light me-md-2']) ?>
                        <?= $this->Form->button(__('Guardar Cambios'), ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>