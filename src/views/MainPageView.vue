<template>
  <div>
    <HeaderComp/>
    <v-row class="mt-5 ml-5">
      <v-col
          cols = "6"
      >

        <v-row
        >
          <v-col
              v-for="element in coursesMainPage"
              cols = "6"
              :key="element"
          >
            <course-card
                :course-name="element.name"
                :course-status="element.status"
                :course-type="element.type"
                :course-descr="element.description"
                :course-id="element.id"
            />
          </v-col>
        </v-row>
      </v-col>

      <v-col
          cols = "6"
      >
      </v-col>
    </v-row>
    <FooterComp/>
  </div>
</template>

<script>
import HeaderComp from '@/components/HeaderComp';
import FooterComp from '@/components/FooterComp';
import CourseCard from "@/components/CourseCardComp";
import {mapGetters, mapActions} from "vuex"

export default {
  components: {
    HeaderComp,
    FooterComp,
    CourseCard
  },
  data () {
    return {
      coursesMainPage: [],
    }
  },
  computed: {
    ...mapGetters(["allCourses"]),
  },
  methods: {
    ...mapActions(["fetchCourses"]),
  },
  watch: {

  },
  async mounted() {
    //Delete when get database of users and make a login page
    window.localStorage.setItem("userId", "1");
    if (!this.coursesMainPage.length) {
      await this.fetchCourses();
      this.coursesMainPage = this.allCourses.slice(this.allCourses.length - 4);
    }
  }
}
</script>

<style scoped>

</style>
