<template>
    All Receipts
    <Paginator :rows="10" :totalRecords="34" p-error></Paginator>
</template>

<script>
export default {
    name: "ReceiptsPage",
    data () {
        return {
            offset: 10,
            totalItemsCount: 300
        }
    }
}
</script>
