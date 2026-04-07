<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h3 class="mb-0"><?= __('login') ?></h3>
                </div>
                <div class="card-body p-4">
                    <?= $this->Flash->render() ?>
                    <?= $this->Form->create(null) ?>
                    <fieldset class="border-0 p-0">
                        <legend class="text-secondary small mb-4"><?= __('Ingrese sus credenciales') ?></legend>
                        
                        <div class="mb-3">
                            <?= $this->Form->control('correo', [
                                'label' => ['text' => 'Correo electrónico', 'class' => 'form-label'],
                                'required' => true,
                                'class' => 'form-control',
                                'placeholder' => 'ejemplo@correo.com'
                            ]) ?>
                        </div>

                        <div class="mb-4">
                            <?= $this->Form->control('password', [
                                'label' => ['text' => 'Contraseña', 'class' => 'form-label'],
                                'type' => 'password',
                                'required' => true,
                                'class' => 'form-control',
                                'placeholder' => '********'
                            ]) ?>
                        </div>
                    </fieldset>
                    
                    <div class="d-grid">
                        <?= $this->Form->button(__('Entrar'), ['class' => 'btn btn-primary btn-lg']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
                <div class="card-footer text-center py-3 bg-light">
                    <small class="text-muted">Gestión de Plantas &copy; 2026</small>
                </div>
            </div>
        </div>
    </div>
</div>