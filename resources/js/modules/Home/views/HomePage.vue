<template>
    <div>
        Main
    </div>
</template>

<script>
    import { mapActions, mapGetters, mapMutations } from 'vuex'

    export default {

        name: 'HomePage',
        components: { },
        mounted() {
            console.log( this.$store.state.profile )
        },
        filters: {  },
        computed: {
            ...mapGetters(['getProfile']),
        },
        data() {
            return {

            }
        },
        methods: {

        }
    }
</script>


<style scoped lang="scss">

</style>
