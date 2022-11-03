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
                <div class="components-preview wide-md mx-auto pt-5">

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

                    @if($quote_paginator->count())

                        @foreach($quote_paginator as $item)
                            <div class="code-block mt-4">
                                <h6 class="overline-title title">{{ __('Цитата #') }}{{ $item->id }} <code>{{ __('Цитатой поделились:') }}</code> [{{ $item->share_count }}]</h6>
                                <div class="btn btn-sm clipboard-init" >
                                    <span class="clipboard-text show_modal_share mr-2" data-modal="#email_share_modal" data-object-id="{{ $item->id }}" data-toggle="tooltip" data-placement="top" title="{{ __('Поделиться через email') }}"><em class="icon ni ni-mail-fill" ></em></span>
                                    <span class="clipboard-text show_modal_share mr-2" data-modal="#telegram_share_modal" data-object-id="{{ $item->id }}" data-toggle="tooltip" data-placement="top" title="{{ __('Поделиться через telegram') }}"><em class="icon ni ni-telegram"></em></span>
                                    <span class="clipboard-text show_modal_share" data-modal="#viber_share_modal" data-object-id="{{ $item->id }}" data-toggle="tooltip" data-placement="top" title="{{ __('Поделиться через viber') }}"><em class="icon ni ni-viber"></em></span>
                                </div>

                                <div class="p-3 bg-secondary-dim text-secondary">{!! $item->quote !!}</div>

                                <div class="mt-3 d-flex justify-content-between align-items-center">
                                    <div class="text-soft">
                                        {{ __('Дата:') }} <code>{{ $item->created_at }}</code>
                                    </div>
                                    <div class="text-soft">
                                        {{ __('Автор:') }} <code>{{ $item->author }}</code>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                        @if($quote_paginator->hasPages())
                            <div class="card-inner">
                                <div class="nk-block-between-md g-3">
                                    <div class="g">
                                        {{ $quote_paginator->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endif
                </div>


            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->

    @include('modules.email_share_modal')
    @include('modules.telegram_share_modal')
        @include('modules.viber_share_modal')
    @include('modules.success_modal')
    @include('modules.error_modal')
</div>

<script src="{{ asset('assets/js/bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}?{{ \Carbon\Carbon::now()->timestamp }}"></script>

</body>
</html>
