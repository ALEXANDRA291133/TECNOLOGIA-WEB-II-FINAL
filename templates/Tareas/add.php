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
                <div class="card-header bg-success text-white py-3">
                    <h4 class="mb-0"><?= __('Crear Nueva Tarea Multilingüe') ?></h4>
                </div>
                <div class="card-body p-4">
                    <?= $this->Form->create($tarea) ?>
                    
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <?= $this->Form->control('titulo', [
                                'class' => 'form-control',
                                'label' => ['text' => __('Título de la Tarea'), 'class' => 'form-label fw-bold']
                            ]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $this->Form->control('fecha_limite', [
                                'class' => 'form-control',
                                'label' => ['text' => __('Fecha Límite'), 'class' => 'form-label fw-bold']
                            ]) ?>
                        </div>
                    </div>

                    <h5 class="text-secondary mb-3 border-bottom pb-2"><?= __('Descripciones por Idioma') ?></h5>
                    
                    <ul class="nav nav-tabs mb-3" id="languageTabs" role="tablist">
                        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#es" type="button">Español</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#en" type="button">English</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#zh" type="button">中文 (Chino)</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#ar" type="button">العربية (Árabe)</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#fr" type="button">Français</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#ru" type="button">Русский</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#pt" type="button">Português</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#de" type="button">Deutsch</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#ja" type="button">日本語</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#ko" type="button">한국어</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#hi" type="button">हिन्दी (Hindi)</button></li>
                    </ul>

                    <div class="tab-content border p-3 rounded bg-light">
                        <div class="tab-pane fade show active" id="es"><?= $this->Form->control('descripcion_es', ['label' => false, 'class' => 'form-control', 'rows' => 3, 'placeholder' => 'Descripción en Español']) ?></div>
                        <div class="tab-pane fade" id="en"><?= $this->Form->control('descripcion_en', ['label' => false, 'class' => 'form-control', 'rows' => 3, 'placeholder' => 'Description in English']) ?></div>
                        <div class="tab-pane fade" id="zh"><?= $this->Form->control('descripcion_zh', ['label' => false, 'class' => 'form-control', 'rows' => 3, 'placeholder' => '中文描述']) ?></div>
                        <div class="tab-pane fade" id="ar" dir="rtl"><?= $this->Form->control('descripcion_ar', ['label' => false, 'class' => 'form-control', 'rows' => 3, 'placeholder' => 'وصف باللغة العربية']) ?></div>
                        <div class="tab-pane fade" id="fr"><?= $this->Form->control('descripcion_fr', ['label' => false, 'class' => 'form-control', 'rows' => 3, 'placeholder' => 'Description en Français']) ?></div>
                        <div class="tab-pane fade" id="ru"><?= $this->Form->control('descripcion_ru', ['label' => false, 'class' => 'form-control', 'rows' => 3, 'placeholder' => 'Описание на русском']) ?></div>
                        <div class="tab-pane fade" id="pt"><?= $this->Form->control('descripcion_pt', ['label' => false, 'class' => 'form-control', 'rows' => 3, 'placeholder' => 'Descrição en Português']) ?></div>
                        <div class="tab-pane fade" id="de"><?= $this->Form->control('descripcion_de', ['label' => false, 'class' => 'form-control', 'rows' => 3, 'placeholder' => 'Beschreibung auf Deutsch']) ?></div>
                        <div class="tab-pane fade" id="ja"><?= $this->Form->control('descripcion_ja', ['label' => false, 'class' => 'form-control', 'rows' => 3, 'placeholder' => '日本語での説明']) ?></div>
                        <div class="tab-pane fade" id="ko"><?= $this->Form->control('descripcion_ko', ['label' => false, 'class' => 'form-control', 'rows' => 3, 'placeholder' => '한국어 설명']) ?></div>
                        <div class="tab-pane fade" id="hi"><?= $this->Form->control('descripcion_hi', ['label' => false, 'class' => 'form-control', 'rows' => 3, 'placeholder' => 'हिन्दी में विवरण']) ?></div>
                    </div>

                    <div class="mt-4 d-grid gap-2 d-md-flex justify-content-md-end">
                        <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['class' => 'btn btn-outline-secondary me-md-2']) ?>
                        <?= $this->Form->button(__('Guardar Tarea'), ['class' => 'btn btn-success px-5']) ?>
                    </div>
                    
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>