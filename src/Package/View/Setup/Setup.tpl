{{$register = Package.Raxon.Example:Init:register()}}
{{if(!is.empty($register))}}
{{Package.Raxon.Example:Import:role.system()}}
{{$options = options()}}
{{$flags = flags()}}
{{$response = Package.Raxon.Example:Main:site($flags, $options)}}
{{d($response)}}
{{$host.create = Package.Raxon.Example:Main:host.create($flags, $options)}}
{{$host.mapper.create = Package.Raxon.Example:Main:host.mapper.create($flags, $options)}}
{{$host.name.create = Package.Raxon.Example:Main:host.name.create($flags, $options)}}
/*
//close the old 000-default from active apache2 sites
//enable example.local as active apache2 site
*/
{{/if}}