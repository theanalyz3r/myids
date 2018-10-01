<template>
    <nav class="nav flex justify-between text-grey-light text-sm font-bold uppercase">
        <div class="md:flex flex-1">
            
            <div @click="isOpen = ! isOpen" class="nav-btn md:flex-1 flex items-center text-center hover:bg-grey-darkest">
                <div class="flex-1">
                    Menu
                </div>
            </div>

            <!-- <div v-show="isOpen" class="nav-btn md:flex-1 flex nav-notify items-center text-center">
                <div class="flex-1">
                    Live Notifications
                </div>
            </div> -->

            <div v-show="isOpen" class="nav-btn md:flex-1 flex items-center text-center hover:bg-grey-darkest">
                <a class="flex-1 no-underline text-grey-light" href="/screens">
                    Screens
                </a>
            </div>

            <div v-show="isOpen" class="nav-btn md:flex-1 flex items-center text-center hover:bg-grey-darkest">
                <a class="flex-1 no-underline text-grey-light" href="/content">
                    Media
                </a>
            </div>

            <div v-show="isOpen" class="nav-btn md:flex-1 flex items-center text-center hover:bg-grey-darkest">
                <a class="flex-1 no-underline text-grey-light" href="/playlists">
                    Playlists
                </a>
            </div>

            <div v-show="isOpen" class="nav-btn md:flex-1 flex items-center text-center hover:bg-grey-darkest">
                <a class="flex-1 no-underline text-grey-light" href="/settings">
                    Settings
                </a>
            </div>
        </div>

        <div class="nav-btn nav-user flex w-1/2 md:w-1/6 items-center text-center hover:bg-grey-darkest">
            <a class="flex-1 no-underline text-grey-light" href="/profiles">
                Hello, USER!
            </a>
        </div>
    </nav>  
</template>

<script>
    export default {
        props: [''],

        data(){
            return{
                isOpen: false
            }
        }
    };
</script>
