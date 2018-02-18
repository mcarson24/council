<template>
    <modal name="channel-form" @before-open="openedModal" height="auto" transition="slide">
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
                <a href="#" class="btn mr-4" @click="this.closeModal">Cancel</a>
			    <a href="#" type="submit" class="btn is-green" @click="this.createChannel">Add Channel</a>
			</div>
		</div>
    </modal>
</template>

<script>
	export default {
		data() {
			return {
				name: '',
				description: '',
				archived: false,
				errors: [],
				request: '',
				channel: ''
			}
		},
		methods: {
			createChannel() {
				axios[this.request](this.url, {
					name: this.name,
					description: this.description,
					archived: this.archived
				}).catch(error => {
					this.errors = error.response.data.errors;
					flash(error.response.data.message, 'danger');
				}).then(({ data }) => {
                    this.name = "";
                    this.description = "";

                    flash("Channel has been successfully created!");

                    this.closeModal();
                    // TODO: Update channel list with newly created channel.
                });
			},
			openedModal(event) {
				this.name = event.params.channel.name;
                this.description = event.params.channel.description;
				this.request = event.params.type;
				this.channel = event.params.channel;
				this.errors = [];
			},
			closeModal() {
                this.name = '';
                this.description = '';

                this.$modal.hide('channel-form');

			},
			hasError(field) {
				return Object.keys(this.errors).indexOf(field) >= 0;
			}
		},
		computed: {
			url() {
				if (this.request == 'post') {
					return location.pathname;
					} 
				if (this.request == 'patch') {
					return `${location.pathname}/${this.channel.slug}`;
				}
			}
		}
	}
</script>
