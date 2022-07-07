<template>
  <div>
    <HeaderComp title="Создайте новый курс" link="/"/>
    <v-container>

      <v-form ref="form" lazy-validation>

        <v-row justify="space-between" class="mt-10">
          <v-col>
            <v-text-field
                label="Введите имя"
                v-model="newCourse.personName"
                :rules = "checkEmptyRules"
            />
          </v-col>
          <v-col>
            <v-text-field
                label="Введите фамилию"
                v-model="newCourse.personSurname"
                :rules = "checkEmptyRules"
            />
          </v-col>
          <v-col>
            <v-text-field
                label="Введите почту"
                v-model="newCourse.mail"
                :rules = "emailRules"
            />
          </v-col>
        </v-row>

        <v-row>
          <v-col>
            <v-file-input
                label="Обложка курса"
            />
          </v-col>
          <v-col>
            <v-text-field
                label="Название курса"
                v-model="newCourse.courseName"
                :rules="checkEmptyRules"
            />
          </v-col>
          <v-col></v-col>
        </v-row>

        <v-row justify="center" class="mt-10">
          <v-btn
              class="mr-5"
              x-large
              color="primary"
              @click="submitForm"
          >
            Сохранить
          </v-btn>
          <v-btn
              class="ml-5"
              x-large
              color="error"
              @click="resetForm"
          >
            Отменить
          </v-btn>
        </v-row>

      </v-form>

    </v-container>
    <FooterComp/>
  </div>
</template>

<script>
import HeaderComp from "@/components/HeaderBackRowComp";
import FooterComp from "@/components/FooterComp";
function createJson(data) {
  let link = document.createElement("a");
  let file = new Blob([data], {type: "text/plain"});
  link.href = URL.createObjectURL(file);
  link.download = "test.json";
  //Remove comment if you need to download json file with new course info
  // link.click();
}

export default {
  name: "CreateCourseView",
  components: {
    FooterComp,
    HeaderComp
  },
  data: () => ({
    checkEmptyRules: [
      value => !!value || 'Обязательное поле',
    ],
    emailRules: [
      v => !!v || 'Обязательное поле',
      v => /.+@.+/.test(v) || 'E-mail must be valid',
    ],
    newCourse: {
      personName: "Имя",
      personSurname: "Фамилия",
      mail: "kanukov.denis@gmail.com",
      courseName: "Название курса"
    },
  }),
  methods: {
    submitForm () {
      if (this.$refs.form.validate()) {
        createJson(JSON.stringify(this.newCourse));
      }
    },
    resetForm () {
      this.$refs.form.resetValidation();
      this.newCourse.courseName = "";
      this.newCourse.personName = "";
      this.newCourse.personSurname = "";
      this.newCourse.mail = "";
    }
  },
}
</script>

<style scoped>

</style>
