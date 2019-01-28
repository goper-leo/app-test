<template>
  <tr>
    <td v-text="passer.name"></td>
    <td v-text="passer.campus_eligibility"></td>
    <td v-text="passer.school"></td>
    <td v-text="passer.division"></td>
  </tr>
</template>

<script>
  export default {

    props: {
      passer: {
        required: true,
      }

    },



  }
</script>
