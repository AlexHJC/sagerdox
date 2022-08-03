@if(session()->has('success'))
<div style="width:800px; margin:0 auto; position: absolute;">
    {{session('success')}}
</div>
@endif