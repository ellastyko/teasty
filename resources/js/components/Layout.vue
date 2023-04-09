<template>
    <div class="main-background fixed top-0 w-full h-full min-h-screen z-background overflow-auto">
        <!-- Dark overlay
        ------------------>
        <div class="bg-black bg-opacity-50 fixed inset-0  z-background-overlay"/>

        <!-- Navigation
        ------------------>
        <nav-bar/>

        <!-- Main Container
        ------------------>
        <div class="relative z-normal w-full h-full">
            <slot name="main"/>
        </div>
        <!-- Video background
        ------------------>
        <template v-if="videoBackground">
            <video class="fixed top-0 z-background" ref="videoBackground" autoplay muted loop>
                <source :src="videoSrc" type="video/mp4">
            </video>
            <div ref="overlay" class="overlay"/>
        </template>
    </div>
</template>

<script>
    export default {
        name: 'Layout',
        props: {
            guest: {
                type: Boolean,
                default: false
            },
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
                    '/images/background-1.jpg',
                    '/images/background-2.jpg',
                ]
            }
        },
        methods: { }
    }
</script>

<style scoped lang="scss">
.main-background {
    background: url("/images/background-1.jpg") no-repeat fixed center;
    background-size: cover;
}
</style>
