<template>
    <div>
        <span>
            <a href="#"  v-if="isLiked" @click.prevent="unLike">
                 <i class="fas fa-thumbs-up btn btn-primary"></i>
                 You liked({{ dataCount }}) 

            </a>
            <a href="#"  v-else  @click.prevent="like">
                <span style="font-size: 1em; "> <i class="fas fa-thumbs-up btn"> Like ({{ dataCount }})</i></span>

            </a>
        </span>

    </div>

</template>

<script>
    import axios from 'axios'
    export default {

        props: ['tweet', 'liked', 'count'],

        data() {
            return {
                isLiked: false,
                dataCount: 0

            }
        },

        mounted() {
            this.isLiked = this.isLike ? true : false;

            // pass prop values to data
            this.dataCount = this.count;

        },

        computed: {
            isLike() {
                return this.liked;
            }
            // count() {
            //     if(isLike()){
            //         return this.count = this.count + 1;
            //     }



        // watch: {
        //     count : function(){
        //         this.count = this.count + 1 ;
        //     }

        },

        methods: {
            like() {
                axios.post('/like/' + this.tweet)
                    .then(response => this.isLiked = true)
                    //.then(response => this.dataCount = this.dataCount + 1)
                    .then((response) => {
                        this.dataCount++;
                    })
                    .catch(response => console.log(response.data));
                    // return


            },

            unLike() {
                axios.post('/unlike/' + this.tweet)
                    .then(response => this.isLiked = ! this.isLiked)
                    .then((response) => {
                        this.dataCount--;
                    })
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>
