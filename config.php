<?php
use Illuminate\Support\Str;

return [
    'production' => false,
    'baseUrl' => '',
    'siteName' => 'Filament',
    'siteDescription' => 'Filament is a content management framework for rapidly building a beautiful administration interface designed for humans.',
    'projectUrl' => 'https://github.com/laravel-filament/filament',
    'collections' => [],
    'navigation' => require_once('navigation.php'),
    'isActive' => function ($page, $section) {
        return Str::start($page->getPath(), '/') === $section;
    },
];
