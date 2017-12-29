<template>
    <div>
        <h1>{{note.name}}</h1>
    </div>
</template>
<script>
    export default {
        props: {
            note: {}
        },
        mounted() {
            console.log('Note mounted!')
        }
    }
</script>
<style>

</style>