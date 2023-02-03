<!-- add attributes to componenet with $attributes variables and merge -->
<div {{$attributes->merge(['class'=> 'bg-gray-50 border border-gray-200 rounded p-6'])}}>
    <!--slot to surround something with component tags -->
    {{$slot}}
</div>