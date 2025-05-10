<?php
class controller
{
    public function render(string $render_view, array $render_data = [], $render_layout = 1)
    {

        extract($render_data);
        $view = "views/$render_view.php";
        include "views/layouts/layout-" . (string) $render_layout . ".php";
    }
    public function header(string $controller, string $action)
    {
        header("location: " .  mvchref($controller, $action));
        exit;
    }
}
