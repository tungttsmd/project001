<h3>Layout</h3>
<div style="display:flex;justify-content: center; align-items:center;border: 1px solid blue;">
    <div style="max-width: 1140px">
        <?= include $path; ?>
    </div>
    <div>
        <?php var_dump($_POST ?? '') ?>
    </div>
</div>