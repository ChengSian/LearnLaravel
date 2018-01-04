import Hello from './components/Hello'
require('./bootstrap');

let ok="i'm hello.js"
new Vue({
    // 找到 hello.blade.php 中指定的掛載點元素
    el: '#app',
    data:{
        zzz:'',
        ok:true,
        something:""
    },
    methods:{
        dodo(){
            alert(ok);
        }
    },

    // 使用我們建立的 Hello(.vue) 元件
    components: { Hello }
})