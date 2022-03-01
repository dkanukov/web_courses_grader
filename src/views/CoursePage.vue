<template>
  <div>
    <HeaderComp/>
    <v-row justify="end">
      <h3 class="mr-10 mt-5">Place for filters</h3>
    </v-row>
    <v-row>
      <v-col
      v-for="element in coursesPage"
      cols="3"
      :key="element"
      >
        <CourseCard :course-name="element.name" :course-description="element.description"/>
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
      coursesPage: [{name: "Test1", description: "description1"}, {name: "Test2", description: "description2"},
        {name: "Test3", description: "description3"}, {name: "Test4", description: "description4"}]
    }
  }
}
</script>

<style scoped>


</style>
