<template>
  <div>
		<HeaderComp/>
      <v-row class="mt-10">
        <v-col
          cols = "6"
        >

          <v-row class="mt-10">
            <v-col
              v-for="(n, index) in 2"
              cols = "6"
              v-bind:key="n"
            >
              <course-card :course-name="coursesMainPage[index].name" :course-description="coursesMainPage[index].description"/>
            </v-col>
          </v-row>
        </v-col>

        <v-divider
            vertical
        ></v-divider>

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
import CourseCard from "@/components/CourseCard";

export default {
	components: {
		HeaderComp,
		FooterComp,
    CourseCard
	},
  data () {
    return {
      coursesMainPage: [{name: "Test1", description: "description1"}, {name: "Test2", description: "description2"},
        {name: "Test3", description: "description3"}, {name: "Test4", description: "description4"}]
    }
  }
}
</script>
