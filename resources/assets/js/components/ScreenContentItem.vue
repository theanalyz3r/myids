<template>
	<div class="card p-2 mb-4">
		<div class="flex justify-between mb-4">
			<div class="mr-2">
				<a :href="idwithPath" title="Edit Record" class="" >
					<img name="Image" :src="urlwithPath" width="100" :alt="name" class="thumbnail">
				</a>
			</div>
			<div>
				<div v-html="this.name" class="font-bold uppercase tracking-tight mb-2"></div>

				<div class="uppercase tracking-tight text-xs font-bold">
					Created {{created}}
				</div>
				<div class="uppercase tracking-tight text-xs font-bold"> 
					Expires {{expires}}
				</div>
			</div>
			<div class="mr-2">
				<active-button name="active-button" :attributes="content"></active-button>
			</div>
			<div class="">
				<a @click="destroy" class="">
					Remove
				</a>
				<a href="" class="">
					Edit
				</a>
			</div>
		</div>
	</div>
</template>

<script>

	export default {
		props:['contents'],

		data() {
			return{
				id: this.contents.id,
				name: this.contents.name,
				url: this.contents.content_url,
				screenId: this.contents.pivot.screen_id,
				content: this.contents,
				created_at: this.contents.created_at,
				expires_on: this.contents.expires_on,
			}
		},

		computed: {
		    // a computed getter
		    idwithPath: function () {
		      return '/content/' + this.id
		    },
		   	urlwithPath: function () {
		      return '/storage/' + this.url
		    },
		   	editPath: function () {
		      return '/content/' + this.id + '/edit'
			},
			created: function() {
       			return moment(this.created_at).format("ll")
			   },
			expires: function() {
       			return moment(this.expires_on).fromNow()
   			}
		},

		methods: {

			destroy(){
				axios.delete('/screens/' + this.screenId + '/' + this.id + '/remove');

				$(this.$el).fadeOut(300, () => {
					flash('The Item has been Removed from this Display');					
				});
			}
		}

	}

</script>

<style>


</style>