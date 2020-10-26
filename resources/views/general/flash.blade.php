<div class="modal fade" id="flashModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('contact.flash_title')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="white-text" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{__('contact.flash_text')}}
            </div>
        </div>
    </div>
</div>

@push('flashScripts')
    <script>$('#flashModal').modal('show')</script>
@endpush
