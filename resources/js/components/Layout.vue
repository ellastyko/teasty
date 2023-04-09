<template>
    <section class="main-background w-screen h-screen">
        <!-- Dark overlay
        ------------------>
        <div class="bg-black bg-opacity-50 absolute inset-0"/>

        <!-- Navigation
        ------------------>
        <nav-bar/>

        <!-- Main Container
        ------------------>
        <slot name="main"/>

        <!-- Video background
        ------------------>
        <template v-if="videoBackground">
            <video class="fixed top-0 z-background" ref="videoBackground" autoplay muted loop>
                <source :src="videoSrc" type="video/mp4">
            </video>
            <div ref="overlay" class="overlay"/>
        </template>
    </section>
</template>

<script>
    export default {
        name: 'Layout',
        props: {
            videoBackground: {
                type: Boolean,
                default: false
            }
        },
        mounted() { },
        computed: { },
        data() {
            return {
                videoSrc: '/videos/stock-1.mp4',
                imageSrc: '/images/background-1.jpg',
                videoIndex: 1,
                videos: [
                    '/videos/stock-1.mp4',
                    '/videos/stock-2.mp4',
                ],
                images: [

                ]
            }
        },
        methods: {

        }
    }
</script>

<style scoped lang="scss">
.main-background {
    background: url("/images/background-1.jpg") no-repeat center;
    background-size: cover;
}
</style>
