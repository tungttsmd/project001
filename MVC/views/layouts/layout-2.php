<?php
include 'widgets/widget-head-fontLink.php';
include 'widgets/widget-head-meta.php';
include 'widgets/widget-head-pluginLink.php';
include 'widgets/widget-body-footer.php';
include 'widgets/widget-body-scripts.php';
?>
<style>
    #headerNav {
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        z-index: 2;
        box-shadow: 0 0px 10px rgba(128, 128, 128, 0.2) !important;
    }
</style>
<!-- HEADER + NAV -->
<nav id="headerNav" class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-danger" href="#">
            <i class="bi bi-lock-fill"></i> ADMIN VIETNAM
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="<?= mvchref('client', 'index') ?>">Trang chủ</a></li>
            </ul>
            <a class="btn btn-danger ms-2" href="<?= mvchref('client', 'report') ?>">TỐ CÁO LỪA ĐẢO</a>
        </div>
    </div>
</nav>
<?php include $view;
