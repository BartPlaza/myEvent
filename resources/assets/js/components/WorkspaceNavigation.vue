<template>
</template>

<script>
    export default {
        
        props: ['user'],
        data: function(){
            return {
                elements: [],
                authUser: JSON.parse(this.user),
                myEvents: '',
                editingEvent: {},
                tempEvent: {}
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
            createEvent(){
                this.makeActive(0);
            },
            editEvent(id){
                if(Object.keys(this.editingEvent).length){
                    if(confirm("Do you want to stop editing previouse Event? Your lose all changes.")) {
                    this.editingEvent = {};
                    this.tempEvent = {};
                    } else {
                        return;
                    }
                }

                let editingEventId = this.myEvents.findIndex(function(event){
                    return event.id == id;
                });
                this.editingEvent = this.myEvents[editingEventId];
                this.tempEvent.id = this.myEvents[editingEventId].id;
                this.tempEvent.title = this.myEvents[editingEventId].title;
                this.tempEvent.start_date = this.myEvents[editingEventId].start_date;
                this.tempEvent.start_time = this.myEvents[editingEventId].start_time;
                this.tempEvent.description = this.myEvents[editingEventId].description;
                this.tempEvent.place_id = this.myEvents[editingEventId].place_id;
             
            },
            clearEditing(){
                if (confirm("Do you want to stop editing? You will lose all changes.")) {
                    this.editingEvent = {};
                    this.tempEvent = {};
                } 
            },
            updateEvent(){
                let el = this;
                if(this.editingEvent.title != this.tempEvent.title ||
                   this.editingEvent.description != this.tempEvent.description||
                   this.editingEvent.start_date != this.tempEvent.start_date ||
                   this.editingEvent.start_time != this.tempEvent.start_time)
                    {
                        if(this.tempEvent.title !='' && this.tempEvent.description !='' && this.tempEvent.start_date != '' && this.tempEvent.start_time != ''){

                            if (confirm("Are you sure that you want to update event info?")) {
                                axios({
                                method: 'put',
                                url: '/event/'+this.editingEvent.id+'/edit',
                                data: {
                                    eventTitle: this.tempEvent.title,
                                    eventDescription: this.tempEvent.description,
                                    eventDate: this.tempEvent.start_date,
                                    eventTime: this.tempEvent.start_time
                                }
                                })
                                .then(function (response) {
                                    let eventId = el.myEvents.findIndex(function(event){
                                        return event.id == response.data;
                                    });
                                    let temp = el.myEvents[eventId];
                                    temp.title = el.tempEvent.title;
                                    temp.description = el.tempEvent.description;
                                    temp.start_date = el.tempEvent.start_date;
                                    temp.start_time = el.tempEvent.start_time;
                                    el.editingEvent = {};
                                    el.tempEvent = {};
                                })
                                  .catch(function (error) {
                                    console.log(error);
                                });
                                } 
                        } else {
                            alert('All fields are required');
                        }
                    } else {
                        alert('Nothing was changed!');
                }
            },
            deleteEvent(id){
                let el = this;
                if (confirm("Do you really want to delete this event?")) {
                    axios({
                    method: 'delete',
                    url: '/event/'+id+'/delete'
                    })
                    .then(function (response) {
                        let eventId = el.myEvents.findIndex(function(event){
                            return event.id == response.data;
                        });
                        el.myEvents.splice(eventId,1);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                } 
            }
        }

    }
</script>
