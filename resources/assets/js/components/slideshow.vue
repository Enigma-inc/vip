<template>
<carousel-3d :width="2000" :height="800" :autoplay="true" 
 :perspective="0" :space="50" :controls-visible="true"
 :animationSpeed="2000" :autoplayTimeout="10000" >
<slide v-for="(slide, i) in slideshows" :index="i"  :key="slide.id">
    <section v-bind:style="{ backgroundImage: 'url(' + slide.image + ')' }" class=" pre-banner-1 bg-fixed parallax-bg fullscreen-banner valign-wrapper overlay dark-5"
        data-stellar-background-ratio="0.5">
            <div class="slide-container">
                    <h1 class="intro-title text-uppercase white-text flex-item" style="z-index:20" v-html="slide.title" ></h1>
                    <span class="sub-intro lead white-text flex-item" style="z-index:20" v-html="slide.intro"></span>
                    <a target="_blank" style="z-index:20" v-if="slide.link && slide.btnText" :href="slide.link "  class="btn btn-lg vodacom waves-effect waves-light mt-30 flex-item">
                      {{slide.btnText}}
                    </a>
            </div>
            

    </section>
</slide>
</carousel-3d>


</template>
<script>
import { Carousel3d, Slide } from 'vue-carousel-3d';
    export default {
        components:{Carousel3d,Slide},
        data() {
            return {
                slideshows: [
                    {
                    title: 'vodacom Innovation Park',
                    intro: `The Vodacom Innovation Park is a Lesotho-based Innovation Lab and Startup Accelerator 
                         helping to bring the best startup and business ideas to scale locally, regionally and globally`,
                   image: './assets/img/main-cover.jpg',
                   image: './assets/img/main-cover.jpg',
                    link: '#',
                    btnText: ''
                },
                    {
                    title: 'vodacom Innovation Park',
                    intro: `The Vodacom Innovation Park is a Lesotho-based Innovation Lab and Startup Accelerator 
                         helping to bring the best startup and business ideas to scale locally, regionally and globally`,
                   image: './assets/img/main-cover.jpg',
                    link: '#',
                    btnText: ''
                }
                ]
            }
        },
        methods: {
        },
       mounted() {
            axios.get('./api/slideshow').then(res => {
                if (res.data) {
                    this.slideshows = res.data;
                }
            }) 
        }
    }

</script>

<style lang="scss" scoped>
.slide-container{
    display:flex;
    height:100%;
    width:100vw;
    align-items:center;
     flex-direction: column; 
     padding-top:30vh;
     .flex-item{
         text-align:center;
     }
}

 h1{
     color:#fff;
 }

.carousel-3d-controls{
    a{
        color:gray;
    }
}
</style>