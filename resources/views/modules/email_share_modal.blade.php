<!-- Modal Content Code -->
<div class="modal fade" tabindex="-1" id="email_share_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Поделиться через email') }}</h5>
            </div>
            <div class="modal-body">
                <form id="email_share_form" class="ajax_share_form" method="POST" action="{{ route('notification.send_quote_ajax') }}">
                    @csrf
                    <input type="hidden" name="object_id" value="" class="object_id">
                    <input type="hidden" name="source" value="email">
                    <div class="form-group">
                        <label class="form-label">{{ __('Укажите email куда отправить цитату') }}</label>
                        <div class="form-control-wrap">
                            <input type="email" name="source_address" class="form-control" placeholder="{{ __('Укажите email куда отправить цитату') }}" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
               <button type="submit" form="email_share_form" class="btn btn-info">{{ __('Поделиться') }}</button>
            </div>
        </div>
    </div>
</div>
