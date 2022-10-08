<template>
    <section class="container">

    </section>
</template>

<script>
import LoginForm from "../components/LoginForm.vue";

export default {

    name: "LoginPage",
    data() {
        return {
            name: '',

        }
    },
    components: {
        LoginForm,
    },
    methods: {
        searchCountry() {
            console.log('here')
        }
    }
}
</script>

<style scoped>

</style>
