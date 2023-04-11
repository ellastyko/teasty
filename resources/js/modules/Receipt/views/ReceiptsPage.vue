<template>
    <content-section>
        <template #content>
            <div class="grid grid-cols-2 gap-4">
                <receipts-listing :receipts="receipts"/>
            </div>
        </template>
    </content-section>
</template>

<script>
import ReceiptsListing from "../components/ReceiptsListing.vue";
import {mapActions, mapState} from "vuex";

export default {
    name: "ReceiptsPage",
    components: {ReceiptsListing},
    mounted() {
        this.$store.dispatch('receipt/getReceipts');
    },
    computed: {
        /**
         * Map state
         */
        ...mapState('receipt', ['receipts']),
    },
    methods: {
        ...mapActions('receipt', ['getReceipts']),
    }
}
</script>
