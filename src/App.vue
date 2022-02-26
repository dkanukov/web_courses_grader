<template>
  <div>
		<HeaderComp/>
      <v-row class="mt-10">
        <v-col
          cols = "6"
          class=""
        >
          <v-row>
            <CourseCard/>
            <CourseCard/>
          </v-row>
        </v-col>
        <v-divider
            vertical="true"
        ></v-divider>
        <v-col
          cols = "6"
          class=""
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
  data: () => {

  }
}
</script>
