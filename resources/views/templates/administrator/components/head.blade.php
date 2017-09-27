<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="/assets/images/favicon_1.ico">

    <title>@yield('title', 'default') | Hotel</title>

    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/core.css') !!}
    {!! Html::style('assets/css/components.css') !!}
    {!! Html::style('assets/css/icons.css') !!}
    {!! Html::style('assets/css/pages.css') !!}
    {!! Html::style('assets/css/responsive.css') !!}
    {!! Html::style('assets/own/css/me.css') !!}
    {!! Html::style('assets/own/css/rtl.min.css') !!}
    {!! Html::style('assets/own/css/introLoader.css') !!}
    {!! Html::script('assets/js/modernizr.min.js') !!}

    @yield('styles')

</head>
