<template>
    <form class="col-4" method="post" action="/login" @submit.prevent="handleSubmit">

        <Password v-model="form.password"/>
    </form>
</template>

<script>

export default {
    name: "LoginForm",
    data() {
        return {
            form: {
                name: '',
                surname: '',
                email: '',
                password: ''
            }
        }
    },
    mounted() {
        this.handleSubmit();
    },
    methods: {

        handleSubmit() {
            axios.post('/api/auth/login', {
                "email": "test@test.com",
                "password": "password"
            })
        }
    }
}
</script>

<style scoped>

</style>
