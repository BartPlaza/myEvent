<template>
</template>

<script>
    export default {
        data: function(){
            return {
                elements: []
            }
        },
        created() {
            this.giveElementsId()
        },
         methods: {
            giveElementsId: function() {
                let el = document.querySelectorAll('.sidebar > a');
                el.forEach(function(el){
                    console.log(el);
                }) ; 
            }
        }
    }
</script>
