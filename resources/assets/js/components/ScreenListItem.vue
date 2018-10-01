<template>
<!-- INDEX ITEM BEGINS -->
	<tr :title="name" class="">

<!-- ID Column -->	
		<td valign="top">{{ id }}</td>

<!-- Preview Column -->	
		<td valign="top">
			<a :href="idwithPath" title="Edit Record" class="" >
				<img name="Image" :src="urlwithPath" width="200" :alt="name" class="thumbnail">
			</a>
		</td>

<!-- Name Column -->
		<td valign="top">
			<h4><b>{{ name }}</b></h4>
			Created: {{ created }}<br>
			Expires: {{ expiresOn }}
		</td>

<!-- Displayed on column -->
		<!-- <td>
			<span v-for="screen in screens">
				<a :href="screenPath(screen)" title="View Screen">
					{{ screen.name }}<br>
				</a>
			</span>
    	</td> -->

<!-- Action Column -->
		<td class="text-right">
            <a :href="idwithPath" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-film" aria-hidden="true"></span> Preview</a>

            <a :href="editPath" class="btn btn-success" role="button"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Edit</a>

            <a @click="destroy" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
        </td>
	</tr>
<!-- INDEX ITEM END -->
</template>

<script>

	export default {
		props:['attributes'],

		data() {
			return{
				id: this.attributes.id,
				name: this.attributes.name,
				url: this.attributes.content_url,
				screens: this.attributes.screens,
				created_at: this.attributes.created_at,
				expires_on: this.attributes.expires_on,
			}
		},

		computed: {

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
			expiresOn: function() {
       			return moment(this.expires_on).fromNow()
   			}
		},

		methods: {

			screenPath: function (screen) {
		      return '/screens/' + screen.id + '/content'
			},

			destroy(){
				axios.delete('/content/' + this.id + '/destroy');

				$(this.$el).fadeOut(300, () => {
					flash('The content has been removed');					
				});
			}
		}

	}

</script>

<style>


</style>