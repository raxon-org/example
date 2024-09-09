{{R3M}}
{{$register = Package.Raxon.Example:Init:register()}}
{{if(!is.empty($register))}}
{{Package.Raxon.Example:Import:role.system()}}
{{$options = options()}}
{{Package.Raxon.Example:Main:site($options)}}
{{$host.create = Package.Raxon.Example:Main:host.create($options)}}
{{$host.mapper.create = Package.Raxon.Example:Main:host.mapper.create($options)}}
{{$host.name.create = Package.Raxon.Example:Main:host.name.create($options)}}
{{/if}}