<template>
    <div v-if="showLogo">
        <img class="logo" src="/img/screens/manage/pghlogo.png"/>
    </div>
</template>

<script>

    export default {

        props: ['screen', 'contents'],
            
        data() {
            return {
                showLogo: false,
            }
        }
    };

</script>

<style>


.logo {
    position: absolute;
    z-index: 6;
    bottom: 0;
    left: 0;
    margin: 20px;
    height: 100px;
    width: 100px;
}

</style>