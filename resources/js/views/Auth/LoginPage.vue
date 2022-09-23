<template>
    <section class="container">
       LOGIN
    </section>
</template>

<script>
import LoginForm from "../../components/Auth/LoginForm";

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
