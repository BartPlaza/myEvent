<template>
</template>

<script>
    export default {
        props: ['user'],
        data: function(){
            return {
                elements: [],
                authUser: this.user
            }
        },
        created() {
            this.giveElementsId();
            this.user
        },
         methods: {
            giveElementsId: function() {
                var el = this;
                let items = document.querySelectorAll('.sidebar > a');
                items.forEach(function(item,index){
                    el.elements.push({'id': index, 'active': false});
                });
            },
            makeActive(id){
                this.elements.forEach(function(el){
                    el.active = false;
                });
                this.elements[id].active = true;
            },
            showTab(id){
                this.makeActive(id);
                this.showMyEvents();
            },
            showMyEvents: function(){
                alert('ok');
            }
        }

    }
</script>
