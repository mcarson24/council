<template>
	<table style="border-collapse: collapse">
        <thead class="bg-grey-lightest text-grey-darkest uppercase tracking-wide text-xs">
            <tr>
                <th class="p-4 border-b">Name</th>
                <th class="p-4 border-b">Slug</th>
                <th class="p-4 border-b">Description</th>
                <th class="p-4 border-b">Threads</th>
                <th class="p-4 border-b">Actions</th>
            </tr>
        </thead>

        <tbody>
            <tr v-if="channels.length == 0">
                <td>Nothing here.</td>
            </tr>
            <channel v-else 
                     v-for="channel in channels" 
                     :channel="channel" 
                     :key="channel.id"
                     >
            </channel>
        </tbody>
    </table>
</template>

<script>
    import Channel from './Channel.vue';
	export default {
        components: { Channel },
		props: ['channels']
	}
</script>
