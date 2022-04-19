<template>
  <div>
    <HeaderComp title="Создайте новый курс" link="/"/>
    <v-container>

      <v-row justify="space-between" class="mt-10">
        <v-col>
          <v-text-field
              label="Введите имя"
              :rules = "personRules"
              hide-details="auto"
          />
        </v-col>
        <v-col>
          <v-text-field label="Введите фамилию"/>
        </v-col>
        <v-col>
          <v-text-field label="Введите почту"/>
        </v-col>
      </v-row>

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
      value => !!value || 'Required.',
      value => (value && value.length >= 3) || 'Min 3 characters',
    ],
  }),
}
</script>

<style scoped>

</style>
