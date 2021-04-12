@foreach(app('pushed-resources')->getResources() as /** @var \Honda\PushedResources\PushedResource $resource */ $resource)
    {!! $resource->render()  !!}
@endforeach
