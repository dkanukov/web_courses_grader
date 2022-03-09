<template>
  <div>
    <HeaderComp/>
    <v-row>

      <v-spacer/>

      <v-col
      cols="5"
      align-self="center"
      >
        <v-row >
          <v-checkbox color="info" label="В разработке"></v-checkbox>
          <v-checkbox color="info" label="Закрыт"></v-checkbox>
          <v-checkbox color="info" label="В процессе"></v-checkbox>
        </v-row>
      </v-col>

      <v-col>
        <v-text-field v-model.trim="inputSearch" label="Введите название курса"/>
      </v-col>
    </v-row>
    <v-row>
      <v-col
      v-for="element in filteredCourses"
      cols="3"
      :key="element"
      >
        <CourseCard
            :course-name="element.name"
            :course-status="element.status"
            :courseGroupsNum="element.groups"
        />
      </v-col>
    </v-row>
    <v-row justify="center" class="mt-5">
      <v-pagination
        :length="4"
      >

      </v-pagination>
    </v-row>
    <FooterComp/>
  </div>
</template>

<script>
import HeaderComp from '@/components/HeaderComp';
import FooterComp from '@/components/FooterComp';
import CourseCard from "@/components/CourseCard";
export default {
  name: "CoursePage",
  components: {
    HeaderComp,
    FooterComp,
    CourseCard
  },
  data () {
    return {
      coursesPage: [
        {name: "Test1", status: true, groups: 10},
        {name: "Test2", status: false, groups: 0},
        {name: "Test3", status: true, groups: 22},
        {name: "Test4", status: false, groups: 0}
      ],
      inputSearch: "",
    }
  },
  methods: {

  },
  computed: {
    filteredCourses: function () {
      let i = this
      return this.coursesPage.filter(function (element) {
        return element.name.toLowerCase().indexOf(i.inputSearch.toLowerCase()) !== -1
      })
    }
  }
}
</script>

<style scoped>


</style>
