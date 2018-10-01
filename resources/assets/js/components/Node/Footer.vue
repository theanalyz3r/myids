<template>
    <div class="footer" v-if="showFooter">
        <span>{{ footer_message }}</span>
    </div>
</template>

<script>

    export default {

        props: ['screen'],
            
        data() {
            return {
                showFooter: false,
                footer_message: '',
            }
        },

        created: function () {
            Echo.channel('screens.' + this.screen.systemref)
                .listen('SendFooterMessage', (data) => {
                    this.footer_message = data.screen.footer_message
                });
        },

        methods: {
   
        }
    };

</script>

<style>

.footer {
    font-size: 20px;
    position: fixed;
    z-index: 5;
    bottom: 0;
    height: 72px;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    color:rgb(255, 255, 255);
    border-top: 4px rgba(255, 0, 234, 0.8) solid;
    padding: 15px;
    text-align: center;
}

</style>