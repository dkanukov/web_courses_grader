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
          <v-checkbox v-model="categories" id="inDev" value="inDev" color="info" label="В разработке"></v-checkbox>
          <v-checkbox v-model="categories" id="closed" value="closed" color="info" label="Закрыт"></v-checkbox>
          <v-checkbox v-model="categories" id="inAction" value="inAction" color="info" label="В процессе"></v-checkbox>
        </v-row>
      </v-col>

      <v-col>
        <v-text-field v-model.trim="inputSearch" label="Введите название курса"/>
      </v-col>
    </v-row>
    <v-row
        v-if="filteredCourses.length !== 0"
    >
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
        {{ categories }}
      </v-col>
    </v-row>
    <v-row
    justify="center"
    v-else
    >
      <h2 class="text-red font-weight-bold">Курс не найден, проверьте название</h2>
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
        {name: "Test1", status: "inAction", groups: 10},
        {name: "Test2", status: "closed", groups: 0},
        {name: "Test3", status: "inAction", groups: 22},
        {name: "Test4", status: "closed", groups: 0}
      ],
      inputSearch: "",
      categories: []
    }
  },
  methods: {

  },
  computed: {
    filteredCourses: function () {
      let i = this
      let filters = this.categories
      return this.coursesPage
      .filter(function (element) {
        let data = element.name.toLowerCase().indexOf(i.inputSearch.toLowerCase()) !== -1
        if (filters.length !== 0) {
          // console.log(filters)
          // console.log(element)
          data = element.status.toLowerCase().includes(filters[0])
          console.log(typeof data)
        }
        return data
      })
    }
  }
}
</script>

<style scoped>


</style>
