In english
==========


Description
-----------

This plugin contains useful <a href="http://markitup.jaysalvat.com/home/" target="_blank">Markitup</a> widget, tuned to work with Markdown syntax, extended by Inline uploading of media files to the server and preview.

**sfMarkitupPlugin** - is a way to turn your textarea field into simple but powerful text editor. We added some flavours to it's basic functionality to be more helpful for using in CMS.

![It is looks like this](http://www.blackcrystal.net/uploads/assets/aed09c4ffc4bc816c1576c370ba7ffd3060a6a06.jpg)


Installation and using
----------------------

Add plugin to your project

    $ symfony plugin:install sfMarkitupPlugin
    $ symfony plugin:publish-assets
    
Add sfMarkitupPlugin to enabled_modules list in apps/[app]/config/settings.yml

    enabled_modules: [default, sfMarkitupPlugin]

Use sfWidgetFormMarkitup instead of sfWidgetFormTextarea

    $this->widgetSchema['body'] = new sfWidgetFormMarkitup();
    
    
Advanced configuration
-----------------------
    
This configuration is optional. It is needed if you want to add your own Markdown preview parser or change file uploading processor URL. Add next lines into apps.yml and change values as you want.

    markitup:
      previewAction: sfMarkitupPlugin/preview  # route to preview
      uploadAction:  sfMarkitupPlugin/upload   # route to upload
      uploadTo:      assets  # subfolder where to save uploaded files


Links
------------------------

* <a href="https://github.com/miamibc/sfMarkitupPlugin" target="_blank">sfMarkitupPlugin on GitHub</a>
* <a href="http://www.symfony-project.org/plugins/sfMarkitupPlugin" target="_blank">sfMarkitupPlugin on Symfony Plugins catalogue</a>
* <a href="http://www.blackcrystal.net/lab/sfmarkitupplugin" target="_blank">Project homepage</a>
* <a href="http://www.blackcrystal.net/">Author's homepage</a>

Feel free to ask a questions: miami [grr] blackcrystal.net
----------------------------------------------------------
    
    
-------------------------------------------------------------------
    
    
По-русски
=========


Описание
--------

**sfMarkitupPlugin** - это простой способ превратить поля для ввода текста в удобный текстовый редактор <a href="http://markitup.jaysalvat.com/home/" target="_blank">Markitup</a>. Плагин для Symfony, содержит виджет Markitup настроенный на синтаксис Markdown, дополненный функцией загрузки файлов и предварительным просмотром.

Мы дополнили стандартный функционал редактора теми вещами, которые часто используются в создании CMS. Это прежде всего загрузка картинок на сервер и предварительный просмотр результатов. 

![Это выглядит так](http://www.blackcrystal.net/uploads/assets/aed09c4ffc4bc816c1576c370ba7ffd3060a6a06.jpg)


Установка и использование
-------------------------

Подключите плагин к вашему проекту

    $ symfony plugin:install sfMarkitupPlugin
    $ symfony plugin:publish-assets

Добавьте модуль sfMarkitupPlugin к списку enabled_modules в файл apps/[app]/config/settings.yml

    enabled_modules: [default, sfMarkitupPlugin]

Используйте виджет sfWidgetFormMarkitup в своей форме вместо sfWidgetFormTextarea

    $this->widgetSchema['body'] = new sfWidgetFormMarkitup();


Дополнительные настройки
------------------------

Этот шаг не обязательный, но если вы хотите использовать свой парсер Markdown или свой обработчик загружаемых файлов, вы можете добавить в app.yml следующие настройки:

    markitup:
      previewAction: sfMarkitupPlugin/preview  # путь к preview
      uploadAction:  sfMarkitupPlugin/upload   # путь к upload
      uploadTo:      assets  # подкаталог для загружаемых файлов


Ресурсы
-------

* <a href="https://github.com/miamibc/sfMarkitupPlugin" target="_blank">sfMarkitupPlugin в GitHub</a>
* <a href="http://www.symfony-project.org/plugins/sfMarkitupPlugin" target="_blank">Страница проекта на сайте Symfony Plugins</a>
* <a href="http://www.blackcrystal.net/lab/sfmarkitupplugin" target="_blank">Домашняя страница проекта</a>
* <a href="http://www.blackcrystal.net/">Сайт автора</a>

Не стесняйтесь задавать свои вопросы: miami [гаф] blackcrystal.net
------------------------------------------------------------------
