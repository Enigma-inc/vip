<template>
    <section>
        <div class="">
               <slick ref="slick" :options="slickOptions">
                <a href="http://placehold.it/100x80"><div class="headsup-container"><img class="headsup-image" src="http://placehold.it/400x300"><div class="title-container"><p class="title">CONETENT HERE</p></div></div></a>
                <a href="http://placehold.it/100x80"><div class="headsup-container"><img class="headsup-image" src="http://placehold.it/400x300"><div class="title-container"><p class="title">CONETENT HERE</p></div></div></a>
                <a href="http://placehold.it/100x80"><div class="headsup-container"><img class="headsup-image" src="http://placehold.it/400x300"><div class="title-container"><p class="title">CONETENT HERE</p></div></div></a>
                <a href="http://placehold.it/100x80"><div class="headsup-container"><img class="headsup-image" src="http://placehold.it/400x300"><div class="title-container"><p class="title">CONETENT HERE</p></div></div></a>
                <a href="http://placehold.it/100x80"><div class="headsup-container"><img class="headsup-image" src="http://placehold.it/400x300"><div class="title-container"><p class="title">CONETENT HERE</p></div></div></a>
             </slick>        

        </div>
        <!-- /.container -->
    </section>
</template>
<script>
import Slick from 'vue-slick';
export default{
    components:{Slick},
    data() {
        return {
            slickOptions: {
                slidesToShow: 4,
                autoplay:true,
                dots:true
            },
        };
    },
    mounted(){
        console.log("UM UP!!!!");
    }
}
    
</script>
<style lang="scss" scoped>
.headsup-container {
    margin: 10px;
    height:250px;
    .title-container {
        position: relative;
        bottom: 90px;
        background: rgba(255,0,0,0.9);
        height:80px;
        left: 0px;
        .title {
            position: relative;
            //bottom: 60px;
            color: white;
            margin:10px;
            left: 0;
            width:100%;
            text-align:center;
            font-size:1em;
        }
    }
    img {
        width: 100%;
    }
}
</style>