<template>
    <layout :guest="guest">
        <template #main>
            <div class="content-wrapper w-full h-full flex justify-center">
                <div class="content-section bg-black bg-opacity-90 w-2/3 mt-32 p-3">
                   <slot name="content"/>
                </div>
            </div>
        </template>
    </layout>
</template>

<script>

export default {
    name: "ContentSection",
    props: {
        guest: {
            type: Boolean,
            default: false
        },
    },
    data() {
        return {
            name: '',

        }
    },
    mounted() {
    },
    components: { },
    methods: {  }
}
</script>
