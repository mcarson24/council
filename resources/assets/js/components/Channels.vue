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
            <tr v-else
            	class="border-b" 
            	:class="{ 'bg-red-lighter': channel.archived }"
            	v-for="channel in channels"
        	>
                <td class="text-sm p-4 border-b" v-text="channel.name"></td>
                <td class="text-sm p-4 border-b" v-text="channel.slug"></td>
                <td class="text-sm p-4 border-b" v-text="channel.description"></td>
                <td class="text-sm p-4 border-b" v-text="channel.threads_count"></td>
                <td class="text-sm p-4 border-b">
                    <a :href="href(channel)" class="text-blue link text-sm">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
	export default {
		props: ['channels'],
		data() {
			return {
				channels: this.channels
			}
		},
		methods: {
			href(channel) {
				return location.pathname + `/${channel.slug}/edit`;
			}
		}
	}
</script>
