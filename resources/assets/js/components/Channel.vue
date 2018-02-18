<template>
	<tr class="border-b" :class="{ 'bg-red-lighter': channel.archived }">
	    <td class="text-sm p-4 border-b" v-text="channel.name"></td>
	    <td class="text-sm p-4 border-b" v-text="channel.slug"></td>
	    <td class="text-sm p-4 border-b" v-text="channel.description"></td>
	    <td class="text-sm p-4 border-b" v-text="channel.threads_count"></td>
	    <td class="text-sm p-4 border-b">
	        <!-- <a :href="href(channel)" class="text-blue link text-sm">Edit</a> -->
	        <a href="#" class="text-blue link text-sm" @click="$modal.show('channel-form', { type: 'patch', channel: channel })">Edit</a>
	    </td>
	</tr>
</template>

<script>
	export default {
		props: ['channel'],
		methods: {
			href(channel) {
				return location.pathname + `/${channel.slug}/edit`;
			}
		}
	}
</script>
