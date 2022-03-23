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
        :length="3"
        v-model="page"
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
        {index: 1, name: "Test1", status: "inAction", groups: 10},
        {index: 2, name: "Test2", status: "closed", groups: 0},
        {index: 3, name: "Test3", status: "inAction", groups: 22},
        {index: 4, name: "Test4", status: "inDev", groups: 0},

        {index: 5, name: "Test5", status: "inAction", groups: 10},
        {index: 6, name: "Test6", status: "closed", groups: 0},
        {index: 7, name: "Test7", status: "inAction", groups: 22},
        {index: 8, name: "Test8", status: "inDev", groups: 0},

        {index: 9, name: "Test9", status: "inAction", groups: 10},
        {index: 10, name: "Test10", status: "closed", groups: 0},
        {index: 11, name: "Test11", status: "inAction", groups: 22},
        {index: 12, name: "Test12", status: "inDev", groups: 0},
      ],
      inputSearch: "",
      categories: [],
      page: 1,
    }
  },
  methods: {

  },
  computed: {
    filteredCourses: function () {
      let i = this;
      let filters = this.categories;
      let courses = this.coursesPage;
      let shortList;
      if (this.page === 1) {
        shortList = courses.slice(0, 4);
        console.log(shortList);
      } else {
        shortList = courses.slice((this.page - 1) * 4, 4 * this.page);
        console.log(shortList);
      }
      return shortList
      .filter(function (element) {
        return ((element.name.toLowerCase().indexOf(i.inputSearch.toLowerCase()) !== -1 && filters.includes(element.status))
            || (element.name.toLowerCase().indexOf(i.inputSearch.toLowerCase()) !== -1 && filters.length === 0));
      })
    }
  }
}
</script>

<style scoped>


</style>
