<template>
    <button @click="onSubmit" class="rounded-full py-2 px-4 text-grey-lighter" :class="{ 'red' : color == 'red' , 'green' : color == 'green' }">
        {{ message }}
    </button>
</template>

<script>
    export default {
        props : ['attributes'],

        data() {
            return {
                contentId: this.attributes.id,
                screenId: this.attributes.pivot.screen_id,
                color: null,
                active: this.attributes.pivot.active
            }
        },

        computed : {
            message : function () {
                if(this.active == true){
                    this.color = 'green';
                }else{
                    this.color = 'red';
                }
                    return (this.color != 'green')?  'Inactive'   :  'Active'   ;
                }
        },
        
        methods: {
            onSubmit : function () {
                if (this.active == true){
                    axios.post('/screens/' + this.screenId + '/' + this.contentId + '/deactivate');
                        flash('Content Deactivated');
                    this.active = false;
                }else{
                    axios.post('/screens/' + this.screenId + '/' + this.contentId + '/activate');
                        flash('Content Activated');
                    this.active = true;
                }
            }
        },

            toggle: function () {
                this.active = !this.active
            }
}
</script>

<style>
    .red{
        background : rgb(253, 0, 0);
    }
    .button{
        color:white;
        padding:20px;
        border:none;
    }
    .green {
        background : rgb(0, 170, 0);
    }
</style>
