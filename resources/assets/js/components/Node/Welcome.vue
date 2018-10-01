<template>
    <div class="welcome" v-if="showWelcome">
        Welcome to Preston Guild Hall
    </div>
</template>

<script>

    export default {

        props: ['screen', 'contents'],
            
        data() {
            return {
                showWelcome: false,
            }
        },

        methods: {
   
        }
    };

</script>

<style>

div .welcome {
  background-color: darkgray;
  position: absolute;
  z-index: 5;
  height: 200px;
  width: 200px;
  padding: 30px;
  margin: 30px;
}

</style>