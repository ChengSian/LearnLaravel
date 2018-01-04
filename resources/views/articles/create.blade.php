@php
$str=<<<form
<form v-on:submit.prevent="onSubmit" method="post"  >
    name：<input v-model="formNameField" placeholder="請輸入名稱" type="text" name="name">
    string：<input  v-model="formStringField" placeholder="請輸入字串"  type="text" name="string">
    <input type="submit">
    $id
</form>
form;
echo "$str";
@endphp


{{--action="/edit/$id"--}}