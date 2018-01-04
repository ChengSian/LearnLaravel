{{--<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
@php
$str=<<<form
<form is="Show" v-on:submit.prevent="onSubmit" method="post"  >
    name：<input v-model="formNameField" placeholder="請輸入名稱" type="text" name="name">
    string：<input  v-model="formStringField" placeholder="請輸入字串"  type="text" name="string">
    <input type="submit">
    $id
</form>
form;
echo "$str";
@endphp--}}

<form  v-on:submit.prevent="onSubmit" method="post"  >
    name：<input v-model="formNameField" placeholder="請輸入名稱" type="text" name="name">
    string：<input  v-model="formStringField" placeholder="請輸入字串"  type="text" name="string">
    <input @click="onSubmit($event)" my-data="{{$id}}" type="submit">

</form>
{{--action="/edit/$id"--}}