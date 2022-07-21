import axios from "axios";

export default{
    namespaced: true,

    // The state or data held within this store.
    state: {
        tweets: [],
    },

    // The available getters tat allow us to access the state.
    getters: {
        tweets(state){
            return state.tweets;
        }
    },

    // The available mutators that allow us to modify state.
    mutations: {
        PUSH_TWEETS(state, data){
            state.tweets.push(...data);
        }
    },

    // The actions that this store can perform, these usually map to methods in components
    actions: {
        async getTweets({ commit }, url){
            let response = await axios.get(url);

            commit('PUSH_TWEETS', response.data.data);

            return response;
        }
    }
}