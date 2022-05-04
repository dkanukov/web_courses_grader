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
              hide-details="auto"
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
            hide-details="auto"
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
export default {
  name: "CourseEditorView",
  components: {
    HeaderComp
  },
  data() {
    return {
      editedCourse: {
        courseDescr: "Описание которое потом получим с сервера",
        newEmail: "testmail@gmail.com",
        courseType: "Открытый",
        courseStatus: "Закрыт",
      },
      courseType: ["Открытый", "Закрытый"],
      courseStatus: ["Открыт", "В разработке", "Закрыт"],
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /^(([^<>()[\]\\.,;:\s@']+(\.[^<>()\\[\]\\.,;:\s@']+)*)|('.+'))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(v) || 'E-mail must be valid',
      ]
    }
  },
  methods: {
    submitForm () {
      this.$refs.form.validate();
    },
    resetForm () {
      this.$refs.form.reset();
    }
  },
}
</script>

<style scoped>

</style>
