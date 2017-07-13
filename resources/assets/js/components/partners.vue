<template>
    <section class="padding-bottom-110">
        <div class="container">

            <div class="text-center mb-80">
                <h2 class="section-title color-black">Our Partners</h2>
                <p class="section-sub color-black">Our partners represent a wide variety of sectors and expertise, and are committed to developing entrepreneurship and driving socio-economic development through business. We strongly believe in forming meaningful partnerships to amplify the outcomes of the program and reach 
                as many Basotho entrepreneurs as possible.</p>
            </div>

            <div class="clients-grid gutter">
                <div class="row">
                    <div class="col-md-3 col-sm-6" v-for="logo in partnerLogos">
                        <div class="border-box">
                            <a href="#">
                                <img :src="logo" alt="Partner">
                            </a>
                        </div>
                    </div>

                   
                </div>
   
            </div>
         

        </div>
        <!-- /.container -->
    </section>
</template>
<script>
    export default {
        data() {
            return {
              partnerLogos:[
                  './assets/img/partners/bedco.jpg',
                  './assets/img/partners/std.jpg',
                  './assets/img/partners/lndc.jpg',
                  './assets/img/partners/microsoft.jpg',
              ]
            }
        }
    }

</script>

<style lang="scss">
    .color-black{
        color:#000 !important;
    }
</style>