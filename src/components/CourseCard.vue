<template>
  <v-card
      class="mx-auto"
      max-width="300px"
      max-height="300px"
  >
    <v-img
        src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
        height="200px"
    ></v-img>

    <v-card-title class="pt-0 pb-0">
      {{ courseName }}
    </v-card-title>

    <v-card-subtitle class="">
      {{ courseDescription }}
    </v-card-subtitle>

    <v-card-actions>
      <v-btn
          color="primary"
          text
      >
        Просмотр
      </v-btn>
      <v-spacer></v-spacer>
    </v-card-actions>

  </v-card>
</template>

<script>
export default {
  props: {
    courseName: String,
    courseDescription: String
  }
}
</script>
