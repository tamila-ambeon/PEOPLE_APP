<!-- Modal -->
<div class="modal fade" id="{{$modal_id}}" tabindex="-1" aria-labelledby="{{$modal_id}}-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="{{$modal_id}}-label">{{$title}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {!! $content !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Відміна</button>
          <button type="button" class="btn btn-success" id="{{$success_button_id}}">Підтверджую</button>
        </div>
      </div>
    </div>
</div>