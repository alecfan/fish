@extends('home.parent')
<script>
@if (session('update'))
alert("{{ session('update') }}");
@endif
</script>