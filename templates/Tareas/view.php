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
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                    <h4 class="mb-0"><?= h($tarea->titulo) ?></h4>
                    <span class="badge <?= ($tarea->estado == 'Completada') ? 'bg-success' : 'bg-warning text-dark' ?>">
                        <?= h($tarea->estado) ?>
                    </span>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-4 text-muted">
                        <div class="col-sm-6">
                            <strong><?= __('Fecha Límite') ?>:</strong> <?= h($tarea->fecha_limite) ?>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <strong><?= __('Creada el') ?>:</strong> <?= $tarea->created->format('d/m/Y H:i') ?>
                        </div>
                    </div>

                    <h5 class="text-secondary border-bottom pb-2 mb-3"><?= __('Descripciones Multilingües') ?></h5>
                    
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item"><button class="nav-link active" data-bs-toggle="pill" data-bs-target="#v-es" type="button">ES</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#v-en" type="button">EN</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#v-pt" type="button">PT</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#v-fr" type="button">FR</button></li>
                        </ul>

                    <div class="tab-content p-3 border rounded bg-light min-vh-25">
                        <div class="tab-pane fade show active" id="v-es"><?= $this->Text->autoParagraph(h($tarea->descripcion_es) ?: __('Sin descripción.')) ?></div>
                        <div class="tab-pane fade" id="v-en"><?= $this->Text->autoParagraph(h($tarea->descripcion_en) ?: 'No description available.') ?></div>
                        <div class="tab-pane fade" id="v-pt"><?= $this->Text->autoParagraph(h($tarea->descripcion_pt) ?: 'Sem descrição.') ?></div>
                        <div class="tab-pane fade" id="v-fr"><?= $this->Text->autoParagraph(h($tarea->descripcion_fr) ?: 'Pas de description.') ?></div>
                    </div>

                    <div class="mt-4 border-top pt-3 d-flex justify-content-between">
                        <?= $this->Html->link(__('Volver a la Lista'), ['action' => 'index'], ['class' => 'btn btn-outline-secondary']) ?>
                        <div>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tarea->id], ['class' => 'btn btn-warning me-2']) ?>
                            <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $tarea->id], ['confirm' => __('¿Borrar esta tarea?'), 'class' => 'btn btn-danger']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>