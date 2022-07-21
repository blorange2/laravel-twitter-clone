<template>
  <div>
    <!-- <app-tweet
        v-for="tweet in tweets"
        :key="tweet.id"
        :tweet="tweet"
    /> -->
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
  methods: {
    ...mapActions({
        getTweets: 'timeline/getTweets'
    })
  },

  mounted(){
    console.log("Mounted");
    this.getTweets();
  }
}
</script>