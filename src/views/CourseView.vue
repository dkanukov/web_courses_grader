<template>
  <div>
    <HeaderComp/>
    <div>
      <v-row class="mt-5" justify="center">
        <h2>Course name</h2>
      </v-row>
      <v-row class="mt-16">
        <v-spacer/>
        <v-col cols="2">
          <v-row class="mt-5">
            <v-btn
                text
                color="primary"
                x-large
                block
            >
              Добавить задание</v-btn>
          </v-row>
          <v-row class="mt-15">
            <v-btn
                text
                color="primary"
                x-large
                block
            >
              Редактировать курс</v-btn>
          </v-row>
          <v-row class="mt-15">
            <v-btn
                text
                color="primary"
                x-large
                block
            >
              Просмотр наборов</v-btn>
          </v-row>
          <v-row class="mt-15">
            <v-btn
                text
                color="error"
                x-large
                block
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
export default {
  name: "CourseView",
  components: {
    HeaderComp,
    FooterComp
  },
  props: {
    courseName: String,
    courseStatus: String,
    courseGroupsNum: Number
  }
}
</script>

<style scoped>

</style>