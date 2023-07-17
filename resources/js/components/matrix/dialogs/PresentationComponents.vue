<template>
    <!-- presentation dialog -->
    <ui-dialog v-model="presentationDialogOpen" mask-closable>
        <ui-dialog-content>
            <div class="slider">
                <div class="slide" v-show="actualSlide == 0">
                    <img class="loading" loading="lazy" width="512" height="250"
                        src="https://i.imgur.com/szRCIZm.webp" alt="main interface">
                    <h1>Welcome</h1>
                    <p>Welcome to simple kpp maker. Make beautiful matrix for omsi 2 in few minutes, without
                        developer knowledge.</p>
                </div>
                <div class="slide" v-show="actualSlide == 1">
                    <img class="loading" loading="lazy" width="512" height="250"
                        src="https://i.imgur.com/guqnbeH.webp" alt="scrolling options">
                    <h1>Rich editor</h1>
                    <p>Use multiples fonts, create scrolling animations and add icons. Edit colors and more with
                        simple UI.</p>
                </div>
                <div class="slide" v-show="actualSlide == 2">
                    <img class="loading" loading="lazy" width="512" height="250"
                        src="https://i.imgur.com/o6GPmou.webp" alt="download modal">
                    <h1>Download</h1>
                    <p>Instant download your destinations and use it in OMSI2, without prior configuration.</p>
                </div>
                <ui-icon-button class="prev-btn" v-show="actualSlide != 0" @click="actualSlide-=1"
                    icon="arrow_backward"></ui-icon-button>
                <ui-icon-button class="next-btn" v-show="actualSlide < 2" @click="actualSlide+=1"
                    icon="arrow_forward"></ui-icon-button>
            </div>
        </ui-dialog-content>
    </ui-dialog>
</template>
<script>
    export default {
        data() {
            return {
                fileOnDrop: false,
            };
        },
        methods: {
            hofDragleave() {
                // implementation
            },
            hofDrop() {
                // implementation
            },
        },
    };
</script> 
<style>
/* implementation specific styles */
</style>