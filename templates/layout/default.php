<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= __('UPDS TaskManager') ?>: <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <?= $this->Html->css(['normalize.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <style>
        body { font-family: 'Raleway', sans-serif; background-color: #f8f9fa; }
        .navbar-brand { font-size: 1.5rem; }
        .main { min-height: 80vh; }
        .dropdown-menu { border: none; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); }
        .lang-dropdown-btn { font-size: 0.9rem; font-weight: bold; }
        .dropdown-item:active { background-color: #0dcaf0; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= $this->Url->build('/') ?>">
                <i class="bi bi-check2-square text-success"></i> UPDS <span class="text-info">TaskManager</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="bi bi-tree"></i> ' . __('Plantas'), 
                            ['controller' => 'Plantas', 'action' => 'index'], 
                            ['class' => 'nav-link', 'escape' => false]) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="bi bi-list-task"></i> ' . __('Mis Tareas'), 
                            ['controller' => 'Tareas', 'action' => 'index'], 
                            ['class' => 'nav-link', 'escape' => false]) ?>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto align-items-center">
                    
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link dropdown-toggle btn btn-outline-light btn-sm px-3 lang-dropdown-btn" href="#" id="langDrop" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-translate"></i> <?= __('Idioma') ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="langDrop" style="max-height: 300px; overflow-y: auto;">
                            <li><?= $this->Html->link('Español', ['controller' => 'App', 'action' => 'changeLanguage', 'es_ES'], ['class' => 'dropdown-item']) ?></li>
                            <li><?= $this->Html->link('English', ['controller' => 'App', 'action' => 'changeLanguage', 'en_US'], ['class' => 'dropdown-item']) ?></li>
                            <li><?= $this->Html->link('Português', ['controller' => 'App', 'action' => 'changeLanguage', 'pt_BR'], ['class' => 'dropdown-item']) ?></li>
                            <li><?= $this->Html->link('Français', ['controller' => 'App', 'action' => 'changeLanguage', 'fr_FR'], ['class' => 'dropdown-item']) ?></li>
                            <li><?= $this->Html->link('Deutsch', ['controller' => 'App', 'action' => 'changeLanguage', 'de_DE'], ['class' => 'dropdown-item']) ?></li>
                            <li><?= $this->Html->link('Русский', ['controller' => 'App', 'action' => 'changeLanguage', 'ru_RU'], ['class' => 'dropdown-item']) ?></li>
                            <li><?= $this->Html->link('日本語 (Japonés)', ['controller' => 'App', 'action' => 'changeLanguage', 'ja_JP'], ['class' => 'dropdown-item']) ?></li>
                            <li><?= $this->Html->link('한국어 (Coreano)', ['controller' => 'App', 'action' => 'changeLanguage', 'ko_KR'], ['class' => 'dropdown-item']) ?></li>
                            <li><?= $this->Html->link('中文 (Chino)', ['controller' => 'App', 'action' => 'changeLanguage', 'zh_CN'], ['class' => 'dropdown-item']) ?></li>
                            <li><?= $this->Html->link('العربية (Árabe)', ['controller' => 'App', 'action' => 'changeLanguage', 'ar_SA'], ['class' => 'dropdown-item text-end']) ?></li>
                            <li><?= $this->Html->link('हिन्दी (Hindi)', ['controller' => 'App', 'action' => 'changeLanguage', 'hi_IN'], ['class' => 'dropdown-item']) ?></li>
                        </ul>
                    </li>

                    <?php 
                    $userSesion = $this->request->getSession()->read('Auth.User'); 
                    ?>

                    <?php if ($userSesion): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-info fw-bold" href="#" id="userDrop" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i> 
                                <?= h($userSesion['correo'] ?? $userSesion['email']) ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="userDrop">
                                <li>
                                    <?= $this->Html->link('<i class="bi bi-person"></i> ' . __('Mi Perfil'), 
                                        ['controller' => 'Users', 'action' => 'view', $userSesion['id']], 
                                        ['class' => 'dropdown-item', 'escape' => false]) ?>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <?= $this->Html->link('<i class="bi bi-box-arrow-right"></i> ' . __('Cerrar Sesión'), 
                                        ['controller' => 'Users', 'action' => 'logout'], 
                                        ['class' => 'dropdown-item text-danger', 'escape' => false]) ?>
                                </li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <?= $this->Html->link(__('Iniciar Sesión'), 
                                ['controller' => 'Users', 'action' => 'login'], 
                                ['class' => 'btn btn-outline-info btn-sm px-4 fw-bold']) ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <footer class="text-center py-4 mt-5 border-top text-muted bg-white shadow-sm">
        <div class="container">
            <p class="mb-0">&copy; <?= date('Y') ?> - <strong>UPDS</strong> | <?= __('Proyecto Tecnología Web II') ?></p>
            <small>Santa Cruz - Bolivia</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>