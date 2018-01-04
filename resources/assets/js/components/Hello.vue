<style>
    .hello {
        font-size: 2em;
        color: green;
    }
</style>
<template>
    <div>
        <h1>Hello</h1>
        <p class="hello">Hi {{ name || '匿名9997' }}</p>
        <p>{{ msg }}</p>
    </div>
</template>
<script>
    export default {
        props: {
            name: {
                type: Number,
                default: 100
            }
        },
        //  method wording
        data() {
            return {
                msg: 'This is a Laravel with Vue Demo.fuck'
            }
        }
    }
</script>
