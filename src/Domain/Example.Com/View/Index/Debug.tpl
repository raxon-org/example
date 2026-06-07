<section name="main">
    <div class="logo">
        <a href="https://www.raxon.org/" title="https://www.raxon.org"><img src="{{config('domain.url')}}Icon/android-chrome-192x192.png" alt="Raxon Logo"></a>
    </div>
    <h1><a href="https://www.raxon.org/" title="https://www.raxon.org/">{{literal}}<strong>{{</strong>RAX<strong>}}</strong>{{/literal}}</a></h1>
    <h3>Debug</h3>
    {{if(config('framework.environment') === 'development')}}
    <h1>Before:</h1>
    {{d(config('controller'))}}
    {{$data = Core::object(data.read(config('controller.dir.data') + 'Index/Html/' + config('controller.title') + config('extension.json')), Core::JSON)}}
    {{$data|>html.entity.encode}}
    <h1>After:</h1>
    <pre>
    {{$json = Core::object(data.all(), Core::JSON)}}
    {{$json|>html.entity.encode}}
    </pre>
    {{/if}}
</section>