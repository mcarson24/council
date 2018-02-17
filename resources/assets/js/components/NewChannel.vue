<template>
	<p class="mb-8">
        <a class="btn bg-blue" @click="$modal.show('new-channel');">
            New Channel <span class="glyphicon glyphicon-plus"></span>
        </a>

        <modal name="new-channel" height="auto" transition="slide">
        	<div class="p-6 py-8">
				<div class="flex-1 px-4 mb-6">
				    <label for="name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Name</label>
				    <input v-model="name" type="text" 
				    	   class="w-full p-2 leading-normal" 
				    	   :class="{'border-red': hasError('name')}" 
				    	   id="name" name="name"
				    	   >
		    	   	<span v-if="hasError('name')" v-text="this.errors['name'][0]"></span>
				</div>

				<div class="mb-6">
		        	<div class="flex-1 px-4">
					    <label for="description" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Description</label>
					    <input v-model="description" type="text" 
					    	   class="w-full p-2 leading-normal" 
					    	   :class="{'border-red': hasError('description')}" 
					    	   id="description" name="description"
			    	    	   >
	    	    	    <span v-if="hasError('description')" v-text="this.errors['description'][0]"></span>
		        	</div>
				</div>
				
	        	<div class="flex-1 px-4 mb-6">
				    <label for="archived" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Status</label>

				    <select v-model="archived" name="archived" id="archived" 
				    		class="block appearance-none w-full bg-white rounded-none border border-grey-light text-grey-darker py-2 px-4 leading-normal pr-8"
							>
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
		data() {
			return {
				name: '',
				description: '',
				archived: false,
				errors: []
			}
		},
		methods: {
			createChannel() {
				console.log('Will post to: ' + location.pathname +  ` with ${this.name}, ${this.description}, and ${this.archived}`);
				axios.post(location.pathname, {
					name: this.name,
					description: this.description
				}).catch(error => {
					this.errors = error.response.data.errors;
					console.log(this.errors);
					flash(error.response.data.message, 'danger');
				}).then(({ data }) => {
                    this.name = "";
                    this.description = "";

                    flash("Channel has been successfully created!");

                    // TODO: Update channel list with newly created channel.
                    // 		 Render channels with Vue.js
                });
			},
			hasError(field) {
				return Object.keys(this.errors).indexOf(field) >= 0;
			}
		}
	}
</script>
