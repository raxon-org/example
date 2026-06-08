<section name="main">
    <div class="logo">
        <a href="https://www.raxon.org/" title="https://www.raxon.org"><img src="{{config('domain.url')}}Icon/android-chrome-192x192.png" alt="Raxon Logo"></a>
    </div>
    <h1><a href="https://www.raxon.org/" title="https://www.raxon.org/">{{literal}}<strong>{{</strong>RAX<strong>}}</strong>{{/literal}}</a></h1>
    <h3>Debug</h3>
    {{if(config('framework.environment') === 'development')}}
    <h1>Read & Parsed: {{$this.#parentNode.#parentNode.#property}}.{{$this.#parentNode.#property}}.{{$this.#property}}</h1>
    <pre>
    {{$controller.data.function = config('controller.function')}}
    {{$controller.data.name = $controller.data.function|>string.uppercase.first}}
    {{$controller.data.body = Core::object(
    file.read(
        config('controller.dir.data') +
        'Index/Html/' +
        $controller.data.name +
        config('extension.json')
    ), Core::JSON
    )}}
{{$controller.data.body|>html.entity.encode}}
{{data.delete('controller')}}
    </pre>
    <h1>Compiled:</h1>
    <pre>
{{$json = Core::object(data.all(), Core::JSON)}}
{{$json|>html.entity.encode}}
    </pre>
    {{/if}}
</section>