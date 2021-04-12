@foreach(app('pushed-resources') as /** @var \Honda\PushedResources\PushedResource $resource */ $resource)
    {{ $resource->render()  }}
@endforeach
