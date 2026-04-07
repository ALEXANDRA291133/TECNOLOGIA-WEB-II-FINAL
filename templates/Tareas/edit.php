<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tarea $tarea
 */
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow border-0">
                <div class="card-header bg-warning text-dark py-3">
                    <h4 class="mb-0"><?= __('Editar Tarea') ?>: <?= h($tarea->titulo) ?></h4>
                </div>
                <div class="card-body p-4">
                    <?= $this->Form->create($tarea) ?>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <?= $this->Form->control('titulo', ['class' => 'form-control', 'label' => ['text' => __('Título'), 'class' => 'fw-bold']]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $this->Form->control('estado', [
                                'type' => 'select',
                                'options' => ['Pendiente' => __('Pendiente'), 'Completada' => __('Completada')],
                                'class' => 'form-select',
                                'label' => ['text' => __('Estado'), 'class' => 'fw-bold']
                            ]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $this->Form->control('fecha_limite', ['class' => 'form-control', 'label' => ['text' => __('Fecha Límite'), 'class' => 'fw-bold']]) ?>
                        </div>
                    </div>

                    <h5 class="text-secondary mb-3 border-bottom pb-2"><?= __('Editar Descripciones') ?></h5>
                    
                    <ul class="nav nav-tabs mb-3" id="editTabs" role="tablist">
                        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#e-es" type="button">Español</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#e-en" type="button">English</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#e-pt" type="button">Português</button></li>
                    </ul>

                    <div class="tab-content border p-3 rounded bg-light">
                        <div class="tab-pane fade show active" id="e-es"><?= $this->Form->control('descripcion_es', ['label' => false, 'class' => 'form-control', 'rows' => 3]) ?></div>
                        <div class="tab-pane fade" id="e-en"><?= $this->Form->control('descripcion_en', ['label' => false, 'class' => 'form-control', 'rows' => 3]) ?></div>
                        <div class="tab-pane fade" id="e-pt"><?= $this->Form->control('descripcion_pt', ['label' => false, 'class' => 'form-control', 'rows' => 3]) ?></div>
                    </div>

                    <div class="mt-4 d-flex justify-content-end">
                        <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['class' => 'btn btn-outline-secondary me-2']) ?>
                        <?= $this->Form->button(__('Actualizar Tarea'), ['class' => 'btn btn-primary px-4']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>