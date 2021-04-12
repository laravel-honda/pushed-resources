@foreach(app('pushed-resources') as /** @var \Honda\PushedResources\Resource $resource */ $resource)
    {{ $resource->render()  }}
@endforeach
