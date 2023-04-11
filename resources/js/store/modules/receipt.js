export default {

    namespaced: true,
    state: () => ({
        receipts: [],
        receipt: null
    }),
    mutations: {
        SET_RECEIPT(state, payload) {
            state.receipt = payload
        },
        SET_RECEIPTS(state, payload) {
            state.receipts = payload
        }
    },
    actions: {
        async getReceipts({commit}, payload = []) {
            const response = await axios.get(`api/receipts`)
            if (response.status === 200) {
                commit('SET_RECEIPTS', response.data)
            }
        },
        async updateReceipt({commit}, payload) {

            const response = await axios.patch(
                `api / receipt / ${this.state.receipt.id}`,
                {
                    payload
                },
                {
                    headers: {}
                }
            )
            if (response.status === 200) {
                commit('SET_RECEIPT', response.data)
            }
        }
    }
}
