<?php
class View
{
    /**
     * Передаем данные на страницу и отображаем пользователю
     *
     * @param $content_view
     * @param $params
     * @return void
     */
    function generate($content_view, $params = [])
    {
        if(is_array($params)) {
            // преобразуем элементы массива в переменные
            extract($params);
        }
        include 'application/views/'.$content_view;
    }
}