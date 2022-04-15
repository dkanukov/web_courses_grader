<template>
  <v-card
      style="border-radius: 0"
      class="mx-auto"
      max-width="300px"
      max-height="300px"
  >
    <v-img
        src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
        height="200px"
    ></v-img>

    <v-row align="center">
      <v-col align-self="center">
        <v-card-title class="pt-0 pb-0">
          {{ courseName }}
        </v-card-title>
      </v-col>

      <v-col>
        <v-card-subtitle>
          <div v-if="courseStatus==='inAction'" class="text-green font-weight-bold "> {{ courseGroupsNum }} / 30</div>
          <div v-else-if="courseStatus==='inDev'" class="text-orange font-weight-bold"> 0 / 30</div>
          <div v-else class="text-red font-weight-bold"> 0 / 30</div>
        </v-card-subtitle>
      </v-col>
    </v-row>

    <v-row>
      <v-spacer/>

    </v-row>

    <v-card-actions class="mt-5">
      <v-row>
        <v-col cols="4">
          <v-btn
              @click="submit"
              color="primary"
              text
          >
            Просмотр
          </v-btn>
        </v-col>
        <v-col cols="8" class="pl-8" align-self="center">
          <p v-if="courseStatus==='inAction'" class="text-green pl-1">Статус: В процессе</p>
          <p v-else-if="courseStatus==='inDev'" class="text-orange">Статус: В разработке</p>
          <p v-else class="text-red pl-1">Статус: Закрыт </p>
      </v-col>
      </v-row>
    </v-card-actions>

  </v-card>
</template>

<script>
import {mapMutations} from 'vuex'
export default {
  props: {
    courseName: String,
    courseDescription: String,
    courseStatus: String,
    courseGroupsNum: Number
  },
  computed: {
    ...mapMutations(["pushCourseInfo"]),
  },
  methods: {
    submit() {
      this.$router.push('/CourseView');
      this.pushCourseInfo({
        courseName: this.courseName,
        courseStatus: this.courseStatus,
        courseGroupsNum: this.courseGroupsNum
      })
    }
  },
}
</script>
