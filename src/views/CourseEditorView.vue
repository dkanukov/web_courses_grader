<template>
  <div>
    <v-row align="center">
      <v-col
          cols="3"
          class="ml-15"
      >
        <v-img
            class="mt-10 ml-5"
            style="cursor: pointer"
            @click="$router.push('/CourseView')"
            max-height="70px"
            max-width="70px"
            :src="require('../assets/back_row.svg')"
        >

        </v-img>
      </v-col>
      <v-col cols="1"/>
      <v-col cols="4">
        <h1 class="pt-8">Редактирование курса</h1>
      </v-col>
      <v-col cols="4"/>
    </v-row>

    <v-form ref="form" style="margin-top: 100px;" lazy-validation>
      <v-row align="center" justify="space-around">
        <v-col cols="3">
          <v-row justify="center" class="mb-5">
            <h2>Обложка курса</h2>
          </v-row>
          <v-file-input
              hide-details="auto"
              label="Загрузите файл .png"
              accept=".png"
          />
        </v-col>

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

      <v-row class="mt-15">
        <v-spacer/>
        <v-col cols="3">
          <v-select
              class="text-no-wrap"
              :items="courseStatus"
          />
        </v-col>
        <v-spacer/>
        <v-col cols="3">
          <v-select
            :items="courseType"
          />
        </v-col>
        <v-spacer/>
      </v-row>

      <v-row class="mt-15">
        <v-spacer/>
        <v-col cols="4">
          <v-row justify="space-around">
              <v-btn
                  x-large
                  color="primary"
              >
                Сохранить
              </v-btn>
            <v-btn
                x-large
                color="error"
            >
              Отменить
            </v-btn>
          </v-row>
        </v-col>
        <v-spacer/>
      </v-row>
      <v-btn class="purple darken-2 white--text mt-5"  @click="submitForm"> Register </v-btn>
    </v-form>

  </div>
</template>

<script>
export default {
  name: "CourseEditorView",
  data() {
    return {
      editedCourse: {
        courseDescr: "",
        newEmail: ""
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
  },
}
</script>

<style scoped>

</style>