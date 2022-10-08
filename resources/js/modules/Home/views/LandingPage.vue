<template>
    <div>
        <AutoComplete v-model="selectedCountry" :suggestions="filteredCountriesBasic" @complete="searchCountry($event)" optionLabel="name" />
    </div>
</template>

<script>

    export default {

        name: 'LandingPage',
        components: { },
        mounted() {
        },
        filters: {  },
        computed: {

        },
        data() {
            return {
                selectedCountry: 'Germany',
                filteredCountriesBasic: [
                    'Germany', 'Russia'
                ]
            }
        },
        methods: {
            searchCountry () {

            }
        }
    }
</script>


<style scoped lang="scss">

</style>
