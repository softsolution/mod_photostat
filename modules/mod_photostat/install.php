<?php

    function info_module_mod_photostat(){

        //
        // Описание модуля
        //

        //Заголовок (на сайте)
        $_module['title']        = 'Статистика для фотосайта';

        //Название (в админке)
        $_module['name']         = 'Статистика для фотосайта';

        //описание
        $_module['description']  = 'Показывает статистику по сайту: 1) общее количество пользователей, 2) количество записей ук, 3) фотографий в галерее, 4) размер папки photos 5) произвольный текст';
        
        //ссылка (идентификатор)
        $_module['link']         = 'mod_statistic';
        
        //позиция
        $_module['position']     = 'sidebar';

        //автор
        $_module['author']       = 'soft-solution.ru';

        //текущая версия
        $_module['version']      = '1.10';

        //
        // Настройки по-умолчанию
        //

        $_module['config'] = array();
        $_module['config']['show_users'] = 1;
        $_module['config']['showuс'] = 1;
        $_module['config']['show_photos'] = 1;
        $_module['config']['show_photos_size'] = 1;
        $_module['config']['show_sometext'] = 1;
        
        return $_module;

    }

// ========================================================================== //

    function install_module_mod_photostat(){

        return true;

    }

// ========================================================================== //

    function upgrade_module_mod_photostat(){

        return true;
        
    }

// ========================================================================== //

?>