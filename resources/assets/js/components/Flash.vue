<template>
    <div class="flex text-center justify-center items-center z-10 absolute pin-t pin-x" role="alert">
        <transition name="slide-fade">
            <div class="w-1/2 py-2 px-2 rounded-b shadow-lg bg-green-dark uppercase text-white" v-show="show">
                <span class="font-bold">Success!</span><br>
                <span class="font-light">{{ body }}</span>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        props:['message'],

        data(){
            return {
                body: '',
                show: false
            }
        },

        created() {
            if (this.message) {
                this.flash(this.message);
            }

            window.events.$on('flash', message => {
                this.flash(message);
            });
        },

        methods: {
            flash(message){
                this.body = message;
                this.show = true;

                this.hide();
            },

            hide(){
                setTimeout(() => {
                    this.show = false;
                }, 5000);
            }
        }
    };
</script>
<style>
    .slide-fade-enter-active {
        transition: all .3s ease;
    }
    .slide-fade-leave-active {
        transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to {
        transform: translateY(-50px);
        opacity: 0;
    }
</style>