<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Page Title  -->
    <title>@yield('title', config('app.name'))</title>

    <meta name="description" content="@yield('description', config('app.name'))">
    <meta name="keywords" content="@yield('keywords', config('app.name'))">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">

    @stack('style')

</head>


<body class="nk-body npc-apps apps-only has-apps-sidebar">

<div class="nk-app-root">

    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ __('Цитаты') }}</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="nk-block-head-content">
                                <a href="{{ route('quote.create') }}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>{{ __('Добавить цитату') }}</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-block">
                    <div class="card card-bordered">
                        @dd($quote_paginator)
                    </div>
                </div>
            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->

</div>

</body>
</html>
