<script>
	this.socket.on("screen-" + $('#screen_id').val() + ":App\\Events\\PublishToScreenEvent", function(data){
		this.messages.push(data.message);
	}.bind(this));
</script>