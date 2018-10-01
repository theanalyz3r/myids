<template>
    <div class="card p-2 mb-4">
        <div class="card-header flex items-center">
            <div class="flex-initial">
                <img :src="screen.default_content.content_url" width="60" :alt="screen.default_content.name" class="mr-2">
            </div>

            <div class="flex-1 justify-center items-center">
                <div v-text="screen.name" class="text-xl md:text-2xl font-bold text-black no-underline" @click="isOpen = ! isOpen"></div>
            </div>

            <div class="flex flex-wrap overflow-y-auto">
                <!-- <div 
                    v-if="screen.categories.length"
                    v-for="(category, index) in screen.categories" :key="index" 
                    >

                    <div :class="category.colour" class="category-btn rounded-full hover:{{category.colour}}-light text-center text-xs text-white mx-1 py-2 px-4">
                        {{category.name}}
                    </div>

                </div> -->
            </div>
        </div>

        <div v-show="isOpen" class="card-details flex-col">
            <div class="md:flex">
                <div class="my-2 md:w-2/3">
                    <div v-html="screen.location" class="text-xl mb-1"></div>

                    <div class="font-bold text-xl mb-2">Default/Current Media</div>
                    <img :src="thumbnailUrl" width="200" :alt="screen.default_content.name" class="mr-2">
                </div>

                <div class="my-2 md:w-1/3 md:px-6 ">
                    <div class="text-xl font-bold">
                        Actions
                    </div>

                    <div>
                        <a :href="previewUrl" class="no-underline text-white">
                            <div class="text-center rounded-full shadow bg-blue hover:bg-blue-dark p-2 my-2">
                                Preview Display
                            </div>
                        </a>
                        <a :href="editUrl" class="no-underline text-white">
                            <div class="text-center rounded-full shadow bg-green hover:bg-green-dark p-2 my-2">
                                Edit Contents
                            </div>
                        </a>
                        <a :href="overrideUrl" class="no-underline text-white">
                            <div class="text-center rounded-full shadow bg-yellow-dark hover:bg-yellow-darker p-2 my-2">
                                Override Contents
                            </div>
                        </a>
                        <a :href="removeUrl" class="no-underline uppercase text-white">
                            <div class="text-center rounded-full shadow font-bold text-white bg-red hover:bg-red-dark p-2 my-2">
                                Remove Display
                            </div>
                        </a>
                    </div>
                </div>

                <div class="my-2 md:w-1/3 md:px-6 ">
                    <div class="text-xl font-bold">
                        Content Active
                    </div>

                    <div v-if="screen.active_contents.length">
                        <div v-for="(content, index) in screen.active_contents" :key="index" class="text-center bg-grey hover:bg-grey-dark p-2 my-2">
                            {{ content.name }}
                        </div>
                    </div>

                    <div v-else class="text-center bg-grey-dark p-2 my-2">
                        No Content Active
                    </div>
                </div>
            </div>

            <div class="card-footer content-end mt-3 flex justify-between items-center">
                <div class="card-meta text-sm text-grey-dark">
                    Created By: {{ creator.name }} on {{ screen.created_at }}
                </div>
            </div>
        </div>
    </div>    
</template>

<script>
    export default {
        props: ['screen', 'creator'],

        data(){
            return{
                isOpen: false
            };
        },

        computed: {
		    editUrl () {
		      return '/screens/' + this.screen.id + '/content/'
            },
            previewUrl () {
		      return '/screens/node/' + this.screen.id
            },
            thumbnailUrl (){
                return '/storage/' + this.screen.default_content.content_url
            },
            overrideUrl () {
		      return '/screens/' + this.screen.id + '/content/'
            },
            removeUrl () {
		      return '/screens/' + this.screen.id + '/destroy/'
            }
        }
    };
</script>
