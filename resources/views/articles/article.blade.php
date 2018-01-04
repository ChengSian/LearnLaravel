{{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>

<style>
    #table{
        border: 1px solid black;
    }

    #table td{
        border: 1px solid black;
    }
</style>
<div id="app">
    <h1>Hello App!</h1>
    {{--<my-component></my-component>--}}
    <p>
        <!-- 使用 router-link 组件来导航. -->
        <!-- 通过传入 `to` 属性指定链接. -->
        <!-- <router-link> 默认会被渲染成一个 `<a>` 标签 -->
        <router-link to="/store">Go to Store</router-link>
{{--        <router-link to="{{action('ArticlesController@store')}}">Go to Store</router-link>--}}
{{--        <a href="{{action('ArticlesController@store')}}">test</a>--}}
        {{--<router-link to="/bar">Go to Bar</router-link>--}}
        <router-link to="/show">Go to Show</router-link>
    </p>
    <!-- 路由出口 -->
    <!-- 路由匹配到的组件将渲染在这里 -->
    <router-view></router-view>
</div>
<script>
    // 0. 如果使用模块化机制编程，導入Vue和VueRouter，要调用 Vue.use(VueRouter)

    // 1. 定义（路由）组件。
    // 可以从其他文件 import 进来
    const NewForm={ template: '<div><div><form v-on:submit.prevent="onSubmit" method="post" action="store">\n' +
        '    name：<input v-model="formNameField" placeholder="請輸入名稱" type="text" name="name">\n' +
        '    string：<input v-model="formStringField" placeholder="請輸入字串" type="text" name="string">\n' +
        '    <input type="submit"> @{{ message }} \n' +
{{--        '{{csrf_field()}}'+--}}
        '</form></div></div>\n',
        data:function(){
            return {
                formNameField:"",
                formStringField:""
            }
        },
        props:['message'],
        methods:{
            onSubmit:function () {
                /* window.axios.defaults.headers.common = {
                     'X-Requested-With': 'XMLHttpRequest'
                 };*/
                /*$.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });*/
                axios.post('/store', {
                    /* firstName: 'Fred',
                     lastName: 'Flintstone'*/

                    name:this.formNameField,
                    string:this.formStringField
                }).then(function (response) {
                    // console.log(response);
                    // document.getElementById("app").innerHTML+=response.data;
                    // window.alert(response.data);
                    // router.go(-1)
                    router.push('/store')

                })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }}
    const Store = {
        template: '<div><input v-model="numOfForm" type="text">' +
        '<button @click="redirect">導向多個表單</button></div>' ,
        data:function () {
            return{
                numOfForm:null,
            }
        },
        methods:{
            redirect:function () {
                router.push(`bar/${this.numOfForm}`)
            }
        }
    }
    const Bar = {
        template: '<div>' +
                    '<new-form :message="forms" v-for="(form,index ) in forms" :key="index"></new-form>' +
                    // '<new-form></new-form>' +
                    // '<p>@{{ check }}</p>'+
                    '<p>@{{ $route.params.id }}</p>'+
                  '</div>',
        data:function () {
            return {
                forms:parseInt(this.$route.params.id),

            }
        },
        methods:{

        },
        components:{
            'new-form':NewForm
        }
    }

    const Show= {
        template: '<div> <div v-if="!submited"><table id="table">\
            @foreach($articles as $article)\
            <tr>\
            name:<td>{{$article->name}}</td>\
            string:<td>{{$article->string}}</td>\
            <button  my-data="{{$article->id}}" @click="sub($event)">修改</button>\
            </tr>\
            @endforeach\
            </table></div></div>',
        data:function () {
            return{
                submited:false,
                resp:null,
                formNameField:"",
                formStringField:""
            }
        },
        methods: {
            sub( ) {
                var vm=this;
                this.submited=true;
                var num=event.target.getAttribute('my-data')
                router.push(`/show/${num}`)
                axios.post(`/show/${num}`, {
                    /* firstName: 'Fred',
                     lastName: 'Flintstone'*/
                    //  name: this.formNameField,
                    // string: this.formStringField

                }).then( (response)=>{
                    // this.$el.appendChild(response.data);
                    // this.resp=response.data
                    $(this.$el).append(response.data);
                    // console.log(response);
                    // document.getElementById("app").innerHTML+=response.data;
                    // window.alert(response.data);

                    // router.go(-1)
                    // router.push('store')
                    // alert("我回來啦");
                })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            onSubmit(){
                axios.post('/store', {
                    /* firstName: 'Fred',
                     lastName: 'Flintstone'*/

                    name:this.formNameField,
                    string:this.formStringField
                }).then(function (response) {
                    // console.log(response);
                    // document.getElementById("app").innerHTML+=response.data;
                    // window.alert(response.data);
                    // router.go(-1)
                    router.push('/store')

                })
                    .catch(function (error) {
                        console.log(error);
                    });
            }

            }
        }


    const Edit={
        template:'<form v-on:submit.prevent="onSubmit" method="post" action="store">\\n\' +\n' +
        '        \'    name：<input v-model="formNameField" placeholder="請輸入名稱" type="text" name="name">\\n\' +\n' +
        '        \'    string：<input v-model="formStringField" placeholder="請輸入字串" type="text" name="string">\\n\' +\n' +
        '        \'    <input type="submit">  \\n\' +\n' +
        '        \'</form>',
        components:{
            'new-form':NewForm
        },
        data:function(){
            return {
                formNameField:"",
                formStringField:""
            }
        },
        methods: {
            sub() {
                // var num=event.target.getAttribute('my-data')
                axios.post(`/show/${num}`, {
                    /* firstName: 'Fred',
                     lastName: 'Flintstone'*/

                    // name: this.formNameField,
                    // string: this.formStringField

                }).then(function (response) {
                    // console.log(response);
                    // document.getElementById("app").innerHTML+=response.data;
                    // window.alert(response.data);
                    // router.go(-1)
                    // router.push('store')
                    alert("我回來啦");
                })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }



    const NotFoundComponent={template:'<p>not have this page</p>'}
    // 2. 定义路由
    // 每个路由应该映射一个组件。 其中"component" 可以是
    // 通过 Vue.extend() 创建的组件构造器，
    // 或者，只是一个组件配置对象。
    // 我们晚点再讨论嵌套路由。


    // 3. 创建 router 实例，然后传 `routes` 配置
    // 你还可以传别的配置参数, 不过先这么简单着吧。
    const router = new VueRouter({
        // history: true,
        // hashbang: false,
        // linkActiveClass: 'active',
        routes: [
            {path:'/store',component:Store},
            {path:'/bar/:id(\\d+)',component:Bar},
            {path:'/show/:id(\\d+)?',component:Show},
            {path: '*', component: NotFoundComponent },
            // {path:'/edit/:id(\\d+)',component:Edit}
        ], // （缩写）相当于 routes: routes
        mode: 'history'
    })




    // 4. 创建和挂载根实例。
    // 记得要通过 router 配置参数注入路由，
    // 从而让整个应用都有路由功能
    const app = new Vue({
        router,
        // el:"#app",
        components: {
            // <my-component> 将只在父组件模板中可用
            'my-component': Bar
        }
    }).$mount('#app')

    // 现在，应用已经启动了！
</script>


{{--

<table>
    @foreach($articles as $article)
        <tr>
            <td>{{$article->name}}</td>
            <td>{{$article->string}}</td>
        </tr>
    @endforeach


</table>--}}
