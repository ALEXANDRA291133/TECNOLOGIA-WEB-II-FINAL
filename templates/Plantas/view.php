<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Planta $planta
 */
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-9">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-success mb-0">
                    <i class="bi bi-tree"></i> <?= h($planta->nombre_comun) ?>
                </h2>
                <div class="btn-group shadow-sm">
                    <?= $this->Html->link(__('Editar Planta'), ['action' => 'edit', $planta->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>
                    <?= $this->Html->link(__('Volver al Catálogo'), ['action' => 'index'], ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                </div>
            </div>

            <div class="card shadow border-0 overflow-hidden">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="card-title mb-0"><?= __('Ficha Técnica Botánica') ?></h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <tr class="border-bottom">
                            <th class="bg-light text-secondary px-4 py-3" style="width: 30%;"><?= __('Nombre Científico') ?></th>
                            <td class="px-4 py-3 fst-italic fw-bold text-dark"><?= h($planta->nombre_cientifico) ?></td>
                        </tr>
                        <tr class="border-bottom">
                            <th class="bg-light text-secondary px-4 py-3"><?= __('Categoría / Tipo') ?></th>
                            <td class="px-4 py-3">
                                <span class="badge rounded-pill bg-info text-dark"><?= h($planta->tipo) ?></span>
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th class="bg-light text-secondary px-4 py-3"><?= __('Hábitat Natural') ?></th>
                            <td class="px-4 py-3"><?= h($planta->habitat) ?></td>
                        </tr>
                        <tr class="border-bottom">
                            <th class="bg-light text-secondary px-4 py-3"><?= __('Estado de Conservación') ?></th>
                            <td class="px-4 py-3">
                                <?php 
                                    // Pequeña lógica para el color del badge según el estado
                                    $badgeClass = 'bg-secondary';
                                    if(str_contains(strtolower($planta->estado_conservacion), 'peligro')) $badgeClass = 'bg-danger';
                                    if(str_contains(strtolower($planta->estado_conservacion), 'preocupación menor')) $badgeClass = 'bg-success';
                                ?>
                                <span class="badge <?= $badgeClass ?>"><?= h($planta->estado_conservacion) ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-light text-secondary px-4 py-3"><?= __('Usos y Propiedades') ?></th>
                            <td class="px-4 py-3 text-muted">
                                <?= $planta->usos ? nl2br(h($planta->usos)) : 'No se han registrado usos para esta planta.' ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer bg-light text-center py-3">
                    <small class="text-muted">ID de Registro: #<?= $this->Number->format($planta->id) ?></small>
                </div>
            </div>

            <div class="mt-3 text-start">
                <?= $this->Html->link(__('← Regresar al listado de plantas'), ['action' => 'index'], ['class' => 'text-decoration-none']) ?>
            </div>
        </div>
    </div>
</div>