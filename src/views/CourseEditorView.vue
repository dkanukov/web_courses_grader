<template>
  <div>
    <HeaderComp title="Редактирование курса" link="/CourseView"/>
    <v-form ref="form" style="margin-top: 100px;" lazy-validation>
      <v-row align="top" justify="space-around">
        <v-col cols="4">
          <v-row justify="center" class="mb-5">
            <h2>Описание курса</h2>
          </v-row>
          <v-textarea
              v-model="course.courseDescr"
          />
        </v-col>

        <v-col cols="3">
          <v-row justify="center" class="mb-5">
            <h2>Изменить почту</h2>
          </v-row>
          <v-text-field
            required
            :rules="emailRules"
            v-model="course.courseEmail"
          />
        </v-col>
      </v-row>

      <v-row class="mt-15" justify="space-around">
        <v-col cols="3">
          <v-row justify="center" class="mb-5">
            <h2>Изменить тип курса</h2>
          </v-row>
          <v-select
              class="text-no-wrap"
              :items="courseStatus"
              v-model="course.courseStatus"
          />
        </v-col>
        <v-col cols="3">
          <v-row justify="center" class="mb-5 ml-8">
            <h2>Изменить тип курса</h2>
          </v-row>
          <v-select
              class="pl-15"
            :items="courseType"
            v-model="course.courseType"
          />
        </v-col>
      </v-row>

      <v-row class="mt-15">
        <v-spacer/>
        <v-col cols="4">
          <v-row justify="space-around">
              <v-btn
                  x-large
                  color="primary"
                  @click="submitForm"
              >
                Сохранить
              </v-btn>
            <v-btn
                x-large
                color="error"
                @click="resetForm"
            >
              Отменить
            </v-btn>
          </v-row>
        </v-col>
        <v-spacer/>
      </v-row>
    </v-form>

  </div>
</template>

<script>
import HeaderComp from "@/components/HeaderBackRowComp";
import {getCourseByCourseId, getUserById} from '@/services/fetchers';
export default {
  name: "CourseEditorView",
  components: {
    HeaderComp
  },
  data() {
    return {
      course: {
        courseDescr: "",
        courseEmail: "",
        courseType: "",
        courseStatus: "",
      },
      courseType: ["Открытый", "Закрытый"],
      courseStatus: ["Открыт", "В разработке", "Закрыт"],
      emailRules: [
        v => !!v || 'Обязательное поле',
        v => /.+@.+/.test(v) || 'E-mail must be valid',
      ]
    }
  },
  methods: {
    submitForm () {
      this.$refs.form.validate();
      //add watcher which will compare info, then make post to server
    },
    resetForm () {
      this.$refs.form.reset();
    },
    async getInfo () {
      const course = await getCourseByCourseId(window.localStorage.getItem("recentlyVisitedCourse"));
      const user = await getUserById(window.localStorage.getItem("userId"));
      this.course.courseDescr = course.description;
      this.course.courseEmail = user.email;
      this.course.courseStatus =
          (course.status === 'inAction') ? 'Открыт' :
          (course.status === 'inDev') ? 'В разработке' :
          (course.status === 'closed') ? 'Закрыт' :
          "Error";
      this.course.courseType =
          (course.type === 'open') ? 'Открытый' :
          (course.type === 'closed') ? 'Закрытый' :
          "Error";
    }
  },
  mounted() {
    this.getInfo();
  }
}
</script>

<style scoped>

</style>
