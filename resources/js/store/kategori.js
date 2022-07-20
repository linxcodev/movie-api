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
    tambahKategori({ commit }, payload) {
        commit('SET_LOADING',true, { root: true })
        
        return new Promise(async (resolve, reject) => {
            try{
                let network = await $axios.post(`kategori`, payload)

                commit('CLEAR_ERRORS', '', { root: true })
                commit('SET_LOADING',false, { root: true })
                resolve(network.data)
            } catch (error) {
                if (error.response.status == 422) {
                    commit('SET_ERRORS', error.response.data.errors, { root: true })
                }
                commit('SET_LOADING',false, { root: true })
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