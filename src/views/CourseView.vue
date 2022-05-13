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

        <v-col class="pt-0 pl-16" cols="3">
          <div>
            <h3>Описание курса</h3>
            {{getCourseInfo.courseDescr}}
          </div>
        </v-col>

        <v-col cols="6">

        </v-col>
      </v-row>
    </div>
    <FooterComp/>
  </div>
</template>

<script>
import HeaderComp from '@/components/HeaderComp';
import FooterComp from '@/components/FooterComp';
import {mapGetters, mapActions} from 'vuex';
import {getCourseByCourseId} from '@/services/fetchers';
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
  methods: {
    ...mapActions(["fetchCourses"]),
    async getCourse(id) {
      const res = await getCourseByCourseId(id);
      this.getCourseInfo.courseDescr = res.description;
      this.getCourseInfo.courseType = res.type;
      this.getCourseInfo.courseStatus = res.status;
      this.getCourseInfo.courseName = res.name;
    }
  },
  computed: {
    ...mapGetters(["getCourseInfo", "allCourses"]),
  },
  mounted() {
    console.log("mounted");
    const id = window.localStorage.getItem("recentlyVisitedCourse");
    if (this.allCourses.length === undefined) {
      this.getCourse(id);
    } else if (this.getCourseInfo.length === undefined){
      const currentCourse = this.allCourses.find(element => element.id === parseInt(id));
      this.getCourseInfo.courseDescr = currentCourse.description;
      this.getCourseInfo.courseType = currentCourse.type;
      this.getCourseInfo.courseStatus = currentCourse.status;
      this.getCourseInfo.courseName = currentCourse.name;
      console.log(currentCourse);
      console.log(this.getCourseInfo.length)
    }
  },

}
</script>

<style scoped>

</style>
