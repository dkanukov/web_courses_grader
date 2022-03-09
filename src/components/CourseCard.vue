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

    <v-row>
      <v-col align-self="center">
        <v-card-title class="pt-0 pb-0">
          {{ courseName }}
        </v-card-title>
      </v-col>

      <v-col align-self="center">
        <v-card-subtitle>
          <div v-if="courseStatus==true" class="text-green font-weight-bold "> {{ courseGroupsNum }} / 30 </div>
          <div v-else class="text-red font-weight-bold"> 0 / 30</div>
        </v-card-subtitle>
      </v-col>
    </v-row>

    <v-row>
      <v-spacer/>
      <v-col cols="6" class="">
        <v-row>
          <p>Статус:</p>
          <p v-if="courseStatus==true" class="text-green pl-1">В процессе</p>
          <p v-else class="text-red pl-1"> Закрыт </p>
        </v-row>
      </v-col>
    </v-row>

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
    courseDescription: String,
    courseStatus: Boolean,
    courseGroupsNum: Number
  }
}
</script>
