<div class="row float-end">
    <div class="col-md-7 offset-md-5">
        <small class="text-muted">
            {{$label}}: {{ $model->created_date }}
        </small>
    </div>
    <div class="col-md-2 offset-md-5">
        <small class="text-muted">
            <a href="{{ $model->user->url }}" class="pr-2">
                <img src="{{ $model->user->avatar }}">
            </a>
        </small>
    </div>
    <div class="col-md-5">
        <small class="text-muted">
            <a href="{{ $model->user->url }}" class="pr-2">
                {{ $model->user->name }}
            </a>
        </small>
    </div>
</div>