<template>
<!-- <carousel-3d :width="2000" :height="600" :autoplay="true" 
 :perspective="0" :space="50" :controls-visible="false"
 :animationSpeed="2000" :autoplayTimeout="10000" >
<slide v-for="(slide, i) in slideshows" :index="i"  :key="slide.id">

</slide>

</carousel-3d> -->
  <slick ref="slick" :options="slickOptions">
        <section v-for="(slide, i) in slideshows" :index="i"  :key="slide.id" v-bind:style="{ backgroundImage: 'url(' + slide.slide_image + ' )' }" class="slide-image"
                data-stellar-background-ratio="0.5">
                    <div class="slide-container">
                            <h1 class="slide-title text-uppercase white-text flex-item" style="z-index:20" v-html="slide.title" ></h1>
                            <span class="sub-description lead white-text flex-item" style="z-index:20" v-html="slide.description"></span>
                            <a target="_blank" style="z-index:20" v-if="slide.link && slide.btnText" :href="slide.link "  class="btn btn-lg vodacom waves-effect waves-light mt-30 flex-item">
                            {{slide.btnText}}
                            </a>
        </div>
            

    </section>
</slick>  


</template>
<script>
    import Slick from 'vue-slick';
    export default{
        components:{Slick},
        data() {
            return {
                    slickOptions: {
                slidesToShow: 1,
                autoplay:true,
                dots:false
            },
                slideshows: [
                //     {
                //     title: 'vodacom Innovation Park',
                //     description: `The Vodacom Innovation Park is a Lesotho-based Innovation Lab and Startup Accelerator 
                //          helping to bring the best startup and business ideas to scale locally, regionally and globally`,
                //     slide_image: './img/main-cover.jpg',
                //     link: '#',
                //     btnText: ''
                // }
                ]
            }
        },
        methods: {
        },
       mounted() {
            axios.get('./api/slideshows').then(res => {
                if (res.data) {
                    this.slideshows = res.data;
                }
            }) 
        }
    }

</script>

<style lang="scss" scoped>


.carousel-3d-controls{
    a{
        color:gray;
    }
}

</style>