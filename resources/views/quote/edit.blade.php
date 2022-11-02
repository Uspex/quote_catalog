@extends('layouts.app')

@section('page_title', __('Редактирование цитаты'))
@section('page_excerpt', __('Редактирование цитаты'))

@section('content')

    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between g-3">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">{{ __('Редактирование цитаты') }} </h3>
                </div>
                <div class="nk-block-head-content d-flex">
                    <a href="{{ route('quote.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>{{ __('Назад') }}</span></a>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-bordered">
                <div class="card-aside-wrap">
                    <div class="card-content">
                        <form method="POST" action="{{ route('quote.update', $item->id) }}">
                            @method('PATCH')
                            @csrf

                            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab_general"><em class="icon ni ni-layer-fill"></em><span>{{ __('Цитата') }}</span></a>
                                </li>
                            </ul><!-- .nav-tabs -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_general">
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="row g-4">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="quote">{{ __('Текст цитаты') }}</label>
                                                        <textarea name="quote"
                                                                  id="quote"
                                                                  class="form-control summernote-basic"
                                                                  rows="3">{{ old('quote', $item->quote) }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="author">{{ __('Автор') }}</label>
                                                        <input name="author" value="{{ old('author', $item->author) }}"
                                                               id="author"
                                                               type="text"
                                                               class="form-control"
                                                               required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div><!-- .nk-block -->
                                    </div><!-- .card-inner -->
                                </div>

                            </div>

                            <div class="card-inner">
                                <div class="nk-block text-right">
                                    <button type="submit" class="btn btn-lg btn-primary">{{ __('Сохранить') }}</button>
                                </div>
                            </div>

                        </form>
                    </div><!-- .card-content -->
                </div><!-- .card-aside-wrap -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
@endsection
