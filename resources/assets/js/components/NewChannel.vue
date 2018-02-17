<template>
	<p class="mb-8">
        <a class="btn bg-blue" @click="$modal.show('new-channel');">
            New Channel <span class="glyphicon glyphicon-plus"></span>
        </a>

        <modal name="new-channel" height="auto" transition="slide">
        	<div class="p-6 py-8">
				<div class="flex-1 px-4 mb-6">
				    <label for="name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Name</label>
				    <input type="text" class="w-full p-2 leading-normal" id="name" name="name" required>
				</div>

				<div class="mb-6">
		        	<div class="flex-1 px-4">
					    <label for="description" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Description</label>
					    <input type="text" class="w-full p-2 leading-normal" id="description" name="description" required>
		        	</div>
				</div>
				
	        	<div class="flex-1 px-4 mb-6">
				    <label for="archived" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Status</label>

				    <select name="archived" id="archived" class="block appearance-none w-full bg-white rounded-none border border-grey-light text-grey-darker py-2 px-4 leading-normal pr-8">
				        <option value="0">Active</option>
				        <option value="1">Archived</option>
				    </select>
	        	</div>

				<div class="flex justify-end">
	                <a href="#" class="btn mr-4" @click="$modal.hide('new-channel')">Cancel</a>
				    <a href="#" type="submit" class="btn is-green" @click="this.createChannel">Add Channel</a>
				</div>
			</div>
        </modal>
    </p>
</template>

<script>
	export default {
	}
</script>
