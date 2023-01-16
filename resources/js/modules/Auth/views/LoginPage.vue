<template>
    <section class="container">
        <LoginForm/>
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
    mounted() {
        this.login();
    },
    components: {
        LoginForm,
    },
    methods: {
        login() {
            axios.post('/api/auth/register', {
                login: 'looo',
                password: '000',

            }).then(function (data) {
                console.log(data)
            }).catch(function (error) {
                console.log(error)
            })
        }
    }
}
</script>
