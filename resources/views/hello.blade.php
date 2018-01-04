<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--<link rel="stylesheet" href="/css/app.css">--}}
    <title>@yield('title')</title>
</head>
<body>
<!-- 準備給 Vue 的掛載點 -->
<div id="app">

    <template v-if="ok">
        <h1>Title</h1>
        <p>Paragraph 1</p>
        <p>Paragraph 2</p>
    </template>


    <!-- 使用我們建立的元件，
         一個有傳入名字，一個沒有 -->
    <input v-model="zzz">
    <hello v-bind:name="name"></hello>
    <hello :name="1234" @click.native="dodo"></hello>

    <input
            v-bind:value="something"
            v-on:input="something = $event.target.value">
    @{{something}}

    <a href="{!!route('student',['student_no'=>'s1234567897'])!!}">zzzzzzz</a>
    @yield('red')

</div>

{{--@include('script')--}}

{{--@component('script',['test'=>$test])--}}
{{--@endcomponent--}}


<!-- 載入打包後的 js 檔 -->
{{--<script src="/js/hello/manifest.js"></script>--}}
{{--<script src="/js/hello/hello-vendor.js"></script>--}}
<script src="/js/hello/hello.js"></script>
<script>
    let ok="i'm blade"
</script>

</body>
</html>