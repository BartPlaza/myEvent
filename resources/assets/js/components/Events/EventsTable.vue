<template>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col" class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody v-for="(event, index) in events">
    <event-row :event="event" :iterator="index+1"></event-row>
  </tbody>
</table>
</template>
<script>
	export default{
		props: ['events']
	}
</script>