{{$register = Package.Raxon.Example:Init:register()}}
{{if(!is.empty($register))}}
{{Package.Raxon.Example:Import:role.system()}}
{{$options = options()}}
{{$flags = flags()}}
{{Package.Raxon.Example:Main:site($flags, $options)}}
{{$host.create = Package.Raxon.Example:Main:host.create($flags, $options)}}
{{$host.mapper.create = Package.Raxon.Example:Main:host.mapper.create($flags, $options)}}
{{$host.name.create = Package.Raxon.Example:Main:host.name.create($flags, $options)}}
{{/if}}