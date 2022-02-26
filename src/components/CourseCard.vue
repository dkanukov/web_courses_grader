<template>
  <v-card
      class="mx-auto"
      max-width="400px"
      max-height="400px"
  >
    <v-img
        src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
        height="200px"
    ></v-img>

    <v-card-title>
      Test course name
      {{  courseName }}
    </v-card-title>

    <v-card-subtitle>
      Test course description
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
