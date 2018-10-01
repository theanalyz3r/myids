<template>
    <div>
        <transition name="fade">
            <img :src="currentImage" :key="currentImage"/>
            <!-- <iframe width="1280" height="720" src="https://www.youtube.com/embed/jiLkBxw2pbs?autoplay=1&amp;rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
            </iframe> -->
            <!-- <video autoplay loop>
                <source :src="currentImage" :key="currentImage" type="video/mp4">
            </video> -->
        </transition>
    </div>
</template>

<script>

    export default {

        props: ['screen'],
            
        data() {
            return {
                contentRotating: true,
                contentDuration: 5000,
                screen: this.screen,
                contents: this.screen.active_contents,
                currentNumber: 0,
                timer: null
            }
        },

        created: function () {
            Echo.channel('screens.' + this.screen.systemref)
                .listen('SendActiveContentsList', (data) => {
                    this.contents = data.contents;
                    this.screen = data.screen;
                    console.log('Ive recieved the latest active contents');
                    console.log(data);
                });
            this.startRotation();
        },

        methods: {
            startRotation: function() {
                this.timer = setInterval(this.next, this.contentDuration);
            },

            stopRotation: function() {
                clearTimeout(this.timer);
                this.timer = null;
            },

            next: function() {
                if (this.contentRotating == true){
                    this.currentNumber += 1
                }
            },
        },

        computed: {
            currentImage: function() {
                if(this.contents.length >= 1){
                    return '/storage/' + this.contents[Math.abs(this.currentNumber) % this.contents.length].content_url;
                }
                return '/storage/' + this.screen.default_content.content_url;
            }
        }
    };
</script>

<style>

video {
  position: absolute;
  z-index: 1;
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
  display: block;
  margin: auto;
}

.fade-enter-active, .fade-leave-active {
 transition: all 2s ease;
 overflow: hidden;
 visibility: visible;
 opacity: 1;
 position: absolute;
}
.fade-enter, .fade-leave-to {
 opacity: 0;
 visibility: hidden;
}

</style>