<template >
    <div >
        <div class="container clear-fix">
            <div class="gif">
                    <h5 class="btn btn-outline-dark rounded-circle">Gif</h5>
                <div class="dropDown">
                    <div class="m-0">
                        Chosse Gif
                        <form class="form-group mt-0 p-4" @submit.prevent="doSearch">
                            <input v-model="query" type="text" placeholder="Gif" >
                            <button  type="submit"  class="btn btn-primary m-2">Search</button>

                        </form>
                    </div>

                    <ul class="">
                        <li   @click="chosseOne(index)" v-for="(result, index) in results">

                        <img   :src="result.images.fixed_height.url">

                        <hr>
                        </li>
                    </ul>
                        <hr>
                    </div>
                    <div class="one">
                        <h1>Selected</h1>
                        <img :src="this.selected" alt="">
                        <input type="hidden" name="gif" :value="this.selected"/>


                        <!-- <h6>{{this.selected}}</h6>     -->
                    </div>
                    <div class="url text-right">


                    </div>

            </div>

        </div>

    </div>

</template>

<script>
import axios from 'axios'
export default {

    data(){
        return {
            apikey: 'dgzg8JSglLqdorSpm6NpUBLLqQPqtbJb',
            query: '',
            results :[],

            selected: null
        }
    },

    methods : {
        doSearch() {
            // let token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // console.log(token)



            axios.get('https://api.giphy.com/v1/gifs/search?api_key=' + this.apikey + '&q=' + this.query, {
                headers: {

                    //Authorization: 'myspecialpassword'
                }
            })
            .then ((response) => {
                this.results = response.data.data ;
            })

        },
        chosseOne(index){

            this.selected = this.results[index].images.fixed_height.url


        }
    }
}
</script>

<style lang="scss" scoped>
*{
    //background-color: #eeeeee;
}
ul{
    list-style:  none;
}
li{
    float: left;
    padding: 10px;
}
img{
    width: 100px;
    float: right;
    display:inline-block;
}
.gif{
    position: absolute;
    width: 50%;
    padding: 0;
    margin-top: 10px;
    margin-bottom: 0px;

}
.dropDown{
    margin-top: 0;
    padding-top: 0;
    background-color: white;
    display: none;
    position: absolute;
    top: 42px;
    left: 0;
    width: 220px;
    padding:10px;

    box-shadow: 0 2px 3px rgba(0,0,0,.5);



}
.dropDown::before{
    content: "";
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-bottom: 6px solid white;
    height: 0;
    width: 0;
    position: absolute;
    left: 15px;
    top: -10px;

}

.one{
    float:right;
    margin-left: 500px;
    img{
        width: 200px;

    }
}

.url h6{
    float: right;
    margin-left: 500px;


}
.gif:hover  .dropDown{
    display: block;;
}




</style>
