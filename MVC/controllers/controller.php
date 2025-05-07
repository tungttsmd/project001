<?php
class controller
{
    public function render(string $render_view, array $render_data = [], string $render_layout = '1')
    {
        extract($render_data);
        $view = "views/$render_view.php";
        include "views/layouts/layout-$render_layout.php";
    }
}
