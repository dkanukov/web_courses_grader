<template>
  <div>
    <HeaderComp title="Создайте новый курс" link="/"/>
    <v-container>

      <v-form ref="form" lazy-validation>

        <v-row justify="space-between" class="mt-10">
          <v-col>
            <v-text-field
                label="Введите имя"
                v-model="newCourse.name"
                :rules = "personRules"
                hide-details="auto"
            />
          </v-col>
          <v-col>
            <v-text-field
                label="Введите фамилию"
                v-model="newCourse.surname"
                :rules = "personRules"
                hide-details="auto"
            />
          </v-col>
          <v-col>
            <v-text-field
                label="Введите почту"
                v-model="newCourse.mail"
                :rules = "emailRules"
                hide-details="auto"
            />
          </v-col>
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

export default {
  name: "CreateCourseView",
  components: {
    FooterComp,
    HeaderComp
  },
  data: () => ({
    personRules: [
      value => !!value || 'Обязательное поле',
    ],
    emailRules: [
      v => !!v || 'Обязательное поле',
      v => /^(([^<>()[\]\\.,;:\s@']+(\.[^<>()\\[\]\\.,;:\s@']+)*)|('.+'))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(v) || 'E-mail must be valid',
    ],
    newCourse: {
      name: "",
      surname: "",
      mail: ""
    }
  }),
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
