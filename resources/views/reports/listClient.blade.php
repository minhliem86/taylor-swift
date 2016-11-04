@if(!\File::exists(base_path('resources/files/listClient.xml')))
<root>
	<row>
		<client></client>
		<address></address>
		<idcity></idcity>
	</row>
</root>
@else
<row>
	<client>{!!$client!!}</client>
	<address>{!!$address!!}</address>
	<idcity>{!!$idcity!!}</idcity>
</row>
@endif

