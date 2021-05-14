@foreach(app('pushed-resources')->getResourcesByType($type) as /** @var \Honda\PushedResources\PushedResource $resource */ $resource)
    {!! $resource->render()  !!}
@endforeach
