<template>
  <div>
    <HeaderComp/>
    <div>
      <v-container>
        <v-row class="mt-15" justify="start">
          <h2>{{ getCourseInfo.courseName }}</h2>
        </v-row>
      </v-container>
      <v-row class="mt-16">
        <v-spacer/>
        <v-col cols="2">
          <v-row>
            <v-btn
                text
                color="primary"
                x-large
                block=true
                @click="$router.push('/CourseView/HomeworkView')"
            >
              Просмотр заданий</v-btn>
          </v-row>
          <v-row class="mt-15">
            <v-btn
                text
                color="primary"
                x-large
                block=true
                @click="$router.push('/CourseView/CourseEditorView')"
            >
              Редактировать курс</v-btn>
          </v-row>
          <v-row class="mt-15">
            <v-btn
                text
                color="primary"
                x-large
                block=true
            >
              Просмотр набора</v-btn>
          </v-row>
          <v-row class="mt-15">
            <v-btn
                text
                color="error"
                x-large
                block=true
            >
              Закрыть курс</v-btn>
          </v-row>
        </v-col>

        <v-col cols="9">

        </v-col>
      </v-row>
    </div>
    <FooterComp/>
  </div>
</template>

<script>
import HeaderComp from '@/components/HeaderComp';
import FooterComp from '@/components/FooterComp';
import {mapGetters} from 'vuex'
export default {
  name: "CourseView",
  components: {
    HeaderComp,
    FooterComp
  },
  data() {
    return {

    }
  },
  computed: {
    ...mapGetters(["getCourseInfo"]),
  },

}
</script>

<style scoped>

</style>
