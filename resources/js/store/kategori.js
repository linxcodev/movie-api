import $axios from '../services/api.js'

const state = () => ({
    kategori: [],
})

const mutations = {
    ASSIGN_KATEGORI(state, payload) {
        state.kategori = payload
    }
}

const actions = {
    getKategori({ commit }) {
        return new Promise(async (resolve, reject) => {
            try {
                let network = await $axios.get(`kategori`)

                commit('ASSIGN_KATEGORI', network.data.data)
                resolve(network.data)
            } catch (error) {
                reject(error.response.data)
            }
        })
    },
}

export default {
    namespaced: true,
    state,
    mutations,
    actions
}