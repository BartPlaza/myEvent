<template>
</template>

<script>
    export default {
        props: ['user'],
        data: function(){
            return {
                elements: [],
                authUser: JSON.parse(this.user),
                myEvents: ''
            }
        },
        created() {
            this.giveElementsId();
            console.log(this.authUser);
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
            showMyEvents(id){
                let el = this;
                this.makeActive(id);
                axios.get('/' + this.authUser.id + '/events')
                .then(function (response) {
                    el.myEvents = response.data;
                })
                  .catch(function (error) {
                    console.log(error);
                });
            },
            showEvent(id){
                alert(id);
            }
        }

    }
</script>
