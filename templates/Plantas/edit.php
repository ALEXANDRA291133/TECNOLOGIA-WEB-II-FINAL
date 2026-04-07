<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Planta $planta
 */
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="text-primary"><?= __('Editar Información de Planta') ?></h3>
                <?= $this->Html->link(__('Volver al Listado'), ['action' => 'index'], ['class' => 'btn btn-outline-secondary btn-sm']) ?>
            </div>

            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <?= $this->Form->create($planta) ?>
                    <fieldset class="border-0 p-0">
                        <legend class="mb-4 text-muted small"><?= __('Ficha Técnica') ?></legend>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('nombre_comun', [
                                    'class' => 'form-control',
                                    'label' => ['text' => 'Nombre Común', 'class' => 'form-label'],
                                    'placeholder' => 'Ej: Rosa'
                                ]) ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('nombre_cientifico', [
                                    'class' => 'form-control fst-italic',
                                    'label' => ['text' => 'Nombre Científico', 'class' => 'form-label'],
                                    'placeholder' => 'Ej: Rosa gallica'
                                ]) ?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('tipo', [
                                    'class' => 'form-control',
                                    'label' => ['text' => 'Tipo de Planta', 'class' => 'form-label'],
                                    'placeholder' => 'Ej: Arbusto, Árbol, Suculenta'
                                ]) ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('estado_conservacion', [
                                    'class' => 'form-control',
                                    'label' => ['text' => 'Estado de Conservación', 'class' => 'form-label'],
                                    'placeholder' => 'Ej: Preocupación menor, En peligro'
                                ]) ?>
                            </div>

                            <div class="col-md-12 mb-3">
                                <?= $this->Form->control('habitat', [
                                    'class' => 'form-control',
                                    'label' => ['text' => 'Hábitat Natural', 'class' => 'form-label'],
                                    'placeholder' => 'Ej: Zonas templadas, Selvas tropicales'
                                ]) ?>
                            </div>

                            <div class="col-md-12 mb-4">
                                <?= $this->Form->control('usos', [
                                    'type' => 'textarea',
                                    'class' => 'form-control',
                                    'label' => ['text' => 'Usos y Propiedades', 'class' => 'form-label'],
                                    'rows' => 4,
                                    'placeholder' => 'Describe los usos ornamentales, medicinales o industriales...'
                                ]) ?>
                            </div>
                        </div>
                    </fieldset>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end border-top pt-3">
                        <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['class' => 'btn btn-light px-4 me-md-2']) ?>
                        <?= $this->Form->button(__('Guardar Cambios'), ['class' => 'btn btn-primary px-4 shadow-sm']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>

            <div class="mt-4 p-3 bg-light rounded border d-flex justify-content-between align-items-center">
                <span class="text-muted small">¿Deseas eliminar permanentemente esta planta?</span>
                <?= $this->Form->postLink(
                    __('Eliminar Registro'),
                    ['action' => 'delete', $planta->id],
                    ['confirm' => __('¿Estás seguro de eliminar a {0}?', $planta->nombre_comun), 'class' => 'btn btn-sm btn-outline-danger']
                ) ?>
            </div>
        </div>
    </div>
</div>