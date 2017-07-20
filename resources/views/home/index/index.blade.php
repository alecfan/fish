@extends('home.parent')
<script>
@if (session('update'))
alert('发布成功');
@endif
@if (session('error'))
alert('发布失败');
@endif
</script>