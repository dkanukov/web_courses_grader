<template>
  <div>
    <HeaderComp title="Редактирование курса" link="/CourseView"/>
    <v-form ref="form" style="margin-top: 100px;" lazy-validation>
      <v-row align="center" justify="space-around">
        <v-col cols="4">
          <v-row justify="center" class="mb-5">
            <h2>Описание курса</h2>
          </v-row>
          <v-text-field
              v-model="editedCourse.courseDescr"
          />
        </v-col>

        <v-col cols="3">
          <v-row justify="center" class="mb-5">
            <h2>Изменить почту</h2>
          </v-row>
          <v-text-field
            required
            :rules="emailRules"
            v-model="editedCourse.newEmail"
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
              v-model="editedCourse.courseStatus"
          />
        </v-col>
        <v-col cols="3">
          <v-row justify="center" class="mb-5 ml-8">
            <h2>Изменить тип курса</h2>
          </v-row>
          <v-select
              class="pl-15"
            :items="courseType"
            v-model="editedCourse.courseType"
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
import {mapActions, mapGetters} from "vuex";

export default {
  name: "CourseEditorView",
  components: {
    HeaderComp
  },
  data() {
    return {
      editedCourse: {
        courseDescr: "",
        newEmail: "",
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
    ...mapActions(["fetchCourses"]),
    submitForm () {
      this.$refs.form.validate();
    },
    resetForm () {
      this.$refs.form.reset();
    },
    async getCourses() {
      await this.fetchCourses()
          .then(() => {
            console.log("courses fetched successfully");
          })
    }
  },
  computed: {
    ...mapGetters(["allCourses"])
  },
  mounted() {
    if (this.allCourses.length === undefined) {
      console.log("allCourses is undefined");
      this.getCourses();
    }
    this.editedCourse.courseDescr = this.allCourses.description;
    this.editedCourse.courseStatus = this.allCourses.status;
    this.editedCourse.courseType = this.allCourses.type;
  }
}
</script>

<style scoped>

</style>
