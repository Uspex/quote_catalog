<!-- Modal Content Code -->
<div class="modal fade" tabindex="-1" id="telegram_share_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Поделиться через telegram') }}</h5>
            </div>
            <div class="modal-body">
                <form id="telegram_share_form" class="ajax_share_form" method="POST" action="{{ route('notification.send_quote_ajax') }}">
                    @csrf
                    <input type="hidden" name="object_id" value="" class="object_id">
                    <input type="hidden" name="source" value="telegram">
                    <div class="form-group">
                        <label class="form-label">{{ __('Укажите номер телефона telegram куда отправить цитату') }}<br> <small>Format: 123-456-7890</small></label>
                        <div class="form-control-wrap">
                            <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="source_address" class="form-control" placeholder="{{ __('Укажите номер телефона telegram куда отправить цитату') }}" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
               <button type="submit" form="telegram_share_form" class="btn btn-info">{{ __('Поделиться') }}</button>
            </div>
        </div>
    </div>
</div>
