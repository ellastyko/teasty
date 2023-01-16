export default {

    namespaced: true,
    state: () => ({
        receipt: null
    }),
    getters: {
        getReceipt(state) {
            return state.receipt
        },
    },
    mutations: {
        SET_RECEIPT(state, payload) {
            state.receipt = payload
        }
    },
    actions: {
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
