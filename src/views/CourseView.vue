<template>
  <div>
    <HeaderComp/>
    <div>
      <v-container>
        <v-row class="mt-15" justify="start">
          <h1>{{ getCourseInfo.courseName }}</h1>
        </v-row>
        <v-row class="mt-5">
          <p v-if="getCourseInfo.courseStatus==='inAction'" class="">Курс открыт. Люди могут его проходить.</p>
          <p v-else-if="getCourseInfo.courseStatus==='inDev'">Курс находится в разработке. Вы можете внести изменения или открыть его для пользователей.</p>
          <p v-else-if="getCourseInfo.courseStatus==='closed'">Данный курс закрыт, вы можете изменить его статус во вкладке <b>редактировать курс</b>.</p>
          <p v-else>Ошибка. Вы не должны видеть этот текст! Обратитесь в поддержку</p>
        </v-row>
        <v-row class="mt-5">
          <p>Статус курса
            <span v-if="getCourseInfo.courseType==='open'">данный курс является открытым для всех.</span>
            <span v-else-if="getCourseInfo.courseType==='closed'">данный курс является приватным.</span>
            <span v-else>Ошибка. Вы не должны видеть этот текст! Обратитесь в поддержку</span>
          </p>
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
