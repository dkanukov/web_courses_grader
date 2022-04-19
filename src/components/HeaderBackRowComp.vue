<template>
  <v-container>
    <v-row align="center">
      <v-col class="mt-2">
        <v-img
            style="cursor: pointer"
            @click="$router.push(link)"
            max-height="70px"
            max-width="70px"
            :src="require('../assets/back_row.svg')"
        >

        </v-img>
      </v-col>
      <v-col>
        <h1>{{ title }}</h1>
      </v-col>
      <v-col/>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "HeaderBackRow",
  props: {
    title: String,
    link: String
  }
}
</script>

<style scoped>

</style>
