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
          <v-checkbox v-model="pageStatus.categories" id="inDev" value="inDev" color="info" label="В разработке"></v-checkbox>
          <v-checkbox v-model="pageStatus.categories" id="closed" value="closed" color="info" label="Закрыт"></v-checkbox>
          <v-checkbox v-model="pageStatus.categories" id="inAction" value="inAction" color="info" label="В процессе"></v-checkbox>
        </v-row>
      </v-col>

      <v-col>
        <v-text-field
            v-model.trim="pageStatus.inputSearch"
            label="Введите название курса"
        />
      </v-col>
    </v-row>
    <v-row
        class="mt-13"
        v-if="filteredCourses.length !== 0"
    >
      <v-col
        v-for="element in displayCourses"
        cols="3"
        :key="element"
      >
        <CourseCard
            :course-name="element.name"
            :course-status="element.status"
            :course-type="element.type"
            :course-descr="element.description"
            :course-id="element.id"
        />
      </v-col>
    </v-row>
    <v-row
      justify="center"
      v-else
    >
      <h2 class="text-red font-weight-bold">Курс не найден, проверьте название</h2>
    </v-row>
    <v-row
        justify="center"
        class="mt-5"
        v-show="paginationLength !== 0"
    >
      <v-pagination
        :length="paginationLength"
        v-model="pageStatus.page"
      >

      </v-pagination>
    </v-row>
    <FooterComp/>
  </div>
</template>

<script>
import HeaderComp from '@/components/HeaderComp';
import FooterComp from '@/components/FooterComp';
import CourseCard from "@/components/CourseCardComp";
import {mapGetters, mapActions} from "vuex";

export default {
  name: "CoursePage",
  components: {
    HeaderComp,
    FooterComp,
    CourseCard
  },
  data () {
    return {
      coursesPage: [],
      pageStatus: {
        inputSearch: "",
        categories: [],
        page: 1,
      },
      displayCourses: [],
    }
  },
  methods: {
    ...mapActions(["fetchCourses"]),
    trimCourses(status) {
      if (this.filteredCourses.length >= 4) {
        if (status.page === 1) {
          this.displayCourses = this.filteredCourses.slice(0, 4);
        } else {
          this.displayCourses = this.filteredCourses.slice((this.pageStatus.page - 1) * 4, 4 * this.pageStatus.page);
        }
      } else {
        this.displayCourses = this.filteredCourses
      }
    },
    async getCourses() {
      await this.fetchCourses()
          .then(() => {
            this.coursesPage = this.allCourses;
          })
    }
  },
  computed: {
    ...mapGetters(["allCourses"]),
    filteredCourses: function () {
      let i = this;
      let filters = this.pageStatus.categories;
      return this.coursesPage
          .filter(function (element) {
            return ((element.name.toLowerCase().indexOf(i.pageStatus.inputSearch.toLowerCase()) !== -1 && filters.includes(element.status))
                || (element.name.toLowerCase().indexOf(i.pageStatus.inputSearch.toLowerCase()) !== -1 && filters.length === 0));
          })
    },
    paginationLength: function () {
      return Math.ceil(this.filteredCourses.length / 4);
    },
  },
  watch: {
    pageStatus: {
      handler() {
        this.trimCourses(this.pageStatus);
      },
      deep: true,
      immediate: true
    },
  },
  mounted() {
    if (this.allCourses.length === undefined) {
       this.getCourses();
    } else {
      this.coursesPage = this.allCourses;

    }
  },
}
</script>

<style scoped>


</style>
