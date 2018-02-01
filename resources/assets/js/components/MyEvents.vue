<template>
    <div v-on:showMyEvents="getEvents">

    </div>
</template>

<script>
    export default {
        props: ['user'],
        data: function(){
            return {
                authUser: this.user
            }
        }, 
        methods: {
            getEvents: function(){
                alert('ok');
            }
        },
    }
</script>
