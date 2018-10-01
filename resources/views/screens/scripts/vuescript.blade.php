<script>
    var socket = io('http://127.0.0.1:6001'); //this is needed to stop the clients page 404 error as an ABSOLUTE address is required for redis to register

        new Vue({
            el: '#screen-container', //the hashtag represents the div container that this Vue instance is initialised for

            data: {
                messages: []
            },
            mounted: function(){

            socket.on("screen-" + #screen_id.val() + ":App\\Events\\PublishToScreenEvent", function(data){
                console.log(data);
                //this.messages.push(data.content);
            }.bind(this));
                // socket.on('pghs01:App\\Events\\PublishToScreen', function(data){ //this need to not be hardcoded and potentially some kind of variable instead??
                //     //console.log(data);
                //     this.images.push(data.defaultimageurl); //this is the line tht pushs data to the array and prepares for the loop through
                // }.bind(this)); //this binds the annonymous function above to 'this' Vue instance
            }
        });


    </script>