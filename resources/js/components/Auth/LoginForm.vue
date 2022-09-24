<template>
    <form class="col-4" method="post" action="/login" @submit.prevent="handleSubmit">
        <csrf-token/>
        <div class="form-group">
            <label for="email">Email address</label>
            <input
                v-model="form.email"
                type="email"
                class="form-control"
                id="email"
                name="email"
                aria-describedby="emailHelp"
                placeholder="Enter email"
            >
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input
                v-model="form.password"
                type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="Password"
            >
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Check me out</label>
        </div>
        <button
            type="submit"
            class="btn btn-primary"
        >
            Submit
        </button>
    </form>
</template>

<script>
import CsrfToken from "../CsrfToken.vue";


export default {
    name: "LoginForm",
    components: {CsrfToken},
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

    },
    methods: {

        handleSubmit(form) {

        }
    }
}
</script>

<style scoped>

</style>
